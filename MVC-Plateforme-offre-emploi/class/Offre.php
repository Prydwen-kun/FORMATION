<?php
class Offre
{

  private $id;
  private $auteur;
  private $title;
  private $content;
  private $salaire;
  private $cover;
  private $localisation;
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
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of auteur
   */ 
  public function getAuteur()
  {
    return $this->auteur;
  }

  /**
   * Set the value of auteur
   *
   * @return  self
   */ 
  public function setAuteur($auteur)
  {
    $this->auteur = $auteur;

    return $this;
  }

  /**
   * Get the value of title
   */ 
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Set the value of title
   *
   * @return  self
   */ 
  public function setTitle($title)
  {
    $this->title = $title;

    return $this;
  }

  /**
   * Get the value of content
   */ 
  public function getContent()
  {
    return $this->content;
  }

  /**
   * Set the value of content
   *
   * @return  self
   */ 
  public function setContent($content)
  {
    $this->content = $content;

    return $this;
  }

  /**
   * Get the value of salaire
   */ 
  public function getSalaire()
  {
    return $this->salaire;
  }

  /**
   * Set the value of salaire
   *
   * @return  self
   */ 
  public function setSalaire($salaire)
  {
    $this->salaire = $salaire;

    return $this;
  }

  /**
   * Get the value of cover
   */ 
  public function getCover()
  {
    return $this->cover;
  }

  /**
   * Set the value of cover
   *
   * @return  self
   */ 
  public function setCover($cover)
  {
    $this->cover = $cover;

    return $this;
  }

  /**
   * Get the value of localisation
   */ 
  public function getLocalisation()
  {
    return $this->localisation;
  }

  /**
   * Set the value of localisation
   *
   * @return  self
   */ 
  public function setLocalisation($localisation)
  {
    $this->localisation = $localisation;

    return $this;
  }
}
?>
