<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $currentPage ?></title>
    <link rel="stylesheet" href="asset/style/style.css">
    <link rel="stylesheet" href="../../asset/style/style.css">

</head>

<body>
    <header>
        <nav class="nav">
            <ul class="liste-nav">
                <li><a href="index.php">Liste des nains</a></li>
                <li><a href="listeNain.php">Nain</a></li>
                <li><a href="listeVille.php">Ville</a></li>
                <li><a href="listeGroupe.php">Groupe</a></li>
                <li><a href="listeTaverne.php">Taverne</a></li>
                <?php if (isset($_SESSION['user']['connected']) && $_SESSION['user']['connected'] == 'true') {
                    echo '<li><a href="sessionClose.php" class="connexionButton">Déconnexion</a></li>';
                } else {
                    echo '<li><a href="./function/connexion/verifConnexionUser.php" class="connexionButton">Connexion</a></li>';
                } ?>

            </ul>
        </nav>
    </header>