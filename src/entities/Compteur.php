<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="compteur")
 **/
class Compteur
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $numero_compteur;
    /** @Column(type="string") **/
    private $etat_compteur;
     /**
     * One Compteur has One Abonnement.
     * @OneToOne(targetEntity="Abonnement")
     * @JoinColumn(name="abonnement_id", referencedColumnName="id")
     */
    private $abonnement;
    /**
     * One Compteur has many Consommations. This is the inverse side.
     * @OneToMany(targetEntity="Consommation", mappedBy="compteur")
     */
    private $consommations;
    
    public function __construct()
    {
        $this->consommations = new ArrayCollection();
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNumero_compteur()
    {
        return $this->numero_compteur;
    }
    public function setNumero_compteur($numero_compteur)
    {
        $this->numero_compteur = $numero_compteur;
    }

    public function getEtat_compteur()
    {
        return $this->etat_compteur;
    }
    public function setEtat_compteur($etat_compteur)
    {
        $this->etat_compteur = $etat_compteur;
    }

   

    public function getAbonnement()
    {
        return $this->abonnement;
    }
    public function setAbonnement($abonnement)
    {
        $this->abonnement = $abonnement;
    }

}

?>
