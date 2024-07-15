<?php
$currentPage = "Logout";

if (session_status() === PHP_SESSION_NONE) session_start();

include "../inc/head.php";

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