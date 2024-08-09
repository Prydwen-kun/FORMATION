<?php
session_start();
$currentPage = 'Espace Admin';
include_once "include/header.php";
require_once "function/function.php";


$dsn = 'mysql:host=localhost;dbname=espaceadmin;charset=utf8';
$dbUser = 'root';
$dbPwd = '';


//CONNEXION
if (isset($_POST['userID'], $_POST['password'])) {

    $u_id = $_POST['userID'];
    $password = $_POST['password'];

    try {
        $dbh = new PDO($dsn, $dbUser, $dbPwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $query = "SELECT * FROM user WHERE email = :u_id";

        if (($req = $dbh->prepare($query))) {
            if (($req->bindValue(':u_id', $u_id))) {
                if ($req->execute()) {
                    $res = $req->fetch(PDO::FETCH_ASSOC);
                    var_dump($res);
                } else {
                    echo 'Erreur requête !';
                }
            } else {
                echo 'Value bind error !';
            }
            $req->closeCursor();
            if ($u_id == $res['email'] && $password == $res['password']) {
                $_SESSION['connected'] = true;
                $_SESSION['u_id'] = $u_id;
            } else {
                header("Location: index.php?login=false");
            }
        } else {
            echo 'Request prepare error !';
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
} else {
    header("Location: index.php?error=403");
}

?>
<header class="dash-header">
    <nav>
        <a href="index.php">SIGN OUT</a>
    </nav>
    <p>
        <?php
        //QUERY
        if (isset($_SESSION['connected'], $_SESSION['u_id']) && $_SESSION['connected']) {

            echo $u_id . ' connected !';
        }
        ?>
    </p>
</header>
<section>
    <table>
        <tbody>
            <?php
            $users = listUsers($dsn, $dbUser, $dbPwd, 5);
            foreach ($users as $key => $user) {
                echo '<tr>';
                foreach ($user as $value) {
                    foreach ($value as $data) {
                        echo '<td>';
                        var_dump($data);
                        echo '</td>';
                    }
                }
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</section>

<?php
include_once "include/footer.php";
session_write_close();
?>