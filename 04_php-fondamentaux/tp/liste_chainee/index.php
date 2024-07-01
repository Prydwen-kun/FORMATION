<?php
include "inc/head.php";
include "function/liste_chainee.php";

?>


<section class="container">
  <h1>Liste Chaînée</h1>
  <form action="" method="post" id="form1">
    <input type="number" name="index">
  </form>
  <p>
    <?php
    if (isset($_POST['index'])) {
      echo listeChaine($_POST['index']);
    }
    ?>
  </p>
</section>

<?php
include "inc/foot.php";
?>