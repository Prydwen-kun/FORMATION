<?php
$currentPage = "espace utilisateur";
include "inc/head.php";
include "function/function.php";
include "data/bdd.php";
session_start();
if (!$_SESSION['connected']) {
    header("Location: index.php?error=403");
}

?>
<header class="container mt-5">

    <?php
    include "inc/nav.php";
    ?>
</header>
<section class="container mt-5">
    <?php
    if ($users[$_SESSION['user_id']]['lvl'] == 'admin') {
        echo '<h2>Admin</h2>';
        echo '<p>Liste User</p>';
        echo '<div class="container">';
        foreach ($users as $user) {
            echo '<div>' . $user['name'] . ' ' . $user['firstname'] . '</div>';
        }
        echo '</div>';

    } else {
        echo '<h2>User</h2>';
        echo '<div>Bienvenue !</div>';
    }
    ?>
</section>
<?php
include "inc/foot.php";
?>