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
        $query = "SELECT * FROM users WHERE username = :username";
        $this->_req = $this->getDb()->prepare($query);
        $this->_req->execute(['username' => $username]);
        $this->_user = $this->_req->fetch(PDO::FETCH_ASSOC);

        if ($this->_user && password_verify($password, $this->_user['password'])) {
            $_SESSION['user_id'] = $this->_user['id'];
            $_SESSION['role'] = $this->_user['role_id_fk'];
            return true;
        }
        return false;
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

    public function getCurrentUser()
    {
        if ($this->isLoggedIn()) {
            $query = "SELECT * FROM users WHERE id = :id";
            $this->_req = $this->getDb()->prepare($query);
            $this->_req->execute(['id' => $_SESSION['user_id']]);
            return $this->_req->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }
}
