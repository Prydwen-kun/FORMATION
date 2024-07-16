<?php
$currentPage = "Logout";
include "../inc/head.php";

session_start();
if (isset($_SESSION['ticketGagnant'])) {
    unset($_SESSION['ticketGagnant'], $_SESSION['ticketMap'], $_SESSION['achat'], $_SESSION['argentRestant'], $_SESSION['award']);
}
$_SESSION = [];
session_destroy();

?>
<link rel="stylesheet" href="../style/style.css">
<header class="mt-5">
    <h1>Logged Out</h1>
</header>
<section class="container mt-5">
    <p>Back to 0 !</p>
    <a href="../index.php" class="btn btn-primary">Retour</a>
</section>

<?php
include "../inc/foot.php";
?>