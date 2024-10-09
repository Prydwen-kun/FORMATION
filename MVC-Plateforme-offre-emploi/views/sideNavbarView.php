<aside class="menu text-color back-dark column">
    <p class="menu-label title is-3 text-color"><?= $currentUser ?></p>
    <p class="menu-label title">connected</p>
    <ul class="menu-list text-color">
        <li class="text-color mb-2"><a class="text-color" href="index.php?ctrl=auth&action=dashboard">Liste des offres</a></li>
        <li class="text-color mb-2"><a class="text-color" href="index.php?ctrl=auth&action=profil">Profil</a></li>
        <li class="text-color mb-2"><a class="text-color" href="index.php?ctrl=auth&action=candidature">Suivre Candidature</a></li>
    </ul>
</aside>

<style>
    .menu {
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
    }
</style>