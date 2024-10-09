<?php
$page = 'Dashboard';
include 'views/partials/head.php';
?>
<div class="m-2">
    <nav class="navbar back-dark">
        <div class="navbar-brand">
            <h1 class="title text-color">
                <a class="text-color" href="index.php?ctrl=auth&action=login">Emploi-Direct</a>
            </h1>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start">
                <!-- Left side navbar items -->
            </div>
            <div class="navbar-end">
                <a href="index.php?ctrl=auth&action=logout" class="button-color button-text-color has-text-centered title p-2 button is-rounded">Log out</a>
            </div>
        </div>
    </nav>
</div>
<div class="section">
    <h2 class="title text-color">Liste des offres</h2>
    <div class="columns">
        <?php foreach ($Offres as $offre): ?>
            <div class="back-black text-color column">
                <div class="card background text-color p-2" style="background-image: url(<?= $offre->getCover() ?>); background-size:cover;background-position:center;background-repeat:no-repeat;">
                    <div class="card-content title is-4 text-color"><?= ucfirst($offre->getTitle()) ?> par <?= $offre->getAuteur() ?></div>
                    <div class="card backcolor-50 text-color">
                        <div class="card-content"><?= $offre->getContent() ?></div>
                        <div class="card-content">Salaire : <?= $offre->getSalaire() ?></div>
                        <div class="card-content">Adresse : <?= $offre->getLocalisation() ?></div>
                        <div class="card-content"><?= $offre->getCover() ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Main content goes here -->

<?php include 'views/partials/foot.php'; ?>