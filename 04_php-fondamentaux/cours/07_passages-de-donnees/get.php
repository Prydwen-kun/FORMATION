<?php

include 'inc/head.php';
include 'inc/navbar.php';

$users = [
    ['id' => 1, 'prenom' => 'Jean-Pierre', 'metier' => 'apprenti papa', 'hobby' => 'include & require'],
    ['id' => 2, 'prenom' => 'Ken', 'metier' => 'Dev', 'hobby' => 'Convertir l\'alphabet en chiffre et vice versa'],
    ['id' => 3, 'prenom' => 'Régine', 'metier' => 'apprenti dev', 'hobby' => 'happy hour'],


];

?>
<div class="container w-25 mt-5">
    <div class="row mt-5">
        <?php foreach ($users as $user): ?>
            <a href="profil.php" class="btn btn-primary col">Voir le profil de <?=$user['prenom']?></a>
        <?php endforeach; ?>
    </div>
</div>
<?php

include 'inc/foot.php';
?>