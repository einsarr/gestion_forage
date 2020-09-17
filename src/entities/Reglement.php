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
    /** @Column(type="string") **/
    private $etat_reglement;
    /** @Column(type="string") **/
    private $date_reglement;
    /** @Column(type="decimal") **/
    private $taxe;
    /** @Column(type="decimal") **/
    private $montant;
     /**
     * One Reglement has One Facturation
     * @OneToOne(targetEntity="Facturation")
     * @JoinColumn(name="facturation_id", referencedColumnName="id")
     */
    private $facturation;
    /**
     * Many Reglements have one User. This is the owning side.
     * @ManyToOne(targetEntity="User", inversedBy="reglements")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
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
    public function getMontant()
    {
        return $this->montant;
    }
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    public function getTaxe()
    {
        return $this->taxe;
    }
    public function setTaxe($taxe)
    {
        $this->taxe = $taxe;
    }
    public function getFacturation()
    {
        return $this->facturation;
    }
    public function setFacturation($facturation)
    {
        $this->facturation = $facturation;
    }
    public function getDate_reglement()
    {
        return $this->date_reglement;
    }
    public function setDate_reglement($date_reglement)
    {
        $this->date_reglement = $date_reglement;
    }
    public function getEtat_reglement()
    {
        return $this->etat_reglement;
    }
    public function setEtat_reglement($etat_reglement)
    {
        $this->etat_reglement = $etat_reglement;
    }

    public function getUser()
    {
        return $this->user;
    }
    public function setUser($user)
    {
        $this->user = $user;
    }

}

?>
