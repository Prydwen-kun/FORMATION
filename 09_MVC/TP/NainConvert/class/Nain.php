<?php
class Nain
{
  private $id;
  private $nom;
  private $barbe;
  private $groupe;
  private $ville_natale;
  private $taverne;
  private $shift_start;
  private $shift_end;
  private $tunnel;

  //properties


  public function __construct(array $data)
  {
    $this->hydrate($data);
  }


  private function hydrate(array $data): void
  {
    foreach ($data as $key => $value) {

      $methodName = 'set' . ucfirst($key);

      if (method_exists($this, $methodName)) {
        $this->$methodName($value);
      }
    }
  }

  /**
   * Get the value of nom
   */
  public function getNom()
  {
    return $this->nom;
  }

  /**
   * Set the value of nom
   *
   * @return  self
   */
  public function setNom($nom)
  {
    $this->nom = $nom;

    return $this;
  }

  /**
   * Get the value of barbe
   */
  public function getBarbe()
  {
    return $this->barbe;
  }

  /**
   * Set the value of barbe
   *
   * @return  self
   */
  public function setBarbe($barbe)
  {
    $this->barbe = $barbe;

    return $this;
  }

  /**
   * Get the value of groupe
   */
  public function getGroupe()
  {
    return $this->groupe;
  }

  /**
   * Set the value of groupe
   *
   * @return  self
   */
  public function setGroupe($groupe)
  {
    $this->groupe = $groupe;

    return $this;
  }

  /**
   * Get the value of ville_natale
   */
  public function getVille_natale()
  {
    return $this->ville_natale;
  }

  /**
   * Set the value of ville_natale
   *
   * @return  self
   */
  public function setVille_natale($ville_natale)
  {
    $this->ville_natale = $ville_natale;

    return $this;
  }

  /**
   * Get the value of taverne
   */
  public function getTaverne()
  {
    return $this->taverne;
  }

  /**
   * Set the value of taverne
   *
   * @return  self
   */
  public function setTaverne($taverne)
  {
    $this->taverne = $taverne;

    return $this;
  }

  /**
   * Get the value of shift_start
   */
  public function getShift_start()
  {
    return $this->shift_start;
  }

  /**
   * Set the value of shift_start
   *
   * @return  self
   */
  public function setShift_start($shift_start)
  {
    $this->shift_start = $shift_start;

    return $this;
  }

  /**
   * Get the value of shift_end
   */
  public function getShift_end()
  {
    return $this->shift_end;
  }

  /**
   * Set the value of shift_end
   *
   * @return  self
   */
  public function setShift_end($shift_end)
  {
    $this->shift_end = $shift_end;

    return $this;
  }

  /**
   * Get the value of tunnel
   */
  public function getTunnel()
  {
    return $this->tunnel;
  }

  /**
   * Set the value of tunnel
   *
   * @return  self
   */
  public function setTunnel($tunnel)
  {
    $this->tunnel = $tunnel;

    return $this;
  }

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
}
