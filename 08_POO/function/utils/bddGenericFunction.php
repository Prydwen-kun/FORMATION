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

