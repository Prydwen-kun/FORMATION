<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement - Ajout Alumni</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="traitementStyle.css">
</head>

<body>
    <header>
        <nav class="main_nav">
            <a href="index.php">Home</a>
            <a href="index.php">Liste Alumni</a>
            <a href="index.php">Statistiques</a>
            <a href="ajoutAlumni.php">Ajout Alumni</a>
        </nav>
    </header>
    <section class="container">
        <h2>Résumé de l'ajout</h2>
        <?php
        foreach ($_POST as $key => $value) {
            if (!is_array($value)) {
                echo '<p>' . $key . ' : ' . $value . '</p>';
            } else {
                echo '<p>array</p>';
            }
        }
        ?>
    </section>

</body>

</html>