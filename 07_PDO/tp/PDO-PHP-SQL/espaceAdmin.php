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
        $query = "SELECT * 
        FROM user 
        JOIN role ON user.r_id = role.r_id 
        JOIN possede ON role.r_id = possede.r_id 
        JOIN autorisation ON possede.autorisation_id = autorisation.autorisation_id 
        WHERE email = :u_id";

        if (($req = $dbh->prepare($query))) {
            if (($req->bindValue(':u_id', $u_id))) {
                if ($req->execute()) {


                    $res_with_rights = $req->fetchAll(PDO::FETCH_ASSOC);
                    $res = $res_with_rights[0]; //$req->fetch(PDO::FETCH_ASSOC);

                    $rights = extractRights($res_with_rights);

                    // var_dump($res_with_rights);
                    // var_dump($res);
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
                $_SESSION['rank'] = $res['r_id'];
                $_SESSION['rights'] = $rights;
                // var_dump($_SESSION['rights']);
            } else {
                header("Location: index.php?login=false");
            }
        } else {
            echo 'Request prepare error !';
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
} elseif (isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
    $dbh = new PDO($dsn, $dbUser, $dbPwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} else {
    header("Location: index.php?error=403");
}

//ADD USER
if (isset($_GET['add_user']) && $_GET['add_user'] == 'true') {
    if (!empty($_POST) && isset($_POST['addLogin'])) {
        $email_add = $_POST['addLogin'];
        $password_add = $_POST['addPassword'];
        $r_id_add = $_POST['addRank'];
        addUser($dbh, $email_add, $password_add, $r_id_add);
    }
}

if (isset($_SESSION['u_id'])) {
    $userLogin = $_SESSION['u_id'];
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

            echo $userLogin . ' connected !';
        }
        ?>
    </p>
</header>
<section class="dash-list-container">
    <table class="list-table">
        <tbody>
            <?php
            $users = listUsers($dbh, 5);

            echo '<th>u_id</th>
                <th>login</th>
                <th>rank</th>
                <th>action</th>';

            foreach ($users as $key => $user) {
                echo '<tr>';
                $tempUserId = 0;
                foreach ($user as $key => $value) {
                    if ($key == 'password' || $key == 'r_id' || $key == 'autorisation_id' || $key == 'autorisation_label') {
                        continue;
                    }
                    echo '<td>' . $value . '</td>';

                    if ($key == 'u_id') {
                        $tempUserId = $value;
                    }
                }

                echo '<td><a href="?user_id=' . $tempUserId . '">SUPPRIMER</a></td></tr>';
            }
            ?>
        </tbody>
    </table>
    <div class="rights-list">Vous avez les droits suivant :
        <?php
        if (isset($_SESSION['rights'])) {
            foreach ($_SESSION['rights'] as $right) {
                echo '<p> ' . $right . ', </p>';
            }
        }

        ?>
    </div>

    <form action="?add_user=true" method="post" class="form-add-user">
        <div>
            <label for="addLogin">Username or email : </label>
            <label for="addPassword">Password : </label>
            <label for="addRank">Rank : </label>

        </div>
        <div>
            <input type="text" name="addLogin" id="addLogin">
            <input type="password" name="addPassword" id="addPassword">
            <select name="addRank" id="addRank">
                <?php

                $rankList = listRank($dbh);
                foreach ($rankList as $value) {
                    foreach ($value as $key => $data) {
                        if ($key == 'r_label') {
                            echo '<option value="' . $value['r_id'] . '">' . $data . '</option>';
                        }
                    }
                }
                ?>

            </select>
        </div>
        <div>
            <button type="submit">Add User</button>
        </div>
    </form>
</section>

<?php
include_once "include/footer.php";
session_write_close();
?>