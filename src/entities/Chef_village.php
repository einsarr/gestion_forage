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
    private $telephone_chef_village;
   
    /**
     * One Chef_village has many clients. This is the inverse side.
     * @OneToMany(targetEntity="Client", mappedBy="chef_village")
     */
    private $clients;
      /**
     * One Chef_village has One Village.
     * @OneToOne(targetEntity="Village")
     * @JoinColumn(name="village_id", referencedColumnName="id")
     */
    private $village;

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

    public function getPrenom_chef_village()
    {
        return $this->prenom_chef_village;
    }
    public function setPrenom_chef_village($prenom_chef_village)
    {
        $this->prenom_chef_village = $prenom_chef_village;
    }
    public function getTelephone_chef_village()
    {
        return $this->telephone_chef_village;
    }
    public function setTelephone_chef_village($telephone_chef_village)
    {
        $this->telephone_chef_village = $telephone_chef_village;
    }
    public function getVillage()
    {
        return $this->village;
    }
    public function setVillage($village)
    {
        $this->village = $village;
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
