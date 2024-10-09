<?php
class OffreModel extends CoreModel
{
    // Model-specific functionality goes here
    private $_req;

    public function __destruct()
    {
        if (!empty($this->_req)) {
            $this->_req->closeCursor();
        }
    }

    public function readAll(): array
    {

        $sql = "SELECT offres.id, auteur_id AS auteur, title, content, salaire, cover, localisation
                FROM offres
                ORDER BY title
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
