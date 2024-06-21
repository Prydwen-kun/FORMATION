<?php

$title = "Alumni";
$currentPage = "alumni";

include 'inc/head.php';
include 'inc/navbar.php';
include 'data/data.php';
include 'function/function.php';
include 'function/_helpers/tools.php';

?>

<body>

  <div class="container">

    <h1>Liste des Alumnis</h1>

    <h2 class="mt-5 mb-3">Nombre d'alumnis par spécialité</h2>
    <div class="row row-cols-1 row-cols-md-4 g-4 ">

      <?php foreach (speAlumni($alumnis) as $spe => $num) : ?>
        <div class="col">
          <div class="card tex  t-bg-light mb-3  text-center">

            <div class="card-body">
              <h5 class="card-title "><?= $num ?></h5>
            </div>
            <div class="card-footer"><?= $spe ?></div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>

    <h2 class="mt-5 mb-3">Taux d'alumnis en poste</h2>
    <div class="progress " role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
      <div class="progress-bar bg-success" style="width: <?= statAlumnisJob($alumnis) ?>%"><?= statAlumnisJob($alumnis) ?>%</div>
    </div>

    <h2 class="mt-5 mb-3">Taux d'alumnis en poste par spe</h2>
    <?php foreach (statSpeJob($alumnis) as $speciality => $percent) : ?>
      <p class="mt-4"><?= $speciality ?></p>
      <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar bg-success" style="width: <?= $percent ?>%"><?= $percent ?>%</div>
      </div>
    <?php endforeach; ?>

    <table class="table table-striped mt-5">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Prénom</th>
          <th scope="col">Nom</th>
          <th scope="col">Email</th>
          <th scope="col">Titre</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($alumnis as $alumni) : ?>
          <tr>
            <th scope="row"><?= $alumni['id'] ?></th>
            <td><?= $alumni['firstname'] ?></td>
            <td><?= $alumni['lastname'] ?></td>
            <td><?= $alumni['email'] ?></td>
            <td><?= $alumni['title'] ?></td>
            <td><button class="btn btn-primary" data-bs-target="#profil-card<?= $alumni['id'] ?>" data-bs-toggle="modal">Voir profil</button></td>
          </tr>
        <?php endforeach; ?>

      </tbody>
    </table>



  </div>
  <!-- Modal -->
  <?php foreach ($alumnis as $alumni) : ?>
    <div class="modal fade" id="profil-card<?= $alumni['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $alumni['firstname'] ?></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-primary">Sauvegarder</button>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <hr>
  <?php
  include 'inc/foot.php';
  debug($alumnis);
  ?>