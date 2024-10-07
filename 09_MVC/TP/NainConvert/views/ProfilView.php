<?php include 'partials/head.php'; ?>

<div class="section">
    <div class="card">
        <h1 class="title d-inline">Liste nains</h1>
        <a href="index.php" class="d-inline">Retour</a>
    </div>
    <div class="card is-shadowless">
        <div class="card-content">

            <?php if (!empty($Nain)): ?>
                <div>ID :<?= $Nain->getId() ?></div>
                <div>Nom :<?= $Nain->getNom() ?></div>
                <div>Longueur Barbe :<?= $Nain->getBarbe() ?> cm</div>
                <div>Groupe :<?= $Nain->getGroupe() ?></div>
                <div>Ville natale :<?= $Nain->getVille_natale() ?></div>
                <div>Taverne :<?= $Nain->getTaverne() ?></div>
                <div>Horaire de travail début : <?= $Nain->getShift_start() ?></div>
                <div>Horaire de travail fin : <?= $Nain->getShift_end() ?></div>
                <div>Affectation Tunnel :<?= $Nain->getTunnel() ?></div>
                <div><a href="index.php?ctrl=profil&action=index&nain=<?= $nain->getId() ?>" class="button is-dark is-small">Voir Profil</a></div>
            <?php
            else:
            ?>
                <p>Aucun nain sélectionné</p>
            <?php endif; ?>

        </div>
    </div>
</div>
<!-- Main content goes here -->

<?php include 'partials/foot.php'; ?>