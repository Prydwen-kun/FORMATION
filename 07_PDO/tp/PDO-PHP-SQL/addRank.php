<?php
session_start();
$currentPage = 'Add Rank';
include_once "include/header.php";
require_once "function/function.php";

$dsn = 'mysql:host=localhost;dbname=espaceadmin;charset=utf8';
$dbUser = 'root';
$dbPwd = '';

if (isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
    $dbh = new PDO($dsn, $dbUser, $dbPwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} else {
    header("Location: index.php?error=403");
}

// ADD RANK
if (isset($_GET['add_rank']) && $_GET['add_rank'] == 'true') {
    if (!empty($_POST) && isset($_POST['addRank'])) {
        $rankLabel = $_POST['addRank'];
        addRank($dbh, $rankLabel);
    }
}
?>
<header class="dash-header">
    <nav>
        <a href="index.php">SIGN OUT</a>
        <a href="espaceAdmin.php">USERLIST</a>
    </nav>
    <p>
        <?php
        //QUERY
        if (isset($_SESSION['connected'], $_SESSION['u_id']) && $_SESSION['connected']) {

            echo $_SESSION['u_id'] . ' connected !';
        }
        ?>
    </p>
</header>
<section class="dash-list-container">
    <table class="list-table">
        <tbody>
            <th>Rank</th>
            <?php
            $rankList = listRank($dbh);
            foreach ($rankList as $value) {
                echo '<tr><td>' . $value['r_label'] . '</td></tr>';
            }
            ?>
        </tbody>
    </table>
    <form action="?add_rank=true" method="post" class="form-add-user" id="rankForm">
        <div class="labelFormDiv"><?php $rightsList = listRights($dbh); ?>
            <label for="addRank" id="rankLabelInput">Rank name : </label>
            <?php foreach ($rightsList as $right): ?>
                <label for="<?= $right['autorisation_label'] ?>"><?= $right['autorisation_label'] ?></label>

            <?php endforeach; ?>
        </div>
        <div>
            <input type="text" name="addRank" id="addRank">

            <?php foreach ($rightsList as $right): ?>
                <input type="checkbox" name="<?= $right['autorisation_label'] ?>" id="<?= $right['autorisation_label'] ?>">

            <?php endforeach; ?>
        </div>
        <div>
            <button type="submit">Add Rank</button>
        </div>
    </form>
</section>
<?php
include_once "include/footer.php";
session_write_close();
?>