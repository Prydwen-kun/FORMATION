<?php
$currentPage = "connexion";
$loginError = false;
include "inc/head.php";
include "function/function.php";
include "data/bdd.php";

session_start();
if (isset($_POST['login_id'], $_POST['login_password'])) {
    foreach ($users as $key => $user) {
        if ($user['id'] == $_POST['login_id'] && $user['password'] == $_POST['login_password']) {
            $_SESSION['user'] = $user['id'];
            $_SESSION['user_id'] = $key;
            $_SESSION['connected'] = true;
            header("Location: dashboard.php?valid=true");
            break;
        }
    }
    $loginError = true;
}


?>
<header class="container mt-5">
    <h1>CONNEXION</h1>
</header>
<section class="container mt-5">
    <?php if ($loginError) {
        echo '<div class="alert alert-danger" role="alert">Erreur : Wrong ID or Password!</div>';
    } ?>
    <form action="" id="form_login" method="post">
        <div class="form-group mt-5">
            <label for="login_id" class="d-block">ID : </label>
            <input type="text" name="login_id" id="login_id" placeholder="Enter email">
        </div>
        <div class="form-group mt-5 mb-5">
            <label for="login_password" class="d-block">Password : </label>
            <input type="password" name="login_password" id="login_password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</section>
<?php



include "inc/foot.php";
?>