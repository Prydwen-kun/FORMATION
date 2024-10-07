<?php
session_start();
$currentPage = 'Liste des nains';
include_once "include/header.php";
require_once "function/utils/bddGenericFunction.php";
require_once "function/connexion/connexionBDD.php";
require_once "function/utils/generateList.php";

$reqState = 'false';

if (isset($_GET['action']) && $_GET['action'] == 'grp_change' && !empty($_POST)) {
    if (isset($_POST['nainID'], $_POST['groupeNum']) && intval($_POST['groupeNum']) != 0) {
        $reqState = changeGroupe($dbh, $_POST['nainID'], $_POST['groupeNum']);
    } else {
        $reqState = changeGroupe($dbh, $_POST['nainID'], NULL);
    }
}

$liste_nains = listDwarves($dbh, 5);
?>
<!-- Afficher Nom | barbe | villenatale | taverne |shiftHour |tunnel| villes| Membre du groupe -->
<section class="container">
    <?php generateTableFromArray($liste_nains) ?>

    <form action="?action=grp_change" method="post" class="form-change-dwarf">
        <label for="nainSelect">Nain : </label>
        <select name="nainID" id="nainSelect">
            <?php
            foreach ($liste_nains as $nain) {
                echo '<option value="' . selectDwarf($dbh, $nain['nom']) . '">' . $nain['nom'] . '</option>';
            }
            ?>
        </select>
        <label for="groupeSelect">Groupe : </label>
        <select name="groupeNum" id="groupeSelect">
            <?php
            $listGroup = listGroupID($dbh);
            foreach ($listGroup as $array) {
                foreach ($array as $groupItem) {
                    echo '<option value="' . $groupItem . '">' . $groupItem . '</option>';
                }
            }
            ?>
            <option value="NULL">Sans Groupe</option>
        </select>
        <button>Changer de groupe</button>
    </form>
    <?php if ($reqState === 'success') {
        echo '<p class="requeteState">Groupe changé avec succès !</p>';
    } ?>
</section>



<?php
include_once "include/footer.php";
session_write_close();
?>