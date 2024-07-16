<?php
$currentPage = "index";

include "inc/head.php";

include "data/data.php";
include "lib/utils/function.php";
include "lib/_helpers/tools.php";

session_start();
if (!isset($_SESSION['ticketGagnant'])) {
    //had to debug the browser for this to work -________-
    $_SESSION['ticketGagnant'] = $ticketGagnant;
    $_SESSION['ticketMap'] = $ticketMap;
    $_SESSION['achat'] = [];
    $_SESSION['argentRestant'] = $argentStart;
    $_SESSION['award'] = 'false';
} else if (isset($_GET['reset']) && $_GET['reset'] == 'true') {
    $_SESSION['ticketGagnant'] = $ticketGagnant;
    $_SESSION['ticketMap'] = $ticketMap;
    $_SESSION['achat'] = [];
    // $_SESSION['argentRestant'] = $argentStart;
    $_SESSION['award'] = 'false';
} else if (isset($_GET['cheat']) && $_GET['cheat'] == 'true') {
    $_SESSION['argentRestant'] = $argentStart;
}



?>
<header class="container">
    <a href="index.php">
        <h1 class="title">Tombola</h1>
    </a>
    <div id="shadowBox"> <a href="?cheat=true" class="scam">->Get Money<-</a></div>

</header>
<section class="container">
    <form action="?buy=true" method="post" id="form1" class="form-inline">
        <div class="form-group">
            <label for="nbTicket" class="mt-3">Nombre ticket</label>
            <input type="number" min="1" max="100" class="form-control mt-3" id="nbTicket" name="ticket" placeholder="">
            <button type="submit" class="btn btn-primary mt-3">Acheter</button>
        </div>
        <div class="form-group">

            <a href="?reset=true" class="btn btn-primary mt-3">Reset Tombola</a>
            <a href="?tirage=true" class="btn btn-primary mt-3">Tirage !!!</a>
            <a href="./log/logout.php" class="btn btn-warning mt-3">EXIT</a>
        </div>

    </form>
</section>
<section class="container">
    <?php
    acheterTicket($prixTicket);
    ?>
</section>
<section class="container section2">
    <div class="container">
        <p class="title-small mt-5">Historique</p>
        <span><?= count($_SESSION['achat']) ?> ticket acheté.</span>
        <div class="historique mt-5">

            <?php
            afficherAchat();
            ?>

        </div>
    </div>
    <div class="container">
        <p class="title-small mt-5">Résultat du tirage</p>
        <?php tirage(); ?>
        <div>Argent Restant :<?php echo $_SESSION['argentRestant'] ?>€</div>
        <div><?php if ($_SESSION['argentRestant'] <= 1) {
                    echo 'You\'re broke ! GG';
                } ?></div>
    </div>

</section>

<?php
session_write_close();
include "inc/foot.php";
?>