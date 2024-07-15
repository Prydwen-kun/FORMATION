<?php
$currentPage = "traitement";

include "../inc/head.php";

include "../data/data.php";
include "../lib/utils/function.php";
include "../lib/_helpers/tools.php";

session_start();

?>
<link rel="stylesheet" href="../style/style.css">
<section class="container container1">
    <h1>Infos</h1>
    <?php foreach ($_SESSION as $key => $value) : ?>
        <?php if ($key == 'formData') : ?>
            <?php foreach ($_SESSION['formData'] as $key => $value) : ?>
                <div><?= $value ?></div>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</section>
<?php
include "../inc/foot.php";
?>