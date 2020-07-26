<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="client")
 **/
class Client
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $nom_famille;
    /** @Column(type="string") **/
    private $telephone_abonne;
     /**
     * Many Clients have one village. This is the owning side.
     * @ManyToOne(targetEntity="Village", inversedBy="clients")
     * @JoinColumn(name="village_id", referencedColumnName="id")
     */
    private $village;
    /**
     * One Client has many Abonnement. This is the inverse side.
     * @OneToMany(targetEntity="Abonnement", mappedBy="client")
     */
    private $abonnements;
    
    public function __construct()
    {
        $this->abonnements = new ArrayCollection();
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNom_famille()
    {
        return $this->nom_famille;
    }
    public function setNom_famille($nom_famille)
    {
        $this->nom_famille = $nom_famille;
    }

    public function getTelephone_abonne()
    {
        return $this->telephone_abonne;
    }
    public function setTelephone_abonne($telephone_abonne)
    {
        $this->telephone_abonne = $telephone_abonne;
    }

    public function getVillage()
    {
        return $this->village;
    }
    public function setVillage($village)
    {
        $this->village = $village;
    }
    
    public function getChef_village()
    {
        return $this->chef_village;
    }
    public function setChef_village($chef_village)
    {
        $this->chef_village = $chef_village;
    }

    public function getAbonnements()
    {
        return $this->abonnements;
    }
    public function setAbonnements($abonnements)
    {
        $this->abonnements = $abonnements;
    }
}

?>
