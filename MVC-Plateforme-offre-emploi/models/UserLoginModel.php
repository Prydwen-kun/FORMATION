<?php
class UserLoginModel extends CoreModel
{
    private $_req;
    private $_user;

    public function __destruct()
    {
        if (!empty($this->_req)) {
            $this->_req->closeCursor();
        }
    }

    public function login($username, $password)
    {
        $query = "SELECT users.id AS id,
         users.password AS password,
         users.email AS email,
         last_login,
         role.label AS role 
         FROM users 
         JOIN role ON role_id_fk = role.id 
         WHERE username = :username";
        $this->_req = $this->getDb()->prepare($query);
        $this->_req->execute(['username' => $username]);
        $this->_user = $this->_req->fetch(PDO::FETCH_ASSOC);
        $this->_req->closeCursor();

        if ($this->_user && password_verify($password, $this->_user['password'])) {
            $_SESSION['user_id'] = $this->_user['id'];
            $_SESSION['role'] = $this->_user['role'];
            return true;
        }
        return false;
    }

    public function lastLoginUpdate($username)
    {
        $query = "UPDATE users
         SET last_login = DEFAULT
         WHERE username = :username";
        $this->_req = $this->getDb()->prepare($query);
        $this->_req->execute(['username' => $username]);
        $this->_req->closeCursor();
    }

    public function signup($username, $email, $password, $specialite, $entreprise)
    {
        $query = "INSERT INTO users VALUES(DEFAULT,:username,:password,:email,DEFAULT,:entreprise,:specialite)";

        if ($entreprise != '3' && $entreprise != '2') {
            $entreprise = '3';
            return false;
        }
        if ($specialite != '1' && $specialite != '2') {
            $specialite = '1';
            return false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        if (!$this->userExist($username)) {
            $this->_req = $this->getDb()->prepare($query);
            $this->_req->bindValue("username", $username, PDO::PARAM_STR);
            $this->_req->bindValue("email", $email, PDO::PARAM_STR);
            $this->_req->bindValue("password", password_hash($password, PASSWORD_BCRYPT), PDO::PARAM_STR);
            $this->_req->bindValue("specialite", $specialite, PDO::PARAM_INT);
            $this->_req->bindValue("entreprise", $entreprise, PDO::PARAM_INT);
            return $this->_req->execute();
        } else {
            return false;
        }
    }

    public function userExist($username)
    {
        $query = "SELECT * FROM users WHERE users.username = :username";

        $this->_req = $this->getDb()->prepare($query);
        $this->_req->bindValue("username", $username, PDO::PARAM_STR);
        $this->_req->execute();
        $response = $this->_req->fetchAll(PDO::FETCH_ASSOC);
        $this->_req->closeCursor();
        return count($response) == 1 ? true : false;
    }

    public function logout()
    {

        session_destroy();
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    public function getCurrentUserId()
    {
        return $_SESSION['user_id'];
    }

    public function getRole()
    {
        return $_SESSION['role'];
    }

    public function getCurrentUser()
    {
        if ($this->isLoggedIn()) {
            $query =
                "SELECT users.id AS id,
            username,
            password,
            email,
            last_login,
            users.role_id_fk AS role_id,
            role.label AS role,
            users.spe_id_fk AS spe_id,
            specialite.label AS specialite
             FROM users
             LEFT JOIN role ON role_id_fk = role.id
             LEFT JOIN specialite ON spe_id_fk = specialite.id 
             WHERE users.id = :id";
            $this->_req = $this->getDb()->prepare($query);
            $this->_req->execute(['id' => $_SESSION['user_id']]);
            return $this->_req->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }

    public function updateUserProfil($user, $post, $UPDATE = false)
    {

        foreach ($post as $key => $user_value) {
            switch ($key) {
                case 'username':
                    $username = $user_value == '' ? $user->getUsername() : $post['username'];
                    break;
                case 'email':
                    $email = $user_value == '' ? $user->getEmail() : (filter_var($user_value, FILTER_VALIDATE_EMAIL) ? $post['email'] : $user->getEmail());
                    break;
                case '$password':
                    $password = password_verify($post['password'], $user->getPassword()) ?
                        null : (strlen($user_value) >= 5 ? $post['password'] : null);
                    break;
                case 'specialite':
                    $specialite = ($user_value == '') ? $user->getSpe_id() : (($post['specialite'] == 1 || $post['specialite'] == 2) ? $post['specialite'] : $user->getSpe_id());
                    break;
                case 'entreprise':

                    if ($post['entreprise'] == 1 || $post['entreprise'] == 2 || $post['entreprise'] == 3) {
                        $entreprise = ($user->getRole_id == 1 && $post['entreprise'] == 1) ? '1' : (($user->getRole_id() != 1 && $post['entreprise'] == 1) ? $user->getRole_id() : $post['entreprise']);
                    }

                    break;
            }
        }

        $query = "UPDATE users
        SET username = :username,
        password = COALESCE(:password, password),
        email =:email,
        role_id_fk =:entreprise,
        spe_id_fk =:specialite
        WHERE id= :id";
        $this->_req = $this->getDb()->prepare($query);
        if ($UPDATE) {
            $this->_req->bindValue('id', $user->getId(), PDO::PARAM_STR);
        } else {
            $this->_req->bindValue('id', $_SESSION['user_id'], PDO::PARAM_STR);
        }

        $this->_req->bindValue('username', $username, PDO::PARAM_STR);
        $this->_req->bindValue("email", $email, PDO::PARAM_STR);
        $this->_req->bindValue("password", password_hash($password, PASSWORD_BCRYPT), PDO::PARAM_STR);
        $this->_req->bindValue("specialite", $specialite, PDO::PARAM_INT);
        $this->_req->bindValue("entreprise", $entreprise, PDO::PARAM_INT);
        $this->_req->execute();
        $this->_req->closeCursor();
    }

    public function readUser($user_id)
    {
        $query =
            "SELECT users.id AS id,
                username,
                password,
                email,
                last_login,
                users.role_id_fk AS role_id,
                role.label AS role,
                users.spe_id_fk AS spe_id,
                specialite.label AS specialite
            FROM users
            LEFT JOIN role ON role_id_fk = role.id
            LEFT JOIN specialite ON spe_id_fk = specialite.id 
            WHERE users.id = :id";
        $this->_req = $this->getDb()->prepare($query);
        $this->_req->execute(['id' => $user_id]);
        return $this->_req->fetch(PDO::FETCH_ASSOC);
    }

    public function readAllUsers($orderBy, $limit): array
    {
        switch ($orderBy) {
            case 'id':
                $sql = "SELECT users.id AS id,
            username,
            password,
            email,
            last_login,
            users.role_id_fk AS role_id,
            role.label AS role,
            users.spe_id_fk AS spe_id,
            specialite.label AS specialite
             FROM users
             LEFT JOIN role ON role_id_fk = role.id
             LEFT JOIN specialite ON spe_id_fk = specialite.id 
             ORDER BY id
             LIMIT :maxUser
                ";

                try {
                    if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                        $this->_req->bindParam('maxUser', $limit, PDO::PARAM_INT);
                        if ($this->_req->execute()) {
                            $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                            return $datas;
                        }
                    }
                    return false;
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
                break;
            case 'username':
                $sql = "SELECT users.id AS id,
            username,
            password,
            email,
            last_login,
            users.role_id_fk AS role_id,
            role.label AS role,
            users.spe_id_fk AS spe_id,
            specialite.label AS specialite
             FROM users
             LEFT JOIN role ON role_id_fk = role.id
             LEFT JOIN specialite ON spe_id_fk = specialite.id 
             ORDER BY username
             LIMIT :maxUser
                ";

                try {
                    if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                        $this->_req->bindParam('maxUser', $limit, PDO::PARAM_INT);
                        if ($this->_req->execute()) {
                            $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                            return $datas;
                        }
                    }
                    return false;
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
                break;
            case 'login':
                $sql = "SELECT users.id AS id,
            username,
            password,
            email,
            last_login,
            users.role_id_fk AS role_id,
            role.label AS role,
            users.spe_id_fk AS spe_id,
            specialite.label AS specialite
             FROM users
             LEFT JOIN role ON role_id_fk = role.id
             LEFT JOIN specialite ON spe_id_fk = specialite.id 
             ORDER BY last_login
             LIMIT :maxUser
                ";

                try {
                    if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                        $this->_req->bindParam('maxUser', $limit, PDO::PARAM_INT);
                        if ($this->_req->execute()) {
                            $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                            return $datas;
                        }
                    }
                    return false;
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
                break;
        }
    }

    public function deleteUser($id)
    {
        $sql = "DELETE
        FROM required_skills
        WHERE offre_id_fk IN (SELECT id FROM offres WHERE auteur_id =:id);
        DELETE
        FROM offres
        WHERE auteur_id =:id;
        DELETE
        FROM users
        WHERE users.id =:id
        ";

        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                $this->_req->bindParam('id', $id, PDO::PARAM_INT);
                if ($this->_req->execute()) {
                    return true;
                }
            }
            return false;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
