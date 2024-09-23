<?php
$dsn = 'mysql:host=localhost;dbname=forum;charset=utf8';
$dbUser = 'root';
$dbPwd = '';

try {
    $dbh = new PDO($dsn, $dbUser, $dbPwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo '<pre>Erreur connexion DB ! ' . $e . '</pre>';
}

function connexionAdmin($dbh)
{
    //CONNEXION
    if (isset($_POST['user'], $_POST['password'])) {

        $u_id = $_POST['user'];
        $password = $_POST['password'];

        try {
            $query = "SELECT * 
                     FROM user
                     WHERE email = :u_id";

            if (($req = $dbh->prepare($query))) {
                if (($req->bindValue(':u_id', $u_id))) {
                    if ($req->execute()) {
                        $res = $req->fetchAll(PDO::FETCH_ASSOC);
                    } else {
                        echo 'Erreur requête !';
                    }
                } else {
                    echo 'Value bind error !';
                }
                $req->closeCursor();
                if ($u_id == $res['email'] && password_verify($password, $res['password'])) {
                    $_SESSION['connected'] = true;
                    $_SESSION['u_id'] = $u_id;
                } else {
                    header("Location: ?login=false");
                }
            } else {
                echo 'Request prepare error !';
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

