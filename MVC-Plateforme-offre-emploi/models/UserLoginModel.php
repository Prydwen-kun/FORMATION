<?php
class UserLoginModel extends CoreModel
{
    private $_req;
    private $_user;

    public function login($username, $password)
    {
        $query = "SELECT * FROM users WHERE username = :username";
        $this->_req = $this->getDb()->prepare($query);
        $this->_req->execute(['username' => $username]);
        $this->_user = $this->_req->fetch(PDO::FETCH_ASSOC);

        if ($this->_user && password_verify($password, $this->_user['password'])) {
            $_SESSION['user_id'] = $this->_user['id'];
            return true;
        }
        return false;
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
