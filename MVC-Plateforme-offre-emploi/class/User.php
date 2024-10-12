<?php

class User
{

    private $id;
    private $username;
    private $password;
    private $email;
    private $last_login;
    private $role_id;
    private $role;
    private $spe_id;
    private $specialite;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }


    private function hydrate(array $data): void
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
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of last_login
     */
    public function getLast_login()
    {
        return $this->last_login;
    }

    /**
     * Set the value of last_login
     *
     * @return  self
     */
    public function setLast_login($last_login)
    {
        $this->last_login = $last_login;

        return $this;
    }

    /**
     * Get the value of role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of specialite
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * Set the value of specialite
     *
     * @return  self
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * Get the value of role_id
     */ 
    public function getRole_id()
    {
        return $this->role_id;
    }

    /**
     * Set the value of role_id
     *
     * @return  self
     */ 
    public function setRole_id($role_id)
    {
        $this->role_id = $role_id;

        return $this;
    }

    /**
     * Get the value of spe_id
     */ 
    public function getSpe_id()
    {
        return $this->spe_id;
    }

    /**
     * Set the value of spe_id
     *
     * @return  self
     */ 
    public function setSpe_id($spe_id)
    {
        $this->spe_id = $spe_id;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
