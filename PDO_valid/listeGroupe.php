<?php
session_start();
$currentPage = 'Liste des groupes';
include_once "include/header.php";
require_once "function/utils/bddGenericFunction.php";
require_once "function/connexion/connexionBDD.php";
require_once "function/utils/generateList.php";

$listeGroupe = listGroup($dbh);

$groupInfo = [];

if (!empty($_GET['grp'])) {
    $groupInfo = getGroup($dbh, htmlspecialchars($_GET['grp']));
} else {
    $groupInfo = [];
}

?>
<section class="container">
    <ul class="detailNain">
        <?php
        if ($groupInfo !== []) {
            foreach ($groupInfo as $key => $info) {
                foreach ($info as $row => $data) {
                    if ($data != '') {
                        echo '<li>' . $row . ' : ' . $data . '</li>';
                    } else {
                        echo '<li> N/A </li>';
                    }
                }
            }
        } else {
            echo '<li>Aucune groupe sélectionné</li>';
        }

        ?>
    </ul>
    <?php generateTableFromArray($listeGroupe, 'groupe'); ?>
</section>
<?php
include_once "include/footer.php";
session_write_close();
?>