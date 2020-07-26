<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="chef_village")
 **/
class Chef_village
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $prenom_chef_village;
    /** @Column(type="string") **/
    private $telephone_village;
    /**
     * One Chef_village has One Village.
     * @OneToOne(targetEntity="Village", mappedBy="chef_village")
     */
    private $village;
    /**
     * One Chef_village has many clients. This is the inverse side.
     * @OneToMany(targetEntity="Village", mappedBy="chef_village")
     */
    private $clients;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getRoles()
    {
        return $this->roles;
    }
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    public function hasRole($nom)
    {
        $bol = 0;
        foreach ($this->roles as $role)
        {
            if($role->getNom() == $nom)
            {
                $bol = 1;
            }
        }
        return $bol;
    }
}

?>
