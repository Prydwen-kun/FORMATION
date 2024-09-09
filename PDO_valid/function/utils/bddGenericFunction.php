<?php
function listDwarves($dbh, $displayLimit)
{
    try {

        $query = "SELECT n_nom as nom,
         n_barbe as barbe, 
         n_groupe_fk as groupe, 
         v_nom as ville_natale, 
         taverne.t_nom as taverne, 
         g_debuttravail as Shift_Start, 
         g_fintravail as Shift_Fin, 
         tunnel.t_id as Tunnel,
         (SELECT v_nom 
         FROM ville 
         WHERE v_id = t_villedepart_fk) as ville_depart,
         (SELECT v_nom 
         FROM ville 
         WHERE v_id = t_villearrivee_fk) as ville_arrivee
        FROM nain
        LEFT JOIN groupe ON n_groupe_fk = g_id
        LEFT JOIN ville ON n_ville_fk =  v_id
        LEFT JOIN taverne ON g_taverne_fk = taverne.t_id 
        LEFT JOIN tunnel ON g_tunnel_fk = tunnel.t_id
        ORDER BY n_nom";

        if (($req = $dbh->prepare($query))) {
            if ($req->execute()) {
                $res = $req->fetchAll(PDO::FETCH_ASSOC);
                $req->closeCursor();
                return $res;
            } else {
                echo '<pre>Erreur requête !</pre>';
            }
        } else {
            echo '<pre>Request prepare error !</pre>';
        }
    } catch (PDOException $e) {
        echo '<pre>Erreur query DB ! ' . $e . '</pre>';
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

function selectDwarf($dbh, $dwarf_name)
{
    try {

        $query = "SELECT n_id as nainID
        FROM nain
        WHERE n_nom = :dwarf_name
        ";

        if (($req = $dbh->prepare($query))) {
            if ($req->bindValue(':dwarf_name', $dwarf_name)) {
                if ($req->execute()) {
                    $res = $req->fetch(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $res['nainID'];
                } else {
                    echo '<pre>Erreur requête !</pre>';
                }
            } else {
                echo '<pre>Erreur bind value!</pre>';
            }
        } else {
            echo '<pre>Request prepare error !</pre>';
        }
    } catch (PDOException $e) {
        echo '<pre>Erreur query DB ! ' . $e . '</pre>';
    }
}

function getDwarfInfo($dbh, $dwarf_name)
{
    try {

        $query = "SELECT n_nom as nom,
         n_barbe as barbe, 
         n_groupe_fk as groupe, 
         v_nom as ville_natale, 
         taverne.t_nom as taverne, 
         g_debuttravail as Shift_Start, 
         g_fintravail as Shift_Fin, 
         tunnel.t_id as Tunnel,
         (SELECT v_nom 
         FROM ville 
         WHERE v_id = t_villedepart_fk) as ville_depart,
         (SELECT v_nom 
         FROM ville 
         WHERE v_id = t_villearrivee_fk) as ville_arrivee
        FROM nain
        LEFT JOIN groupe ON n_groupe_fk = g_id
        LEFT JOIN ville ON n_ville_fk =  v_id
        LEFT JOIN taverne ON g_taverne_fk = taverne.t_id 
        LEFT JOIN tunnel ON g_tunnel_fk = tunnel.t_id
        WHERE n_nom = :dwarf_name
        ORDER BY n_nom";

        if (($req = $dbh->prepare($query))) {
            if ($req->bindValue(':dwarf_name', $dwarf_name)) {
                if ($req->execute()) {
                    $res = $req->fetchAll(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $res;
                } else {
                    echo '<pre>Erreur requête !</pre>';
                }
            } else {
                echo '<pre>Erreur bind value!</pre>';
            }
        } else {
            echo '<pre>Request prepare error !</pre>';
        }
    } catch (PDOException $e) {
        echo '<pre>Erreur query DB ! ' . $e . '</pre>';
    }
}

function listGroup($dbh)
{
    try {

        $query = "SELECT g_id as group_ID, taverne.t_nom as taverne
        FROM groupe
        LEFT JOIN taverne ON g_taverne_fk = taverne.t_id
        ORDER BY g_id
        ";

        if (($req = $dbh->prepare($query))) {

            if ($req->execute()) {
                $res = $req->fetchAll(PDO::FETCH_ASSOC);
                $req->closeCursor();
                return $res;
            } else {
                echo '<pre>Erreur requête !</pre>';
            }
        } else {
            echo '<pre>Request prepare error !</pre>';
        }
    } catch (PDOException $e) {
        echo '<pre>Erreur query DB ! ' . $e . '</pre>';
    }
}
function getGroup($dbh, $grp_id)
{
    try {

        $query = "SELECT g_id as group_ID, taverne.t_nom as taverne
        FROM groupe
        JOIN taverne ON g_taverne_fk = taverne.t_id
        WHERE g_id = :grp_id
        ";

        if (($req = $dbh->prepare($query))) {
            if ($req->bindValue(':grp_id', $grp_id)) {
                if ($req->execute()) {
                    $res = $req->fetchAll(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $res;
                } else {
                    echo '<pre>Erreur requête !</pre>';
                }
            } else {
                echo '<pre>Erreur bind value!</pre>';
            }
        } else {
            echo '<pre>Request prepare error !</pre>';
        }
    } catch (PDOException $e) {
        echo '<pre>Erreur query DB ! ' . $e . '</pre>';
    }
}
function getCity($dbh, $city_name)
{
    try {

        $query = "SELECT v_nom as nom,
        v_superficie as superficie
        FROM ville
        WHERE v_nom = :city_name
        ";

        if (($req = $dbh->prepare($query))) {
            if ($req->bindValue(':city_name', $city_name)) {
                if ($req->execute()) {
                    $res = $req->fetchAll(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $res;
                } else {
                    echo '<pre>Erreur requête !</pre>';
                }
            } else {
                echo '<pre>Erreur bind value!</pre>';
            }
        } else {
            echo '<pre>Request prepare error !</pre>';
        }
    } catch (PDOException $e) {
        echo '<pre>Erreur query DB ! ' . $e . '</pre>';
    }
}
function getCityID($dbh, $city_name)
{
    try {

        $query = "SELECT v_id as id
        FROM ville
        WHERE v_nom = :city_name
        ";

        if (($req = $dbh->prepare($query))) {
            if ($req->bindValue(':city_name', $city_name)) {
                if ($req->execute()) {
                    $res = $req->fetch(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $res['id'];
                } else {
                    echo '<pre>Erreur requête !</pre>';
                }
            } else {
                echo '<pre>Erreur bind value!</pre>';
            }
        } else {
            echo '<pre>Request prepare error !</pre>';
        }
    } catch (PDOException $e) {
        echo '<pre>Erreur query DB ! ' . $e . '</pre>';
    }
}
function listCities($dbh)
{
    try {

        $query = "SELECT v_nom as nom,
        v_superficie as superficie
        FROM ville
        ORDER BY v_nom
        ";

        if (($req = $dbh->prepare($query))) {

            if ($req->execute()) {
                $res = $req->fetchAll(PDO::FETCH_ASSOC);
                $req->closeCursor();
                return $res;
            } else {
                echo '<pre>Erreur requête !</pre>';
            }
        } else {
            echo '<pre>Request prepare error !</pre>';
        }
    } catch (PDOException $e) {
        echo '<pre>Erreur query DB ! ' . $e . '</pre>';
    }
}
function listTavern($dbh)
{
    try {

        $query = "SELECT t_nom as nom,
        t_chambres as nombre_chambre,
        v_nom as ville,
        t_blonde as blonde,
        t_brune as brune,
        t_rousse as rousse
        FROM taverne
        LEFT JOIN ville ON v_id = t_ville_fk
        ORDER BY t_nom
        ";

        if (($req = $dbh->prepare($query))) {

            if ($req->execute()) {
                $res = $req->fetchAll(PDO::FETCH_ASSOC);
                $req->closeCursor();
                return $res;
            } else {
                echo '<pre>Erreur requête !</pre>';
            }
        } else {
            echo '<pre>Request prepare error !</pre>';
        }
    } catch (PDOException $e) {
        echo '<pre>Erreur query DB ! ' . $e . '</pre>';
    }
}

function getTavern($dbh, $tavernName)
{
    try {

        $query = "SELECT t_nom as nom,
        t_chambres as nombre_chambre,
        v_nom as ville,
        t_blonde as blonde,
        t_brune as brune,
        t_rousse as rousse
        FROM taverne
        LEFT JOIN ville ON v_id = t_ville_fk
        WHERE t_nom =:tavernName
        ";

        if (($req = $dbh->prepare($query))) {
            if ($req->bindValue(':tavernName', $tavernName)) {
                if ($req->execute()) {
                    $res = $req->fetchAll(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $res;
                } else {
                    echo '<pre>Erreur requête !</pre>';
                }
            } else {
                echo '<pre>Erreur bind value!</pre>';
            }
        } else {
            echo '<pre>Request prepare error !</pre>';
        }
    } catch (PDOException $e) {
        echo '<pre>Erreur query DB ! ' . $e . '</pre>';
    }
}
function listDwarvesFromCity($dbh, $city_name)
{
    try {

        $query = "SELECT n_nom as nom
        FROM nain
        LEFT JOIN ville ON v_id = n_ville_fk
        WHERE v_nom = :city_name
        ORDER BY n_nom
        ";

        if (($req = $dbh->prepare($query))) {
            if ($req->bindValue(':city_name', $city_name)) {
                if ($req->execute()) {
                    $res = $req->fetchAll(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $res;
                } else {
                    echo '<pre>Erreur requête !</pre>';
                }
            } else {
                echo '<pre>Erreur bind value!</pre>';
            }
        } else {
            echo '<pre>Request prepare error !</pre>';
        }
    } catch (PDOException $e) {
        echo '<pre>Erreur query DB ! ' . $e . '</pre>';
    }
}
function listTavernFromCity($dbh, $city_name)
{
    try {

        $query = "SELECT t_nom as nom
        FROM taverne
        LEFT JOIN ville ON v_id = t_ville_fk
        WHERE v_nom = :city_name
        ORDER BY t_nom
        ";

        if (($req = $dbh->prepare($query))) {
            if ($req->bindValue(':city_name', $city_name)) {
                if ($req->execute()) {
                    $res = $req->fetchAll(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $res;
                } else {
                    echo '<pre>Erreur requête !</pre>';
                }
            } else {
                echo '<pre>Erreur bind value!</pre>';
            }
        } else {
            echo '<pre>Request prepare error !</pre>';
        }
    } catch (PDOException $e) {
        echo '<pre>Erreur query DB ! ' . $e . '</pre>';
    }
}

function listTunnelFromCity($dbh, $city_id)
{
    try {

        $query = "SELECT v_nom as nom, t_progres as progres
        FROM tunnel
        JOIN ville ON v_id = t_villearrivee_fk
        WHERE t_villedepart_fk = :city_id
        ";

        if (($req = $dbh->prepare($query))) {
            if ($req->bindValue(':city_id', $city_id)) {
                if ($req->execute()) {
                    $res = $req->fetchAll(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $res;
                } else {
                    echo '<pre>Erreur requête !</pre>';
                }
            } else {
                echo '<pre>Erreur bind value!</pre>';
            }
        } else {
            echo '<pre>Request prepare error !</pre>';
        }
    } catch (PDOException $e) {
        echo '<pre>Erreur query DB ! ' . $e . '</pre>';
    }
}

function listTunnelToCity($dbh, $city_id)
{
    try {

        $query = "SELECT v_nom as nom, t_progres as progres
        FROM tunnel
        JOIN ville ON v_id = t_villedepart_fk
        WHERE t_villearrivee_fk = :city_id
        ";

        if (($req = $dbh->prepare($query))) {
            if ($req->bindValue(':city_id', $city_id)) {
                if ($req->execute()) {
                    $res = $req->fetchAll(PDO::FETCH_ASSOC);
                    $req->closeCursor();
                    return $res;
                } else {
                    echo '<pre>Erreur requête !</pre>';
                }
            } else {
                echo '<pre>Erreur bind value!</pre>';
            }
        } else {
            echo '<pre>Request prepare error !</pre>';
        }
    } catch (PDOException $e) {
        echo '<pre>Erreur query DB ! ' . $e . '</pre>';
    }
}

function changeGroupe($dbh, $dwarfID, $groupNum)
{
    try {

        $query = "UPDATE nain
        SET n_groupe_fk = :groupNum
        WHERE n_id = :dwarfID
        ";
        if (($req = $dbh->prepare($query))) {
            if (
                $req->bindValue(':dwarfID', $dwarfID)
                && $req->bindValue(':groupNum', $groupNum)
            ) {
                if ($req->execute()) {

                    $req->closeCursor();
                    return 'success';
                } else {
                    echo '<pre>Erreur requête !</pre>';
                }
            } else {
                echo '<pre>Erreur bind value!</pre>';
            }
        } else {
            echo '<pre>Request prepare error !</pre>';
        }
    } catch (PDOException $e) {
        echo '<pre>Erreur query DB ! ' . $e . '</pre>';
    }
}

function getDwarvesFromTavern(){}