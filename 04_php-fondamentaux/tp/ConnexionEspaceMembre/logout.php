<?php
$currentPage = "logout";
include "inc/head.php";

session_start();
if (isset($_SESSION['connected'])) {
    unset($_SESSION['connected'], $_SESSION['user_id'], $_SESSION['user']);
}
$_SESSION = [];
session_destroy();
?>


<section class="container mt-5">
    <p>Logged Out !</p>
    <a href="index.php?status=reconnect">Go back</a>
</section>

<?php
include "inc/foot.php";
?>