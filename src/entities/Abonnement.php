<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="abonnement")
 **/
class Abonnement
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $date_abonnement;
    /** @Column(type="string") **/
    private $description_abonnement;
   /**
     * Many Abonnement have one Client. This is the owning side.
     * @ManyToOne(targetEntity="Client", inversedBy="abonnements")
     * @JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;
    
    public function __construct()
    {
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDate_abonnement()
    {
        return $this->date_abonnement;
    }
    public function setDate_abonnement($date_abonnement)
    {
        $this->date_abonnement = $date_abonnement;
    }

    public function getDescription_abonnement()
    {
        return $this->description_abonnement;
    }
    public function setDescription_abonnement($description_abonnement)
    {
        $this->description_abonnement = $description_abonnement;
    }

    
    
    public function getClient()
    {
        return $this->client;
    }
    public function setClient($client)
    {
        $this->client = $client;
    }

    public function hasRole($date_abonnement)
    {
        $bol = 0;
        foreach ($this->roles as $role)
        {
            if($role->getDate_abonnement() == $date_abonnement)
            {
                $bol = 1;
            }
        }
        return $bol;
    }
}

?>
