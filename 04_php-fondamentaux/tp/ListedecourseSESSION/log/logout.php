<?php
include "../inc/head.php";

session_start();
if (isset($_SESSION['groceries_list'])) {
    unset($_SESSION['groceries_list']);
}

?>


<section class="container mt-5">
<p>Deleted groceries list !</p>
<a href="../index.php?listDelete=true">Retour vers liste</a>
</section>

<?php
include "../inc/foot.php";
?>