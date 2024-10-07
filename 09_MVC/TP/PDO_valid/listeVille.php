<?php
session_start();
$currentPage = 'Liste des villes';
include_once "include/header.php";
require_once "function/utils/bddGenericFunction.php";
require_once "function/connexion/connexionBDD.php";
require_once "function/utils/generateList.php";

$listeVille = listCities($dbh);
$dwarvesFromCity = [];
$tavernFromCity = [];
$tunnelFromCity = [];
$tunnelToCity = [];
$cityID = '';
// ville -> nom superficie , liste des nains , liste tavernes, liste des tunnel

if (!empty($_GET['ville'])) {
    $villeInfo = getCity($dbh, htmlspecialchars($_GET['ville']));
    $dwarvesFromCity = listDwarvesFromCity($dbh, $_GET['ville']);
    $tavernFromCity =  listTavernFromCity($dbh, $_GET['ville']);
    $cityID = getCityID($dbh, $_GET['ville']);
    $tunnelFromCity = listTunnelFromCity($dbh, $cityID);
    $tunnelToCity = listTunnelToCity($dbh, $cityID);
} else {
    $villeInfo = [];
}
?>
<section class="container">
    <ul class="detailNain">
        <?php
        if ($villeInfo !== []) {
            foreach ($villeInfo as $key => $info) {
                // var_dump($info);
                foreach ($info as $row => $data) {
                    if ($data != '') {
                        echo '<li>' . $row . ' : ' . $data . '</li>';
                    } else {
                        echo '<li> N/A </li>';
                    }
                }
            }
            //liste des nains originaire de la ville
            echo '<p>Liste des nains : | ';
            foreach ($dwarvesFromCity as $key => $dwarves) {
                foreach ($dwarves as $row => $dwarf) {
                    echo '<a href="listeNain.php?nameNain=' . $dwarf . '">' . $dwarf . '</a> | ';
                }
            }
            echo '</p>';
            // liste taverne
            echo '<p>Liste des tavernes : | ';
            foreach ($tavernFromCity as $key => $cities) {
                foreach ($cities as $row => $city) {
                    echo '<a href="listeTaverne.php?taverne=' . $city . '">' . $city . '</a> | ';
                }
            }
            echo '</p>';
            // liste tunnel sortant

            echo '<p>Liste des tunnels sortants : ';
            foreach ($tunnelFromCity as $key => $tunnels) {
                foreach ($tunnels as $row => $tunnel) {
                    if ($row == 'nom') {
                        echo '<a href="listeVille.php?ville=' . $tunnel . '">' . $tunnel . '</a>';
                    }
                    if ($row == 'progres') {
                        if ($tunnel == '100') {
                            echo ': Ouvert  ||  ';
                        } else {
                            echo ' : ' . $tunnel . '%  ||  ';
                        }
                    }
                }
            }
            echo '</p>';

            //liste tunnel entrant
            echo '<p>Liste des tunnels rentrants : ';
            foreach ($tunnelToCity as $key => $tunnels) {
                foreach ($tunnels as $row => $tunnel) {
                    if ($row == 'nom') {
                        echo '<a href="listeVille.php?ville=' . $tunnel . '">' . $tunnel . '</a>';
                    }
                    if ($row == 'progres') {
                        if ($tunnel == '100') {
                            echo ': Ouvert  ||  ';
                        } else {
                            echo ' : ' . $tunnel . '%  ||  ';
                        }
                    }
                }
            }
            echo '</p>';
        } else {
            echo '<li>Aucune ville sélectionnée</li>';
        }

        ?>
    </ul>
    <?php generateTableFromArray($listeVille, 'ville'); ?>
</section>
<?php
include_once "include/footer.php";
session_write_close();
?>