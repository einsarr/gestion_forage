<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="facturation")
 **/
class Facturation
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $date_facturation;
    /** @Column(type="string") **/
    private $date_limite_paiement;
     /**
     * One Facture has One Consommation.
     * @OneToOne(targetEntity="Consommation")
     * @JoinColumn(name="consommation_id", referencedColumnName="id")
     */
    private $consommation;
    
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

    public function getDate_facturation()
    {
        return $this->date_facturation;
    }
    public function setDate_facturation($date_facturation)
    {
        $this->date_facturation = $date_facturation;
    }

    public function getDate_limite_paiement()
    {
        return $this->date_limite_paiement;
    }
    public function setDate_limite_paiement($date_limite_paiement)
    {
        $this->date_limite_paiement = $date_limite_paiement;
    }

    public function getConsommation()
    {
        return $this->consommation;
    }
    public function setConsommation($consommation)
    {
        $this->consommation = $consommation;
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
}

?>
