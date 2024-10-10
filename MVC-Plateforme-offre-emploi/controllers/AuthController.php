<?php
class AuthController
{
    private $userLogin;
    private $offre;
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
                    $this->userLogin->lastLoginUpdate($username);
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

            $filterDefault = 'title';
            $nbOffreDefault = 20;
            //if post not empty use for search and filter
            //dans offreModel readAll orderBY filter et limit par nb max + pagination
            if (!empty($_POST)) {
                if (isset($_GET['from'])) {
                    switch ($_GET['from']) {
                        case 'search':
                            break;
                        case 'filter':
                            break;
                        default:
                            break;
                    }
                }
            }

            //get offer data
            $OffreModel = new OffreModel();
            $datas = $OffreModel->readAll();

            foreach ($datas as $data) {
                $Offres[] = new Offre($data);
            }

            $currentUser = $this->userLogin->getCurrentUser()['username'];

            //affiche dashboardView
            require 'views/sideNavbarView.php';
            require 'views/dashboardView.php';
        } else {
            header('Location: index.php?ctrl=auth&action=error403');
        }
    }

    public function profil()
    {

        if ($this->userLogin->isLoggedIn()) {

            //if form submit
            if (!empty($_POST) && isset($_GET['from']) && $_GET['from'] == 'profil') {
            }

            $connectedUser = $this->userLogin;
            $datas = $this->userLogin->getCurrentUser();
            $currentUser = $datas['username'];

            if ($datas === null) {
                echo "error";
            }

            $user = new User($datas);


            require 'views/sideNavbarView.php';
            require 'views/profilView.php';
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
