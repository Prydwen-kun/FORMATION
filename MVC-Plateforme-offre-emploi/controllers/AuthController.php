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
        $error = '';

        if (!$this->userLogin->isLoggedIn()) {
            if (!empty($_POST)) {
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
            if (isset($_GET['from']) && $_GET['from'] == 'signed') {
                require 'views/accountCreatedView.php';
            }

            require 'views/loginView.php';
        } else if ($this->userLogin->isLoggedIn()) {
            header('Location: index.php?ctrl=auth&action=dashboard');
        }
    }

    public function signup()
    {
        $error = '';
        if (!$this->userLogin->isLoggedIn()) {
            if (!empty($_POST)) {
                //signup
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $specialite = $_POST['specialite'];
                $entreprise = $_POST['entreprise'];
                if (strlen($password) >= 5 && $this->userLogin->signup($username, $email, $password, $specialite, $entreprise)) {
                    header('Location: index.php?ctrl=auth&action=login&from=signed');
                    exit;
                } else {
                    require 'views/signErrorView.php';
                    require 'views/signupView.php';
                }
            } else {
                require 'views/signupView.php';
            }
        } else if ($this->userLogin->isLoggedIn()) {
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
        require 'views/403View.php';
        require 'views/loginView.php';
        //JS message erreur
    }
}
