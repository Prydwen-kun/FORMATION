<?php
class Skill
{

  private $id;
  private $label;
  //properties


  public function __construct(array $data)
  {
    $this->hydrate($data);
  }


  private function hydrate(array $data) :void
  {
    foreach ($data as $key => $value) {
      // si vous gardez le prefixage dans la requete SQL des model
      // $methodName = 'set' . ucfirst(substr($key, 2, strlen($key) - 2));

      # On peut faire comme ça car dans toute les requetes on alias tous les noms de colonnes
      $methodName = 'set' . ucfirst($key);

      if (method_exists($this, $methodName)) {
        $this->$methodName($value);
      }
    }

   
  } 
  //GETTERS AND SETTERS


  /**
   * Get the value of label
   */ 
  public function getLabel()
  {
    return $this->label;
  }

  /**
   * Set the value of label
   *
   * @return  self
   */ 
  public function setLabel($label)
  {
    $this->label = $label;

    return $this;
  }

  /**
   * Get the value of _id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of _id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }
}
?>
