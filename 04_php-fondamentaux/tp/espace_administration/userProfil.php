<?php
include 'data/data.php';
$title = 'User';
if (isset($_GET['userId'])) {
    $title = $users[$_GET['userId']]['name'];
}
include 'inc/head.php';


?>
<link rel="stylesheet" href="./css/index.css">
<section class="profilContainer">
    <h2>Profil</h2>
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