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

            $connectedUser = $this->userLogin;
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

            $connectedUser = $this->userLogin;
            $datas = $this->userLogin->getCurrentUser();
            $currentUser = $datas['username'];

            if ($datas === null) {
                echo "error";
            }

            $user = new User($datas);

            //if form submit
            if (!empty($_POST) && isset($_GET['from']) && $_GET['from'] == 'profil') {
                $post = $_POST;
                $this->userLogin->updateUserProfil($user, $post);
                header('Location: index.php?ctrl=auth&action=profil&from=profil_update');
            }

            if (isset($_GET['from']) && $_GET['from'] == 'profil_update') {
                $update = "Profil updated";
            }

            require 'views/sideNavbarView.php';
            require 'views/profilView.php';
        } else {
            header('Location: index.php?ctrl=auth&action=error403');
        }
    }

    public function admin()
    {

        if ($this->userLogin->isLoggedIn() && $this->userLogin->getRole() == 'admin') {

            $filterDefault = 'id';
            $nbUserDefault = 20;
            $connectedUser = $this->userLogin;
            $datas = $this->userLogin->getCurrentUser();
            $currentUser = $datas['username'];

            if (!empty($_POST)) {
                if (isset($_GET['from'])) {
                    switch ($_GET['from']) {
                        case 'search':
                            break;
                        case 'filter':
                            $filterDefault = isset($_POST['filter']) ? $_POST['filter'] : 'id';
                            $nbUserDefault = isset($_POST['pagination']) ? $_POST['pagination'] : 20;
                            break;
                        default:
                            break;
                    }
                }
            }

            $users = $this->userLogin->readAllUsers($filterDefault, $nbUserDefault);

            foreach ($users as $user) {
                $userArray[] = new User($user);
            }

            require 'views/sideNavbarView.php';
            require 'views/adminView.php';
        } else {
            header('Location: index.php?ctrl=auth&action=error403');
        }
    }

    public function user()
    {
        if ($this->userLogin->isLoggedIn() && $this->userLogin->getRole() == 'admin') {

            $connectedUser = $this->userLogin;
            $datas = $this->userLogin->getCurrentUser();
            $currentUser = $datas['username'];


            if (isset($_GET['user']) && is_numeric($_GET['user'])) {
                $userToGet = $_GET['user'];
                $userData = $this->userLogin->readUser($userToGet);
                $user = new User($userData);
            }

            //user read one
            //new user

            if (!empty($_POST) && isset($_GET['from']) && $_GET['from'] == 'user_update') {
                $post = $_POST;
                if (isset($_GET['user']) && is_numeric($_GET['user'])) {
                    //update user
                    $this->userLogin->updateUserProfil($user, $post, true);
                    header('Location: index.php?ctrl=auth&action=user&from=profil_update&user=' . $user->getId());
                } else {
                    require 'views/403View.php';
                }
            }

            if (isset($_GET['from']) && $_GET['from'] == 'profil_update') {
                $update = "Profil updated";
            }

            require 'views/sideNavbarView.php';
            require 'views/userView.php';
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
