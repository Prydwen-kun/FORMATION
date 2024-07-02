<?php
include "../inc/head.php";

session_start();
if (isset($_SESSION['count'])) {
    unset($_SESSION['count']);
}

?>


<section class="container mt-5">
<p>Logged out</p>
<a href="../index.php?login=-1">Retour</a>
</section>

<?php
include "../inc/foot.php";
?>