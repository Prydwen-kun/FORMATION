<?php
session_start();
$currentPage = 'Message';
include_once "include/header.php";
require_once "function/utils/bddGenericFunction.php";
require_once "function/connexion/connexionBDD.php";
require_once "function/utils/generateList.php";
require_once "./classes/Message.php";

$convo_id = -1;
if (isset($_GET['c_id'])) {
    $convo_id = $_GET['c_id'];
    $_SESSION['c_id'] = $convo_id;
}
if (isset($_SESSION['c_id'])) {
    $convo_id = $_SESSION['c_id'];
}

$pagelimit = 10;
if (isset($_POST['nbParPage'])) {
    $pagelimit = $_POST['nbParPage'];
}

try {

    $query = 'SELECT
     DATE_FORMAT(m_date,"%d/%m/%Y") AS m_date,
      DATE_FORMAT(m_date,"%H : %i : %s") AS m_heure,
       user.u_login AS auteur,
        m_contenu AS contenu 
        FROM conversation 
        JOIN message ON c_id = m_conversation_fk 
        JOIN user ON user.u_id = message.m_auteur_fk
        WHERE c_id =:convo_id 
        GROUP BY m_id 
        ORDER BY m_date 
        LIMIT :pagelimit';

    if (($req = $dbh->prepare($query))) {

        if (
            $req->bindValue('convo_id', $convo_id)
            && $req->bindValue('pagelimit', $pagelimit, PDO::PARAM_INT)
        ) {
            if ($req->execute()) {
                $res = $req->fetchAll(PDO::FETCH_ASSOC);
                $req->closeCursor();
            } else {
                echo '<pre>Erreur requête !</pre>';
            }
        }
    } else {
        echo '<pre>Request prepare error !</pre>';
    }
} catch (PDOException $e) {
    echo '<pre>Erreur query DB ! ' . $e . '</pre>';
}

if (empty($res)) {
    $convo_id = -1;
}
?>

<table class="tableList">
    <thead>
        <tr>
            <th>Date du message</th>
            <th>Heure du message</th>
            <th>Auteur</th>
            <th>Message</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($convo_id == -1) {
            header('Location: 404.php');
        } else {



            $messages = [];
            foreach ($res as $key => $values) {

                $messages[] = new Message();
                $messages[array_key_last($messages)]->hydrate($values);
            }
            foreach ($messages as $message) {
                $message->list();
            }
            if (empty($messages)) {
                echo '<tr><td>Cette conversion est vide pour le moment...</td></tr>';
            }
        }
        ?>
    </tbody>
</table>
<form action="" method="post" class="form-page">
    <label for="pageLimit">Par Page</label>
    <select name="nbParPage" id="pageLimit">
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="50">50</option>
    </select>
    <button>Change</button>
</form>
<?php
include_once "include/footer.php";
session_write_close();
?>