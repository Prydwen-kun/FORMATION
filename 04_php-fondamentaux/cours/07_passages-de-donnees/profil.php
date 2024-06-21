<?php

include 'inc/head.php';
include 'inc/navbar.php';

$users = [
    ['id' => 1, 'prenom' => 'Jean-Pierre', 'metier' => 'apprenti papa', 'hobby' => 'include & require'],
    ['id' => 2, 'prenom' => 'Ken', 'metier' => 'Dev', 'hobby' => 'Convertir l\'alphabet en chiffre et vice versa'],
    ['id' => 3, 'prenom' => 'Régine', 'metier' => 'apprenti dev', 'hobby' => 'happy hour'],


];

?>
<?php foreach ($users as $user) : ?>
    <div class="col">
        <div class="card tex  t-bg-light mb-3  text-center">

            <div class="card-body">
                <h5 class="card-title "><?= $user['prenom'] ?></h5>
            </div>
            <div class="card-footer"><?= $user['metier'] ?></div>
        </div>
    </div>
<?php endforeach; ?>

<?php

include 'inc/foot.php';
?>