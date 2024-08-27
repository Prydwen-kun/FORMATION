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
    if (
        !empty($_POST)
        && !empty($_POST['addLogin'])
        && !empty($_POST['addPassword'])
        && !empty($_POST['addRank'])
    ) {
        $email_add = $_POST['addLogin'];
        $password_add = $_POST['addPassword'];
        $r_id_add = $_POST['addRank'];
        addUser($dbh, $email_add, $password_add, $r_id_add);
    } else if (empty($_POST['addLogin']) || empty($_POST['addPassword'])) {
        echo 'Login ou Password field est vide !';
    }
}

//DELETE USER
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    deleteUser($dbh, $_GET['user_id']);
}

//UPDATE USER meme div de debug que delete thx
if (isset($_GET['action'], $_GET['user_id']) && $_GET['action'] == 'update') {
    $_SESSION['form_mode'] = 'update';
    $_SESSION['u_id_ToUpdate'] = $_GET['user_id'];
    $user = getUser($dbh, $_GET['user_id']);
    if (is_array($user)) {
        //USE THIS IN THE UPDATE FORM FOR FILL
        $user_u_id = $user['u_id'];
        $user_u_email = $user['email'];
        $user_u_rank = $user['r_id'];
    }
}
//gere le flag form_mode pour changer le form de add à modif
if (!isset($_SESSION['form_mode'])) {
    $_SESSION['form_mode'] = 'addUser';
    $form_mode = $_SESSION['form_mode'];
} elseif (isset($_GET['form']) && $_GET['form'] == 'add') {
    $_SESSION['form_mode'] = 'addUser';
    $form_mode = $_SESSION['form_mode'];
} else {
    $form_mode = $_SESSION['form_mode'];
}
//change the form to update or add users

if (isset($_GET['user_update']) && $_GET['user_update'] == 'true') {
    $user = getUser($dbh, $_SESSION['u_id_ToUpdate']);
    if (is_array($user)) {
        //USE THIS IN THE UPDATE FORM FOR FILL
        $user_u_id = $user['u_id'];
        $user_u_email = $user['email'];
        $user_u_rank = $user['r_id'];
    }
    if (
        isset($_POST['addLogin']) || isset($_POST['addPassword']) || isset($_POST['addRank'])
    ) {
        $email_update = $_POST['addLogin'];
        $password_update = $_POST['addPassword'];
        $r_id_update = $_POST['addRank'];
        updateUser($dbh, $_GET['user_id'], $email_update, $password_update, $r_id_update);
    }
}

if (isset($_SESSION['u_id'])) {
    $userLogin = $_SESSION['u_id'];
}

?>
<header class="dash-header">
    <nav>
        <a href="index.php">SIGN OUT</a>
        <?php if (isset($_SESSION['rank']) && $_SESSION['rank'] == 1): ?>
            <a href="addRank.php">ADD RANK</a>
        <?php endif; ?>
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
                //remove delete button if user not super admin

                echo '<td>';
                if ($_SESSION['rank'] == 1) {
                    echo '<a href="?user_id=' . $tempUserId . '&action=delete' . '">SUPPRIMER</a>';
                }
                if ($_SESSION['rank'] == 1 || $_SESSION['rank'] == 2) {
                    echo '<a href="?user_id=' . $tempUserId . '&action=update" class="updateButton">MODIFIER</a>';
                }
                echo '</td></tr>';
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
    <!-- FORM -->
    <?php if ($form_mode == 'addUser' && ($_SESSION['rank'] == 1 || $_SESSION['rank'] == 2)): ?>
        <!-- form to add user -->
        <form action="?add_user=true" method="post" class="form-add-user">
            <div>
                <label for="addLogin">Username or email : </label>
                <label for="addPassword">Password : </label>
                <label for="addRank">Rank : </label>

            </div>
            <div>
                <input type="text" name="addLogin" id="addLogin" required>
                <input type="password" name="addPassword" id="addPassword" required>
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
    <?php endif; ?>
    <?php if ($form_mode == 'update'): ?>
        <!-- form to update user need to test form for error -->
        <form action="?user_update=true<?php if (isset($_GET['user_id'])) {
                                            echo '&user_id=' . $_GET['user_id'];
                                        } ?>" method="post" class="form-add-user">
            <div class="userToUpdate">User <?php if (isset($_SESSION['u_id_ToUpdate'])) {
                                                echo $_SESSION['u_id_ToUpdate'];
                                            } ?></div>
            <div>
                <label for="addLogin">Username or email : </label>
                <label for="addPassword">Password : </label>
                <label for="addRank">Rank : </label>

            </div>
            <div>
                <input type="text" name="addLogin" id="addLogin"
                    value="<?php
                            if (isset($user_u_email)) {
                                echo $user_u_email;
                            } ?>"
                    placeholder="<?php
                                    if (isset($user_u_email)) {
                                        echo $user_u_email;
                                    } ?>">
                <input type="password" name="addPassword" id="addPassword">
                <select name="addRank" id="addRank">
                    <?php

                    $rankList = listRank($dbh);
                    foreach ($rankList as $value) {
                        foreach ($value as $key => $data) {
                            if ($key == 'r_label' && $value['r_id'] == $user_u_rank) {
                                echo '<option value="' . $value['r_id'] . '" selected>' . $data . '</option>';
                            } else if ($key == 'r_label') {
                                echo '<option value="' . $value['r_id'] . '">' . $data . '</option>';
                            }
                        }
                    }
                    ?>

                </select>
            </div>
            <div>
                <button type="submit">Modifier</button>
                <a href="?form=add">Back to Add</a>
            </div>
        </form>
    <?php endif; ?>
</section>

<?php
include_once "include/footer.php";
session_write_close();
?>