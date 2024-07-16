<?php
$currentPage = "Logout";
include "../inc/head.php";

session_start();
if (isset($_SESSION['storyIndex'])) {
    unset($_SESSION['storyIndex']);
}
$_SESSION = [];
session_destroy();

?>


<section class="container mt-5">
<p>Back to 0 !</p>
<a href="../index.php">Retour</a>
</section>

<?php
include "../inc/foot.php";
?>