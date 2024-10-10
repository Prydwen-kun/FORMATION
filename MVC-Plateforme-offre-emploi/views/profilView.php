<?php
$page = 'Profil';
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
    <h2 class="title text-color">Profil</h2>
    <div class="columns is-variable is-3">
        <div class="column is-3">
            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <div class="column">User ID
                            <p class="text-color"><?= $user->getId() ?></p>
                        </div>
                        <div class="column">Username
                            <p class="text-color"><?= $user->getUsername() ?></p>
                        </div>
                        <div class="column">Email
                            <p class="text-color"><?= $user->getEmail() ?></p>
                        </div>
                        <div class="column">Dernière Connexion
                            <p class="text-color"><?= $user->getLast_login() ?></p>
                        </div>
                        <div class="column">Inscrit en tant que
                            <p class="text-color"><?= $user->getRole() ?></p>
                        </div>
                        <div class="column">Spécialité
                            <p class="text-color"><?= $user->getSpecialite() ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <div class="card-content">
                    <div class="content">
                        <div class="text-color">

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'views/partials/foot.php'; ?>