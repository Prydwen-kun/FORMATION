<?php
$currentPage = "logout";
include "inc/head.php";

session_start();
if (isset($_SESSION['mystere']) || isset($_SESSION['count']) || isset($_SESSION['win']) || isset($_SESSION['history'])) {
    unset($_SESSION['mystere'], $_SESSION['count'], $_SESSION['win'], $_SESSION['history']);
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