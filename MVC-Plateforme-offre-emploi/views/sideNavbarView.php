<script>
    function nav_menu() {
        let menu = document.getElementById("aside_menu")
        let burger_button = document.getElementById("burger_button")

        if (menu.classList.contains('is-block')) {
            menu.classList.toggle('is-none')
            menu.classList.toggle('is-block')
            burger_button.innerHTML = '>'
        } else if (menu.classList.contains('is-none')) {
            menu.classList.toggle('is-block')
            menu.classList.toggle('is-none')
            burger_button.innerHTML = '<'
        }

        console.log("nav func used")

    }
</script>
<aside class="menu text-color back-dark column">
    <div class="background is-size-6 button is-fullwidth text-color" id="burger_button" onclick="nav_menu()">
        <</div>

            <div id="aside_menu" class="is-block">
                <p class="menu-label title is-3 text-color"><?= $currentUser ?></p>
                <p class="menu-label title">connected</p>
                <ul class="menu-list text-color">
                    <li class="text-color mb-2"><a class="text-color background" href="index.php?ctrl=auth&action=dashboard">Liste des offres</a></li>
                    <li class="text-color mb-2"><a class="text-color background" href="index.php?ctrl=auth&action=profil">Profil</a></li>
                    <?php if ($connectedUser->getRole() == 'etudiant' || $connectedUser->getRole() == 'entreprise'): ?>
                    <li class="text-color mb-2"><a class="text-color background" href="index.php?ctrl=auth&action=candidature">Suivre Candidature</a></li>
                    <?php endif; ?>
                    <?php if ($connectedUser->getRole() == 'entreprise'): ?>
                        <li class="text-color mb-2"><a class="text-color background" href="index.php?ctrl=auth&action=create_offer">Créer offre</a></li>
                    <?php endif; ?>
                    <?php if ($connectedUser->getRole() == 'entreprise'): ?>
                        <li class="text-color mb-2"><a class="text-color background" href="index.php?ctrl=auth&action=my_offer">Consulter mes offres</a></li>
                    <?php endif; ?>
                    <?php if ($connectedUser->getRole() == 'admin'): ?>
                        <li class="text-color mb-2"><a class="text-color background" href="index.php?ctrl=auth&action=admin">Gérer Users</a></li>
                    <?php endif; ?>
                </ul>
            </div>
</aside>

<style>
    .is-none {
        display: none;
    }

    .menu {
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 98;
    }
</style>