<?php
include 'inc/head.php';
include 'data/data.php';

?>
<link rel="stylesheet" href="./css/index.css">
<section class="profilContainer">
    <h2>Résultat de la recherche</h2>
    <table>
        <tbody>
            <th>Name</th>
            <?php
            if (isset($_GET['search'])) {
                foreach ($users as $user) {
                    if (strtolower($user['name']) == strtolower($_GET['search']) || strtolower($user['job']) == strtolower($_GET['search'])) {
                        echo '<tr>';
                        echo '<td>';
                        echo $user['name'];
                        echo '</td>';
                        echo '<td>';
                        echo $user['job'];
                        echo '</td>';
                        echo '<td><a href="userProfil.php?userId=' . $user['id'] . '">Profil</a></td>';
                        echo '</tr>';
                    }
                }
            }
            ?>
        </tbody>
    </table>
    <a href="index.php">Return</a>
</section>


<?php
include 'inc/foot.php';
?>