<?php
$page = 'Modification Offre';
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
    <h2 class="title text-color columns">
        <span class="column is-3">Modification Offre</span>
    </h2>
    <div class="columns is-variable is-3">
        <div class="column is-3">
            <div class="card background">
                <div class="card-content">
                    <div class="content">
                        <div class="user-mod-td">Offre ID
                            <p class="text-color"><?= $offre->getId() ?></p>
                        </div>
                        <div class="user-mod-td">Titre
                            <p class="text-color"><?= $offre->getTitle() ?></p>
                        </div>
                        <div class="user-mod-td">Contenu
                            <p class="text-color"><?= $offre->getContent() ?></p>
                        </div>
                        <div class="user-mod-td">Salaire
                            <p class="text-color"><?= $offre->getSalaire() ?></p>
                        </div class="user-mod-td">
                        <div class="user-mod-td">Adresse
                            <p class="text-color"><?= $offre->getLocalisation() ?></p>
                        </div>
                        <div class="user-mod-td">Skills
                            <p class="text-color"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card background">
                <div class="card-content is-fullwidth">
                    <div class="content is-fullwidth">
                        <div class="text-color is-fullwidth">
                            <form class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center is-fullwidth" action="index.php?ctrl=auth&action=offreModif&from=offer_update&offre=<?= $offre->getId() ?>" method="POST" enctype="multipart/form-data">
                                <div class="is-fullwidth force-fullwidth has-text-centered">
                                    <div class="field mb-6 has-text-centered">
                                        <label class="label text-color is-inline" for="titre">Titre</label>
                                        <div class="control is-inline">
                                            <input class="input is-inline" type="text" name="titre" id="titre" placeholder="<?= $offre->getTitle() ?>">
                                        </div>
                                    </div>
                                    <div class="field mb-6 has-text-centered textarea-max20 area-center">
                                        <label class="label text-color is-inline" for="content">Contenu</label>
                                        <div class="control is-inline">
                                            <textarea class="textarea" name="content" id="content" rows="4" cols="20">
                                            <?= $offre->getContent() ?>
                                            <!-- get offre content here -->
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="field mb-6 mt-6 has-text-centered">
                                        <label class="label text-color is-inline" for="salaire">Salaire</label>
                                        <div class="control is-inline">
                                            <input class="input is-inline" type="number" name="salaire" id="salaire" placeholder="<?= $offre->getSalaire() ?>">
                                        </div>
                                    </div>
                                    <div class="field mb-6 has-text-centered">
                                        <label class="label text-color is-inline" for="cover">Cover - <?= $offre->getCover() ?></label>
                                        <div class="control is-inline">
                                            <input type="file" name="cover" accept=".png,.jpg,.jpeg,.gif,.svg,.tif,.tiff,image/png,image/jpeg,image/gif,image/svg+xml,image/tiff">
                                        </div>
                                    </div>
                                    <div class="field mb-6 has-text-centered">
                                        <label class="label text-color is-inline" for="adresse">Adresse</label>
                                        <div class="control is-inline">
                                            <input class="input is-inline" type="text" name="adresse" id="adresse" placeholder="<?= $offre->getLocalisation() ?>">
                                        </div>
                                    </div>
                                    <div class="field mb-2">
                                        <div class="control has-text-centered">
                                            <button class="button is-primary button-color button-text-color" type="submit">SAVE</button>

                                        </div>
                                    </div>
                                    <div class="text-color has-text-centered">
                                        <?php if (isset($update)): ?>
                                            <?= $update ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'views/partials/foot.php'; ?>

<style>
    #user-modification {
        background-color: var(--background) !important;
        color: var(--text-color);
    }

    .admin-table {
        color: var(--text-color) !important;
    }

    .user-mod-td {
        color: aliceblue !important;
    }


    .force-fullwidth {
        min-width: 100% !important;
    }

    .textarea-max20 {
        max-width: 20% !important;
    }

    .area-center {
        margin: 0 auto !important;
    }
</style>