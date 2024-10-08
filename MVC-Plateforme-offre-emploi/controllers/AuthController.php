<?php
class AuthController
{
    private $userLogin;
    public function __construct()
    {
        $this->userLogin = new UserLoginModel();
    }

    public function login()
    {


        if (!$this->userLogin->isLoggedIn()) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];

                if ($this->userLogin->login($username, $password)) {
                    // Redirect to dashboard or home page
                    header('Location: index.php?ctrl=auth&action=dashboard');
                    exit;
                } else {
                    // Show error message
                    $error = "Invalid credentials";
                }
            }

            // Display login form
            require 'views/loginView.php';
        } else {
            header('Location: index.php?ctrl=auth&action=dashboard');
        }
    }

    public function logout()
    {
        $this->userLogin->logout();
        header('Location: index.php');
        exit;
    }

    public function dashboard()
    {
        if ($this->userLogin->isLoggedIn()) {
            //affiche dashboardView
            require 'views/dashboardView.php';
        } else {
            header('Location: index.php?ctrl=auth&action=error403');
        }
    }

    public function error403()
    {
        
        require 'views/loginView.php';
        require 'views/403View.php';//JS message erreur
    }
}
