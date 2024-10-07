<?php
session_start();
$currentPage = 'Connexion espace Admin';
require_once "../utils/bddGenericFunction.php";
require_once "../connexion/connexionBDD.php";
require_once "../utils/generateList.php";


if (!empty($_GET['action']) && $_GET['action'] == 'connexion') {
    connexionAdmin($dbh);
}
if (!empty($_GET['login']) && $_GET['login'] == 'false') {
    echo '<div class="requeteState coError">Erreur login !</div>';
}
if (!empty($_GET['error']) && $_GET['error'] == '403') {
    echo '<div class="requeteState coError">Accès refusé !</div>';
}

if (isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
}
else if(isset($_GET['error']) && $_GET['error'] == '403'){
    
}
else {
    header("Location: ?error=403");
}

//action add nain
$reqState = false;

if (isset($_GET['action']) && $_GET['action'] == 'addNain' && !empty($_POST)) {
    if (isset($_POST['nom'], $_POST['barbe'], $_POST['groupeNum']) && intval($_POST['groupeNum']) != 0 && trim($_POST['nom']) != '') {
        $post = $_POST;
        $reqState = addDwarf($dbh, $post);
    } else {
        $post = $_POST;
        $reqState = addDwarf($dbh, $post);
    }
}

if($reqState){
    echo '<div class="requeteState">Nain ajouté !</div>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $currentPage ?></title>
    <link rel="stylesheet" href="../../asset/style/style.css">

</head>

<body>
    <header>
        <nav class="nav">
            <ul class="liste-nav">
                <li><a href="../../index.php">Liste des nains</a></li>
                <li><a href="../../listeNain.php">Nain</a></li>
                <li><a href="../../listeVille.php">Ville</a></li>
                <li><a href="../../listeGroupe.php">Groupe</a></li>
                <li><a href="../../listeTaverne.php">Taverne</a></li>
                <?php if (isset($_SESSION['connected'])) {
                    echo '<li><a href="../../sessionClose.php" class="connexionButton">Déconnexion</a></li>';
                } ?>
            </ul>
        </nav>
    </header>
    <?php if (!isset($_SESSION['connected']) || !$_SESSION['connected'] == true): ?>
    <form action="?action=connexion" method="post" class="form-connexion">
        <label for="user">Username : </label>
        <input type="text" name="user" id="user" placeholder="username">
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" placeholder="*****">
        <button>Login</button>
    </form>
    <?php endif; ?>
    <?php if (isset($_SESSION['connected']) && $_SESSION['connected'] == true): ?>
        <form action="?action=addNain" class="form-connexion form-addNain">
            <h2>AJOUTER NAIN</h2>
            <div>
                <label for="">Nom du nain :</label>
                <input type="text" name="nom" id="nom">
                <label for="barbe">Longueur Barbe :</label>
                <input type="number" name="barbe" id="barbe">
                <label for="groupeAdd">Groupe :</label>
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
            </div>

            <button class="addNainButton">Ajouter nain</button>
        </form>
    <?php endif; ?>

    <?php
    include_once "../../include/footer.php";
    session_write_close();
    ?>