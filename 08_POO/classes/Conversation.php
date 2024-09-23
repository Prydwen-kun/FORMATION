<?php

class Conversation
{
    private $id;
    private $date;
    private $heure;
    private $nbMessage;
    private $termine;
    public function __construct() {}

    public function hydrate(array $data)
    {
        $this->id = $data['c_id'];
        $this->date = $data['c_date'];
        $this->heure = $data['c_heure'];
        $this->nbMessage = $data['nbMessage'];
        $this->termine = $data['c_termine'];
    }

    public function list()
    {
        if ($this->termine == '0') {
            echo '<tr class="opened">';
        } else {
            echo '<tr class="closed">';
        }

        foreach ($this as $key => $value) {
            if ($key != 'termine') {
                echo '<td>' . $value . '</td>';
            }
        }
        echo '<td><a href="message.php?c_id=' . $this->id . '">voir messages</a></td>';
        echo '</tr>';
    }

    public function setId($value)
    {
        $this->id = $value;
    }
    public function setDate($value)
    {
        $this->date = $value;
    }
    public function setHeure($value)
    {
        $this->heure = $value;
    }
    public function setNbMessage($value)
    {
        $this->nbMessage = $value;
    }
}
