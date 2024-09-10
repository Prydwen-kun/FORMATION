<?php
session_start();
$currentPage = 'Liste des groupes';
include_once "include/header.php";
require_once "function/utils/bddGenericFunction.php";
require_once "function/connexion/connexionBDD.php";
require_once "function/utils/generateList.php";

//REQUETE FORM
$errorNoRoom = '';
$reqState = 'false';
if (isset($_GET['action']) && $_GET['action'] == 'grp_form' && !empty($_POST)) {
    if (isset($_POST['shiftStart']) || isset($_POST['shiftEnd']) || isset($_POST['taverne']) || isset($_POST['tunnel'])) {

        $postManaged = $_POST;
        // var_dump($postManaged['taverne']);
        if ($postManaged['taverne'] == 'NULL') {
            $postManaged['taverne'] = NULL;
        }
        if (preg_match("/^([0-1]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/", $postManaged['shiftStart']) !== 1) {
            $postManaged['shiftStart'] = '00:00:00';
        }
        if (preg_match("/^([0-1]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/", $postManaged['shiftEnd']) !== 1) {
            $postManaged['shiftEnd'] = '00:00:00';
        }

        //free room
        $freeRoomResult = getFreeRoomFromTavern($dbh, $_SESSION['groupInfo']['taverne']);

        if ($freeRoomResult < 1) {
            if ($_SESSION['groupInfo']['tavern_id'] == 'NULL') {
                $postManaged['taverne'] = NULL;
            } else {
                $postManaged['taverne'] = $_SESSION['groupInfo']['tavern_id'];
            }

            $errorNoRoom = ' No free room ! Tavern not modified !';
        }
        // var_dump($_SESSION['groupInfo']['tavern_id']);
        // var_dump($postManaged['taverne']);
        $reqState = updateGroupDetail($dbh, $_SESSION['groupInfo']['group_ID'], $postManaged);
    }
}

//REQUETE FORM END
$listeGroupe = listGroup($dbh);

$groupInfo = [];
$dwarvesFromGroup = [];


if (!empty($_GET['grp'])) {
    $groupInfo = getGroup($dbh, htmlspecialchars($_GET['grp']));
    $_SESSION['groupInfo'] = $groupInfo[0];
    $_SESSION['grp'] = $_GET['grp'];
    $dwarvesFromGroup = getDwarvesFromGroup($dbh, htmlspecialchars($_GET['grp']));
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

                        if ($row == 'progres' && $data == '100') {
                            echo '<li>' . str_replace('_', ' ', ucfirst($row)) . ' : Entretien</li>';
                        } else if ($row == 'progres') {
                            echo '<li>' . str_replace('_', ' ', ucfirst($row)) . ' : ' . $data . '%</li>';
                        } else if ($row == 'tavern_id') {
                        } else {
                            echo '<li>' . str_replace('_', ' ', ucfirst($row)) . ' : ' . $data . '</li>';
                        }
                    } else if ($row == 'taverne' && $data == '' && $row != 'tavern_id') {
                        echo '<li>Taverne : N/A </li>';
                    } else if ($row != 'tavern_id') {
                        echo '<li> N/A </li>';
                    }
                }
            }
        } else {
            echo '<li>Aucune groupe sélectionné</li>';
        }


        //liste des nains originaire de la ville
        echo '<p>Liste des nains : | ';
        foreach ($dwarvesFromGroup as $key => $dwarves) {
            foreach ($dwarves as $row => $dwarf) {
                echo '<a href="listeNain.php?nameNain=' . $dwarf . '">' . $dwarf . '</a> | ';
            }
        }
        ?>


    </ul>
    <?php generateTableFromArray($listeGroupe, 'groupe'); ?>

    <!-- FORMULAIRE -->
    <?php if (!empty($_GET['grp'])): ?>
        <form action="?action=grp_form&grp=<?= $_SESSION['grp'] ?>" method="post" class="form-change-groupe">
            <p>Groupe n°<?= $_GET['grp'] ?></p>
            <!-- horaire choice -->
            <label for="shiftStart">Shift Start : </label>
            <input type="time" name="shiftStart" id="shiftStart" value="<?= $_SESSION['groupInfo']['shift_start'] ?>" step="1">
            <label for="shiftEnd">Shift End : </label>
            <input type="time" name="shiftEnd" value="<?= $_SESSION['groupInfo']['shift_end'] ?>" step="1">
            <!-- tunnel choice -->
            <label for="tunnelSelect">Tunnel : </label>
            <select name="tunnel" id="tunnelSelect">
                <?php
                $listGroup = listTunnelID($dbh);
                foreach ($listGroup as $array) {
                    foreach ($array as $groupItem) {
                        echo '<option value="' . $groupItem . '"';
                        if ($groupItem == $_SESSION['groupInfo']['tunnel']) {
                            echo ' selected';
                        }
                        echo '>' . $groupItem . '</option>';
                    }
                }
                ?>
            </select>
            <!-- taverne choice -->
            <label for="taverneSelect">Taverne : </label>
            <select name="taverne" id="taverneSelect">
                <?php
                $listGroup = listTavern($dbh);
                foreach ($listGroup as $array) {
                    foreach ($array as $row => $groupItem) {
                        if ($row == 'id') {
                            echo '<option value="' . $groupItem . '"';
                            // $tavernID = $groupItem;
                        }
                        if ($row == 'nom') {
                            if ($groupItem == $_SESSION['groupInfo']['taverne']) {
                                echo ' selected';
                                // $_SESSION['taverneID'] = $tavernID;
                            }
                            echo '>';
                            echo  $groupItem . '(Libre : ' . getFreeRoomFromTavern($dbh, $groupItem) . ')</option>';
                        }
                    }
                }
                if ($_SESSION['groupInfo']['taverne'] == '') {
                    echo '<option value="NULL" selected>Aucune affectation</option>';
                } else {
                    echo '<option value="NULL">Aucune affectation</option>';
                }
                ?>
            </select>
            <button>Submit</button>
        </form>
        <?php if ($reqState === 'success') {
            echo '<p class="requeteState">Groupe changé avec succès ! ' . $errorNoRoom . '</p>';
        }
        ?>
    <?php endif; ?>

</section>
<?php
include_once "include/footer.php";
session_write_close();
?>