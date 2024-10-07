<?php include 'partials/head.php'; ?>

 <div class="section">
    <h1 class="title">Liste nains</h1>
    <div class="card is-shadowless">
      <div class="card-content">

      <?php if(!empty($Nains)): ?>
          <table class="table is-hoverable is-fullwidth">
            <thead>
              <tr>
                
                <th>ID</th>
                <th>Nom</th>
                <th>Barbe</th>
                <th>Groupe</th>
                <th>Ville Natale</th>
                <th>Taverne</th>
                <th>Shift Start</th>
                <th>Shift End</th>
                <th>Tunnel</th>
                <th>####</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($Nains as $nain): ?>
              <tr class="">

                <th><?= $nain->getId() ?></th>
                <th><?= $nain->getNom() ?></th>
                <td><?= $nain->getBarbe() ?> cm</td>
                <td><?= $nain->getGroupe() ?></td>
                <td><?= $nain->getVille_natale() ?></td>
                <td><?= $nain->getTaverne() ?></td>
                <td><?= $nain->getShift_start() ?></td>
                <td><?= $nain->getShift_end() ?></td>
                <td><?= $nain->getTunnel() ?></td>
                <td><a href="index.php?ctrl=profil&action=index&nain=<?= $nain->getId()?>" class="button is-dark is-small">Voir Profil</a></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>


        <?php 
          else:   
        ?>
          <p>Aucunes nains</p>
        <?php endif;?>

      </div>
    </div>
  </div>
<!-- Main content goes here -->

<?php include 'partials/foot.php'; ?>
