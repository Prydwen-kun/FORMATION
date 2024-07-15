<?php
$currentPage = "traitement";
if (session_status() === PHP_SESSION_NONE) session_start();

include "../inc/head.php";

include "../data/data.php";
include "../lib/utils/function.php";
include "../lib/_helpers/tools.php";


?>
<link rel="stylesheet" href="../style/style.css">
<section class="container container1">
    <h1>Infos</h1>
    <?php foreach ($_SESSION as $key => $value) : ?>
        <?php if ($key == 'formData') : ?>
            <?php foreach ($_SESSION['formData'] as $key => $value) : ?>
                <div><?= $key . ' : ' . $value ?></div>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    <a href="../index.php">Return to sign up</a>
    <a href="logout.php">Reset</a>
</section>
<?php
session_write_close();

include "../inc/foot.php";
?>