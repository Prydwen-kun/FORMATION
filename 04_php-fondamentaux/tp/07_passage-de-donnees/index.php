<?php

include 'inc/head.php';
include 'traitement.php';



if (count($_GET) == 0) {
    $randNum = rand(1, 100);
    $count = 1;
} else {
    $randNum = $_GET['rand'];
    $count = $_GET['count'] + 1;
}

?>

<div class="container w-25 mt-5" id="input1">
    <h2>Nombre Mystère</h2>
    <div class="row">

        <form action="index.php" method="get" id="form1">
            <input type="number" id="input1" name="input1" placeholder="Entrer un nombre..." required>
            <input type="number" id="rand" name="rand" value="<?= $randNum ?>">
            <input type="number" id="count" name="count" value="<?= $count ?>">
            <input type="submit" value="Valider">
        </form>
    </div>
</div>

<div class="container w-25 mt-5" id="result">
    <div class="row">

        <?php
        if (!count($_GET) == 0)
            devineNombre($_GET['input1'], $_GET['rand'], $_GET['count']);

        ?>
    </div>
</div>
<div class="home_link"><a href="index.php">Reset Game</a></div>
<hr>
<?php
var_dump($randNum);
var_dump($_GET);


include 'inc/foot.php';
?>

<style>
    body {
        background-color: #cccccc;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        border: 2px solid black;
        border-radius: 3px;
        background-color: #aaaaaa;
    }

    a {
        background-color: gray;
        display: block;
        color: white;
        margin: 0 auto;
        text-decoration: none;
        font-size: 20px;
        font-family: sans-serif;
        text-wrap: nowrap;
        width: min-content;
        border: 2px solid red;
        border-radius: 3px;
        padding: 10px;

    }

    .home_link {
        width: 100%;
    }

    input {
        height: 40px;
    }

    #input1 {
        padding: 15px;
    }

    #rand {
        display: none;
    }

    #count {
        display: none;
    }

    #result {
        border: none;
    }

    #result:hover {
        border: 2px solid black;
        border-radius: 3px;
    }
</style>