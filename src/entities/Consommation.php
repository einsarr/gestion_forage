<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="consommation")
 **/
class Consommation
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $nombre_litre_consomme;
    /** @Column(type="string") **/
    private $code_consommation;
     /** @Column(type="date") **/
     private $date_consommation;
     /** @Column(type="decimal") **/
     private $prix_litre_eau;
     /**
     * Many Consommation have one Compteur. This is the owning side.
     * @ManyToOne(targetEntity="Compteur", inversedBy="consommations")
     * @JoinColumn(name="compteur_id", referencedColumnName="id")
     */
    private $compteur;
     /**
     * One Consommation has One Cart.
     * @OneToOne(targetEntity="Facturation", mappedBy="consommation")
     */
    private $facturation;
    
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

    public function getNombre_litre_consomme()
    {
        return $this->nombre_litre_consomme;
    }
    public function setNombre_litre_consomme($nombre_litre_consomme)
    {
        $this->nombre_litre_consomme = $nombre_litre_consomme;
    }

    public function getCode_consommation()
    {
        return $this->code_consommation;
    }
    public function setCode_consommation($code_consommation)
    {
        $this->code_consommation = $code_consommation;
    }

    public function getCompteur()
    {
        return $this->compteur;
    }
    public function setCompteur($compteur)
    {
        $this->compteur = $compteur;
    }

    public function getDate_consommation()
    {
        return $this->date_consommation;
    }
    public function setDate_consommation($date_consommation)
    {
        $this->date_consommation = $date_consommation;
    }
    public function getPrix_litre_eau()
    {
        return $this->prix_litre_eau;
    }
    public function setPrix_litre_eau($prix_litre_eau)
    {
        $this->prix_litre_eau = $prix_litre_eau;
    }

    
}

?>
