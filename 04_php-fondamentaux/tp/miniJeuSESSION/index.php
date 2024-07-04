<?php
$currentPage = "Mini Jeu";
include "inc/head.php";
include "function/function.php";

$mystere = randNum(0, 100);
$newGame = false;

session_start();
if (isset($_GET['newGame'])) {
    if ($_GET['newGame'] == 'true') {
        $newGame = true;
    }
}

if (!isset($_SESSION['mystere']) || $newGame) {
    $_SESSION['mystere'] = $mystere;
    $_SESSION['count'] = 0;
    $_SESSION['win'] = false;
    $_SESSION['history'] = [];
    header("Location: index.php?gameStart=true");
}

?>
<header class="container mt-5">
    <h1>Nombre mystère avec $_SESSION</h1>
</header>
<section class="container mt-5">
    <!-- <p>Nombre mystere = $_SESSION['mystere'] </p> -->
    <a href="?newGame=true">Nouvelle partie</a>
    <div class="container mt-5">
        <form action="" method="get" class="form">
            <label for="input1">Devinez un nombre : </label>
            <input type="number" name="input1" id="input1">
            <input type="submit" value="Try !">
        </form>
    </div>
    <div class="container">
        <p class="class_essai mt-5">
            <?php
            if (isset($_GET['input1']) && !empty($_GET['input1']) && is_numeric($_GET['input1']) && isset($_SESSION['mystere']) && !$_SESSION['win']) {

                $_SESSION['win'] = gameMystere($_GET['input1'], $_SESSION['mystere'], $_SESSION['count']);
                $_SESSION['history'][] = $_GET['input1'];

            } else if ($_SESSION['win']) {
                echo "You win ! Le nombre est bien " . $_SESSION['mystere'] . " trouvé en " . $_SESSION['count'] . " essai.";
            } else {
                echo "Essai :" . $_SESSION['count'];
            }
            ?>
        </p>
        <div class="class_history">
            <div class="container">
                <h2>History</h2>
                <p>
                    <?php
                    if (isset($_SESSION['history'])) {
                        foreach ($_SESSION['history'] as $item) {
                            echo '<p>' . $item . '</p>';
                        }
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</section>
<?php



include "inc/foot.php";
?>