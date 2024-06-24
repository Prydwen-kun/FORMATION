<?php
include 'inc/head.php';
include 'data/data.php';

?>
<link rel="stylesheet" href="./css/index.css">
<section class="profilContainer">
    <?php
    if (isset($_GET['userId'])) {
        foreach ($users[$_GET['userId']] as $data) {
            echo '<p>';
            echo $data;
            echo '</p>';
        }
    }
    ?>
    <a href="index.php">Return</a>
</section>


<?php
include 'inc/foot.php';
?>