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

    public function createOffer($auteurID, $post, $skills): bool
    {

        $titre = $post['titre'];
        $content = $post['content'];
        $salaire = $post['salaire'];

        $adresse = $post['adresse'];

        if (isset($_FILES["cover"])) {

            $targetDir = "coverUpload/";
            $targetFile = $targetDir . basename($_FILES["cover"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Check if file already exists
            if (file_exists($targetFile)) {
                $uploadOk = 0;
            }

            // Check file size (optional)
            if ($_FILES["cover"]["size"] > 500000) {
                $uploadOk = 0;
            }

            // Allow certain file formats (optional)
            $allowedExtensions = array("jpg", "jpeg", "png", "gif");
            if (!in_array($imageFileType, $allowedExtensions)) {
                $uploadOk = 0;
            }

            // Upload file
            if ($uploadOk == 1) {
                move_uploaded_file($_FILES["cover"]["tmp_name"], $targetFile);
                $cover = $targetFile;
            }
        } else {
            $cover = "Aucune couverture";
        }

        $query = "INSERT INTO offres VALUES(DEFAULT,:auteur,:titre,:content,:salaire,:cover,:adresse);";

        $this->_req = $this->getDb()->prepare($query);
        $this->_req->bindValue("titre", $titre, PDO::PARAM_STR);
        $this->_req->bindValue("auteur", $auteurID, PDO::PARAM_INT);
        $this->_req->bindValue("content", $content, PDO::PARAM_STR);
        $this->_req->bindValue("salaire", $salaire, PDO::PARAM_INT);
        $this->_req->bindValue("cover", $cover, PDO::PARAM_STR);
        $this->_req->bindValue("adresse", $adresse, PDO::PARAM_STR);
        $queryReturn = $this->_req->execute();
        $this->_req->closeCursor();

        $query = "SELECT id FROM offres WHERE title =:titre;";
        $this->_req = $this->getDb()->prepare($query);
        $this->_req->bindValue("titre", $titre, PDO::PARAM_STR);
        $queryReturn = $this->_req->execute();
        $offre_id = $this->_req->fetch(PDO::FETCH_ASSOC);
        $this->_req->closeCursor();

        foreach ($skills as $skill) {
            $skillLabel[] = $skill->getLabel();
        }

        foreach ($skills as $skill) {

            if (in_array($post[$skill->getLabel()], $skillLabel)) {
                $query = "INSERT INTO required_skills VALUES(DEFAULT,:skill_id,:offre_id);";
                $this->_req = $this->getDb()->prepare($query);
                $this->_req->bindValue("skill_id", $skill->getId(), PDO::PARAM_INT);
                $this->_req->bindValue("offre_id", $offre_id['id'], PDO::PARAM_INT);
                $queryReturn = $this->_req->execute();
                $this->_req->closeCursor();
            }
        }

        return $queryReturn;
    }

    public function delete($id)
    {
        $sql = "DELETE
        FROM offres
        WHERE offres.id =:id
        ";

        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {
                $this->_req->bindParam('id', $id, PDO::PARAM_INT);
                if ($this->_req->execute()) {
                    return true;
                }
            }
            return false;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
