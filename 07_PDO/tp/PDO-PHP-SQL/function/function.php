<?php
function listUsers($dbh, $displayLimit): array
{
    try {

        $query = "SELECT *
        FROM user
        JOIN role ON user.r_id = role.r_id 
        JOIN possede ON role.r_id = possede.r_id 
        JOIN autorisation ON possede.autorisation_id = autorisation.autorisation_id 
        GROUP BY email 
        ORDER BY u_id"; //LIMIT :displayLimit;

        if (($req = $dbh->prepare($query))) {
            if (true/*($req->bindValue(':displayLimit', $displayLimit))*/) {
                if ($req->execute()) {
                    $res = $req->fetchAll(PDO::FETCH_ASSOC);
                    $returnResponse = $res;
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

function extractRights(array $response_with_rights): array
{
    $rights = [];
    foreach ($response_with_rights as $key => $request_row) {
        foreach ($request_row as $key => $value) {
            if ($key == 'autorisation_label') {
                $rights[] = $value;
            }
        }
    }
    return $rights;
}

function listRank($dbh): array
{
    try {
        $query = "SELECT *
        FROM role
        ORDER BY r_id";

        if (($req = $dbh->prepare($query))) {

            if ($req->execute()) {
                $res = $req->fetchAll(PDO::FETCH_ASSOC);
                $returnResponse = $res;
                $req->closeCursor();
                return $returnResponse;
            } else {
                echo 'Erreur requête !';
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

function addUser($dbh, $email, $password, $r_id)
{
    try {
        $query = "INSERT INTO user 
        VALUES(DEFAULT,:email,:password,:r_id)";

        if (($req = $dbh->prepare($query))) {
            if (
                ($req->bindValue(':email', $email)) &&
                ($req->bindValue(':password', $password)) &&
                ($req->bindValue(':r_id', $r_id))
            ) {
                if ($req->execute()) {
                    
                } else {
                    echo 'Erreur requête !';
                }
            } else {
                echo 'Value bind error !';  
            }
        } else {
            echo 'Request prepare error !'; 
        }
    } catch (PDOException $e) {
    }
}
