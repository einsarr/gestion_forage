<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="village")
 **/
class Village
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $identifiant_village;
    /** @Column(type="string") **/
    private $nom_village;
    /**
     * One Village has One Chef_village.
     * @OneToOne(targetEntity="Chef_village", mappedBy="village")
     */
    private $chef_village;
    
    public function __construct()
    {
        $this->roles = new ArrayCollection();
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNom()
    {
        return $this->identifiant_village;
    }
    public function setNom($identifiant_village)
    {
        $this->identifiant_village = $identifiant_village;
    }

    public function getPrenom()
    {
        return $this->nom_village;
    }
    public function setPrenom($nom_village)
    {
        $this->nom_village = $nom_village;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getRoles()
    {
        return $this->roles;
    }
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    public function hasRole($identifiant_village)
    {
        $bol = 0;
        foreach ($this->roles as $role)
        {
            if($role->getNom() == $identifiant_village)
            {
                $bol = 1;
            }
        }
        return $bol;
    }
}

?>
