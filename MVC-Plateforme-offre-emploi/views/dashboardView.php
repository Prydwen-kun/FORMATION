<?php
$page = 'Dashboard';
include 'views/partials/head.php';
?>
<div class="m-2">
    <nav class="navbar back-dark columns">
        <div class="navbar-brand column is-4">
            <h1 class="title text-color">
                <a class="text-color" href="index.php?ctrl=auth&action=login">Emploi-Direct</a>
            </h1>
        </div>
        <div class="navbar-menu column is-4">
            <div class="navbar-start">
                <form id="formSearch" action="index.php?ctrl=auth&action=dashboard&from=search" method="POST">
                    <div class="is-inline">
                        <div class="field is-inline">
                            <div class="control is-inline">
                                <input class="input is-inline" type="text" name="search" id="search" placeholder="Search...">
                            </div>
                        </div>
                        <div class="field mb-2 is-inline">
                            <div class="control has-text-centered is-inline">
                                <button class="button is-inline is-primary button-color button-text-color" type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="navbar-end column is-4 has-text-right">
            <a href="index.php?ctrl=auth&action=logout" class="button-color button-text-color has-text-centered title p-2 button is-rounded">Log out</a>
        </div>
    </nav>
</div>
<div class="section">
    <div class="columns">
        <h2 class="title text-color column">Liste des offres</h2>
        <form action="index.php?ctrl=auth&action=dashboard&from=filter" method="POST" class="column has-text-right" id="formFilter">
            <div class="field">
                <label for="filter" class="text-color is-size-4">Filter by</label>
                <div class="select">
                    <script>
                        function filterUpdate() {
                            let filter = document.getElementById("filter")
                            let selectedValue = filter.value;
                            document.getElementById("formFilter").submit()
                        }
                    </script>
                    <select name="filter" id="filter" onchange="filterUpdate()">
                        <option value="">Select an option</option>
                        <option value="titre">Titre</option>
                        <option value="salaire">Salaire</option>
                        <option value="entreprise">Entreprise</option>
                    </select>
                </div>
            </div>
        </form>
    </div>

    <div class="columns is-multiline">
        <?php foreach ($Offres as $offre): ?>
            <div class="back-dark text-color column is-4">
                <div class="card background text-color p-2" style="background-image: url(<?= $offre->getCover() ?>); background-size:cover;background-position:center;background-repeat:no-repeat;">
                    <div class="card-content">
                        <div class="content title is-4 text-color"><?= ucfirst($offre->getTitle()) ?> par <?= $offre->getAuteur() ?>
                        </div>
                    </div>
                    <div class="card card-content backcolor-50">
                        <div class="card-content">
                            <div class="content">
                                <p class="text-color text-overflow-wrap is-inline"><?= $offre->getContent() ?></p>
                            </div>
                            <div class="content">Salaire :
                                <p class="text-color is-inline"><?= $offre->getSalaire() ?></p>
                            </div>
                            <div class="content">Adresse :
                                <p class="text-color is-inline"><?= $offre->getLocalisation() ?></p>
                            </div>
                            <!-- <div class="content"><?php //$offre->getCover() 
                                                        ?></div> -->
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Main content goes here -->

<?php include 'views/partials/foot.php'; ?>