<?php
$page = 'Espace Admin';
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
                <form id="formSearch" action="index.php?ctrl=auth&action=admin&from=search" method="POST">
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
        <h2 class="title text-color column">Espace Admin</h2>
        <form action="index.php?ctrl=auth&action=admin&from=filter" method="POST" class="column has-text-right" id="formFilter">
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
                        <option value="id">Id</option>
                        <option value="username">Username</option>
                        <option value="login">Last Login</option>
                    </select>
                </div>
            </div>
        </form>
    </div>

    <div class="columns">

        <div class="back-dark text-color column">
            <table class="table card is-fullwidth">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Last Login</th>
                        <th>Rôle</th>
                        <th>Specialité</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($userArray as $user): ?>
                        <tr>
                            <td><?= $user->getId() ?></td>
                            <td><?= $user->getUsername() ?></td>
                            <td><?= $user->getEmail() ?></td>
                            <td><?= $user->getLast_login() ?></td>
                            <td><?= $user->getRole() ?></td>
                            <td><?= $user->getSpecialite() ?></td>
                            <td><a href="index.php?ctrl=auth&action=user&user=<?=$user->getId()?>" class="button text-color">Modifier</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<!-- Main content goes here -->

<?php include 'views/partials/foot.php'; ?>