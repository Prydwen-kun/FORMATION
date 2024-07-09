<?php
$currentPage = "Le livre dont vous êtes le héros";

include "inc/head.php";

include "data/data.php";
include "function/function.php";

session_start();
if (!isset($_SESSION['storyIndex'])) {
    $_SESSION['storyIndex'] = 0;
} else if (isset($_POST['goto'])) {
    $_SESSION['storyIndex'] = $_POST['goto'];
}


?>
<header class="header mt-3">
    <h1>Le Livre dont vous êtes le héro</h1>
</header>
<section class="container mt-5">
    <h2>Chapitre <?= $_SESSION['storyIndex'] ?></h2>
    <div class="container mt-3">
        <?php
        if (isset($_SESSION['storyIndex'])) {
            echo $story[$_SESSION['storyIndex']]['text'];
        }

        ?>
    </div>
    <div class="container mt-3">
        <form action="index.php?storyPlay=true" method="post" id="form1">
            <?php foreach ($story[$_SESSION['storyIndex']]['choice'] as $key => $choice): ?>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="goto" value="<?= $choice['goto'] ?>"
                        id="choice<?= $key ?>">
                    <label class="form-check-label" for="choice<?= $key ?>">
                        <?= $choice['text'] ?>(Aller au chapitre <?= $choice['goto'] ?>)
                    </label>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="container mt-3">
        <a href="./log/logout.php">Effacer progression</a>
    </div>
</section>

<?php
include "inc/foot.php";
?>