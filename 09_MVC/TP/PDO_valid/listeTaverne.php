<?php
session_start();
$currentPage = 'Liste des groupes';
include_once "include/header.php";
require_once "function/utils/bddGenericFunction.php";
require_once "function/connexion/connexionBDD.php";
require_once "function/utils/generateList.php";

$listeTaverne = listTavern($dbh);

$tavernInfo = [];
$freeRoom = 0;

if (!empty($_GET['taverne'])) {
    $tavernInfo = getTavern($dbh, $_GET['taverne']);
    $freeRoom = getFreeRoomFromTavern($dbh, $_GET['taverne']);
    // var_dump($freeRoom);
} else {
    $tavernInfo = [];
}
?>
<section class="container">
    <ul class="detailNain">
        <?php

        if ($tavernInfo !== []) {
            foreach ($tavernInfo as $key => $info) {
                foreach ($info as $row => $data) {
                    if ($row == 'blonde' || $row == 'brune' || $row == 'rousse') {
                        if ($data == '1') {
                            echo '<li> Sert de la bière ' . $row . '</li>';
                        }
                    } else if ($row == 'nombre_chambre') {
                        echo '<li>' . str_replace('_', ' ', ucfirst($row)) . ' : ' . $data . '</li>';
                        echo '<li> Chambre libre : ' . $freeRoom . '</li>';
                    } else if ($data != '') {
                        echo '<li>' . str_replace('_', ' ', ucfirst($row)) . ' : ' . $data . '</li>';
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
    <?php generateTableFromArray($listeTaverne, 'taverne'); ?>
</section>
<?php
include_once "include/footer.php";
session_write_close();
?>