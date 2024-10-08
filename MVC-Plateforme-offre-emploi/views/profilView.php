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
                        <div>User ID
                            <p class="text-color"><?= $user->getId() ?></p>
                        </div>
                        <div>Username
                            <p class="text-color"><?= $user->getUsername() ?></p>
                        </div>
                        <div>Email
                            <p class="text-color"><?= $user->getEmail() ?></p>
                        </div>
                        <div>Dernière Connexion
                            <p class="text-color"><?= $user->getLast_login() ?></p>
                        </div>
                        <div>Inscrit en tant que
                            <p class="text-color"><?= $user->getRole() ?></p>
                        </div>
                        <div>Spécialité
                            <p class="text-color"><?= $user->getSpecialite() == null ? 'Aucune spécialité' : $user->getSpecialite() ?></p>
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
                            <form class="is-flex is-flex-direction-column is-justify-content-center is-align-items-center" action="index.php?ctrl=auth&action=profil&from=profil" method="POST">
                                <div>
                                    <div class="field mb-6 has-text-right">
                                        <label class="label text-color is-inline" for="username">Username</label>
                                        <div class="control is-inline">
                                            <input class="input is-inline" type="text" name="username" id="username" placeholder="username" required>
                                        </div>
                                    </div>
                                    <div class="field mb-6 has-text-right">
                                        <label class="label text-color is-inline" for="email">Email</label>
                                        <div class="control is-inline">
                                            <input class="input is-inline" type="email" name="email" id="email" placeholder="email@email.em" required>
                                        </div>
                                    </div>
                                    <div class="field mb-6 has-text-right">
                                        <label class="label text-color is-inline" for="password">Password</label>
                                        <div class="control is-inline">
                                            <input class="input is-inline" type="password" minlength="5" name="password" id="password" placeholder="password" required>
                                        </div>
                                    </div>
                                    <div class="field mb-6 has-text-right">
                                        <label class="label text-color is-inline" for="specialite">Spécialité</label>
                                        <div class="select">
                                            <select name="specialite" id="specialite">
                                                <option value="1" selected>Programmation</option>
                                                <option value="2">Designer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if($connectedUser->getRole() == 'admin'): ?>
                                    <div class="field mb-6 has-text-right">
                                        <label class="label text-color is-inline" for="entreprise">Catégorie</label>
                                        <div class="select">
                                            <select name="entreprise" id="entreprise">
                                                <option value="1" selected>Admin</option>
                                                <option value="2">Entreprise</option>
                                                <option value="3">Etudiant</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php endif;?>
                                    <!-- 1-admin 2-entreprise 3-etudiant remplacer par un select -->
                                    <div class="field mb-2">
                                        <div class="control has-text-centered">
                                            <button class="button is-primary button-color button-text-color" type="submit">SAVE</button>

                                        </div>
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