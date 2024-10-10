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
    <div class="columns">
       <div class="column"><?=$user->getId()?></div> 
       <div class="column"><?=$user->getUsername()?></div> 
       <div class="column"><?=$user->getEmail()?></div> 
       <div class="column"><?=$user->getLast_login()?></div> 
       <div class="column"><?=$user->getRole()?></div> 
       <div class="column"><?=$user->getSpecialite()?></div> 
    </div>
</div>

<?php include 'views/partials/foot.php'; ?>