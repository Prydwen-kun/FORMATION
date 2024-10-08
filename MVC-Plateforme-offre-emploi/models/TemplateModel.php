<?php
class TemplateModel extends CoreModel
{
  // Model-specific functionality goes here
  private $_req;

  public function __destruct()
  {
    if (!empty($this->_req)) {
      $this->_req->closeCursor();
    }
  }

  public function readAll(): array {

    $sql = "SELECT n_id as id,
    n_nom as nom,
    n_barbe as barbe, 
    n_groupe_fk as groupe, 
    v_nom as ville_natale, 
    taverne.t_nom as taverne, 
    g_debuttravail as Shift_Start, 
    g_fintravail as Shift_End, 
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
   ORDER BY n_id
         ";

try {
 if (($this->_req = $this->getDb()->prepare($sql)) !== false) {

   if ($this->_req->execute()) {
     $datas = $this->_req->fetchAll();
     return $datas;
   }
 }
 return false;
} catch (PDOException $e) {
 die($e->getMessage());
}
  }
}
