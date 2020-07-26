<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="reglement")
 **/
class Reglement
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="integer") **/
    private $etat_reglement;
     /**
     * One Reglement has One Facturation
     * @OneToOne(targetEntity="Facturation", inversedBy="reglement")
     * @JoinColumn(name="facturation_id", referencedColumnName="id")
     */
    private $abonnement;
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

    public function getAbonnement()
    {
        return $this->abonnement;
    }
    public function setAbonnement($abonnement)
    {
        $this->abonnement = $abonnement;
    }
    public function getEtat_reglement()
    {
        return $this->etat_reglement;
    }
    public function setEtat_reglement($etat_reglement)
    {
        $this->etat_reglement = $etat_reglement;
    }

}

?>
