<?php
session_start();
$currentPage = 'Conversation';
include_once "include/header.php";
require_once "function/utils/bddGenericFunction.php";
require_once "function/connexion/connexionBDD.php";
require_once "function/utils/generateList.php";
require_once "./classes/Conversation.php";

try {

    $query = 'SELECT c_id,
    DATE_FORMAT(c_date,"%d/%m/%Y") as c_date,
    DATE_FORMAT(c_date,"%H : %i : %s") as c_heure,
    COUNT(m_id) AS nbMessage,
    c_termine
    FROM conversation
    LEFT JOIN message ON c_id = m_conversation_fk
    GROUP BY c_id
    ORDER BY c_id
    LIMIT 20';

    if (($req = $dbh->prepare($query))) {
        if ($req->execute()) {
            $res = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();
        } else {
            echo '<pre>Erreur requête !</pre>';
        }
    } else {
        echo '<pre>Request prepare error !</pre>';
    }
} catch (PDOException $e) {
    echo '<pre>Erreur query DB ! ' . $e . '</pre>';
}

?>

<table class="tableList">
    <thead>
        <tr>
            <th>Id de la conversation</th>
            <th>Date de la conversation</th>
            <th>Heure de la conversation</th>
            <th>Nombre de message</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $conversations = [];
        foreach ($res as $key => $values) {

            $conversations[] = new Conversation();
            $conversations[array_key_last($conversations)]->hydrate($values);
        }
        foreach ($conversations as $conversation) {
            $conversation->list();
        }
        ?>
    </tbody>
</table>

<?php
include_once "include/footer.php";
session_write_close();
?>