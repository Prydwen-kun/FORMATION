<?php
session_start();
$currentPage = 'Liste des nains';
include_once "include/header.php";
require_once "function/utils/bddGenericFunction.php";
require_once "function/connexion/connexionBDD.php";
require_once "function/utils/generateList.php";


if (isset($_SESSION['connected'])) {
    unset($_SESSION['connected'], $_SESSION['u_id']);
    $_SESSION = [];
    session_destroy();
}
?>

<section>
    <div class="requeteState coError">DECONNECTE</div>
</section>

<?php
include_once "include/footer.php";
session_write_close();
?>