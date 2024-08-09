<?php
function listUsers($dsn, $dbUser, $dbPwd, $displayLimit): array
{
    try {
        $dbh = new PDO($dsn, $dbUser, $dbPwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $query = "SELECT * FROM user ORDER BY u_id LIMIT :displayLimit;";

        if (($req = $dbh->prepare($query))) {
            if (($req->bindValue(':displayLimit', $displayLimit))) {
                if ($req->execute()) {
                    $res = $req->fetchAll(PDO::FETCH_ASSOC);
                    $returnResponse= $res;
                    $req->closeCursor();
                    return $returnResponse;
                } else {
                    echo 'Erreur requête !';
                    return [];
                }
            } else {
                echo 'Value bind error !';
                return [];
            }
        } else {
            echo 'Request prepare error !';
            return [];
        }
    } catch (PDOException $e) {
        return [$e];
    }
}
