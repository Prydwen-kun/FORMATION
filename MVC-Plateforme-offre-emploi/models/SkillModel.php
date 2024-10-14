<?php
class SkillModel extends CoreModel
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

        $sql = "SELECT id,label 
                FROM skills
                ORDER BY id
         ";

        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {

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

    public function getSkillFromOffer($offerID)
    {
        $sql = "SELECT skills.label as label 
        FROM required_skills
        JOIN skills ON skills.id = required_skills.skill_id_fk
        WHERE required_skills.offre_id_fk = :offerID
        ";

        try {
            if (($this->_req = $this->getDb()->prepare($sql)) !== false) {

                if ($this->_req->execute(['offerID' => $offerID])) {
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
