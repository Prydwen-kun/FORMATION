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

    public function readAll($filter = 'titre', $maxOffre = 20): array
    {
        switch ($filter) {
            case 'titre':
                $sql = "SELECT offres.id, users.username AS auteur, title, content, salaire, cover, localisation
                FROM offres
                JOIN users ON offres.auteur_id = users.id
                ORDER BY title
                LIMIT :max
                ";
                break;
            case 'salaireASC':
                $sql = "SELECT offres.id, users.username AS auteur, title, content, salaire, cover, localisation
                FROM offres
                JOIN users ON offres.auteur_id = users.id
                ORDER BY salaire ASC
                LIMIT :max
                ";
                break;
            case 'salaireDESC':
                $sql = "SELECT offres.id, users.username AS auteur, title, content, salaire, cover, localisation
                FROM offres
                JOIN users ON offres.auteur_id = users.id
                ORDER BY salaire DESC
                LIMIT :max
                ";
                break;
            case 'entreprise':
                $sql = "SELECT offres.id, users.username AS auteur, title, content, salaire, cover, localisation
                FROM offres
                JOIN users ON offres.auteur_id = users.id
                ORDER BY auteur
                LIMIT :max
                ";
                break;
        }

        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                $this->_req->bindParam('max', $maxOffre, PDO::PARAM_INT);
                if ($this->_req->execute()) {
                    $datas = $this->_req->fetchAll(PDO::FETCH_ASSOC);
                    return $datas;
                }
            }
            return false;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
