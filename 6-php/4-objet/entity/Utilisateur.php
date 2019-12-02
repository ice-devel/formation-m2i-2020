<?php
class Utilisateur
{
    /*
     * Propriétés
     */
    private $id;
    private $createdAt;
    private $name;
    private $email;
    private $isEnabled;

    /*
     * Constructor
     */
    public function __construct($id, $name, $email, $isEnabled, $createdAt=null)
    {
        if ($createdAt == null) {
            $createdAt = new DateTime();
        }

        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->name = $name;
        $this->email = $email;
        $this->isEnabled = $isEnabled;
    }

    /*
     * Getter/Setter (accesseur/mutateur)
     * Respect du principe d'encapsulation
     */

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $name = strtoupper($name);
        $this->name = $name;
    }

    /**
     * @return DateTime|null
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime|null $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getisEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * @param mixed $isEnabled
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
    }


}
