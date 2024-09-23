<?php

class Message
{
    private $m_date;
    private $m_heure;
    private $auteur;
    private $contenu;

    public function __construct() {}

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public function list()
    {

        echo '<tr>';
        foreach ($this as $key => $value) {

            echo '<td>' . $value . '</td>';
        }
        echo '</tr>';
    }

    public function setM_date($value)
    {
        $this->m_date = $value;
    }
    public function setM_heure($value)
    {
        $this->m_heure = $value;
    }
    public function setAuteur($value)
    {
        $this->auteur = $value;
    }
    public function setContenu($value)
    {
        $this->contenu = $value;
    }
}
