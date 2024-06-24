<?php

$title = 'index';
$userListStart = 0;
if(isset($_GET['listStart'])){
    $userListStart = $_GET['listStart'];
}
$userListLength = 5;
if (isset($_GET['listSize'])) {
    $userListLength = $_GET['listSize'];
}

include 'function/function.php';
include 'data/data.php';
include 'inc/head.php';
?>
<link rel="stylesheet" href="./css/index.css">

<header>
    <?php
    include 'inc/navbar.php';
    ?>
</header>
<section class="container">
    <table>
        <tbody>
            <?php
            listUsers($users, $userListStart, $userListLength);
            ?>
        </tbody>
    </table>
</section>

<section class="optionContainer">
    <?php
    include 'inc/listDisplayOption.php';
    ?>
</section>
<?php
include 'inc/foot.php';
?>