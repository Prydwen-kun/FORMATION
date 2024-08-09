<?php
session_start();
$currentPage = "Login";
$login = ' ';
$error = ' ';
include_once "include/header.php";

if (isset($_SESSION['connected'])) {
    unset($_SESSION['connected'], $_SESSION['u_id']);
    $_SESSION = [];
    session_destroy();
}


if (isset($_GET['login']) && $_GET['login'] == 'false') {
    $login = 'error';
}
if (isset($_GET['error']) && $_GET['error'] == '403') {
    $error = 'Access forbidden : Error 403';
}


?>
<header>
    <p>LOGIN</p>
</header>
<section class="container">
    <div class="login-error">
        <?php
        if ($login == 'error') {
            echo 'Erreur de connexion : Identifiants invalide !';
        }
        if ($error == 'Access forbidden : Error 403') {
            echo $error;
        }
        ?>
    </div>
    <div class="form-container">
        <?php if ($currentPage == "Login") : ?>
            <form action="espaceAdmin.php" method="post" class="loginForm">
                <label for="userID">UserID : </label>
                <input type="text" name="userID" id="userID" placeholder="UserID">
                <label for="password">Password : </label>
                <input type="password" name="password" id="password" placeholder="******">
                <button type="submit" id="loginButton">LOGIN</button>
            </form>
        <?php endif; ?>
    </div>
</section>
<?php
include_once "include/footer.php";
session_write_close();
?>