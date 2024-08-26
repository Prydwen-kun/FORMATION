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

function addUser($dbh, string $email, string $password, int $r_id)
{
    //filter blank field and invalid password
    
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

function deleteUser($dbh, string $userToDeleteID)
{
    if ($_SESSION['rank'] == 1 && $userToDeleteID != 2) {
        try {
            $query = "DELETE FROM user 
            WHERE u_id = :u_id_to_delete";

            if (($req = $dbh->prepare($query))) {
                if (
                    ($req->bindValue(':u_id_to_delete', $userToDeleteID))
                ) {
                    if ($req->execute()) {
                        echo '<div class="userDelete"><p>User ' . $userToDeleteID . ' has been deleted !</p></div>';
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
            echo '<div class="userDelete"><p>An error has occured when trying to delete User ' . $userToDeleteID . ' !</p></div>';
        }
    }
}

function updateUser($dbh, string $userToUpdateID, string $email,string $password,$rank){
//filter blank field and modify only

}
