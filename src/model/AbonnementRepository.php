<?php
/*==================================================
MODELE MVC DEVELOPPE PAR Ngor SECK
ngorsecka@gmail.com
(+221) 77 - 433 - 97 - 16
PERFECTIONNEZ CE MODELE ET FAITES MOI UN RETOUR
POUR TOUTE MODIFICATION VISANT A L'AMELIORER.
VOUS ETES LIBRE DE TOUTE UTILISATION.
===================================================*/
namespace src\model; 

use libs\system\Model; 
	
class AbonnementRepository extends Model{
	
	/**
	 * Methods with DQL (Doctrine Query Language) 
	 */
	public function __construct(){
		parent::__construct();
	}
	public function getClient($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Client')->find(array('id' => $id));
		}
    }
	public function getAbonnement($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Abonnement')->find(array('id' => $id));
		}
	}
	
	public function addAbonnement($abonnement)
	{
		if($this->db != null)
		{
			$this->db->persist($abonnement);
			$this->db->flush();

			return $abonnement->getId();
		}
	}
	
	public function deleteAbonnement($id){
		if($this->db != null)
		{
			$abonnement = $this->db->find('Abonnement', $id);
			if($abonnement != null)
			{
				$this->db->remove($abonnement);
				$this->db->flush();
			}else {
				die("Objet ".$id." n'existe pas");
			}
		}
	}
	
	public function updateAbonnement($abonnement){
		if($this->db != null)
		{
			$u = $this->db->find('Abonnement', $abonnement->getId());
			if($u != null)
			{
				$u->setNumero_abonnement($abonnement->getNumero_abonnement());
				$u->setDate_abonnement($abonnement->getDate_abonnement());
				$u->setDescription_abonnement($abonnement->getDescription_abonnement());
				$u->setClient($abonnement->getClient());
				$this->db->flush();
			}else {
				die("Objet ".$abonnement->getId()." n'existe pas!!");
			}	
		}
	}
	
	public function listeAbonnements(){
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT a FROM Abonnement a")->getResult();// array of Abonnement objects
		}
	}
	

	
	public function getAbonnementByLogin($email, $password)
	{
        $query = $this
                    ->db
                    ->createQuery('SELECT u FROM Abonnement u 
                                    WHERE u.email = :em 
                                    AND u.password = :pwd');
        $query->setParameter('em', $email);
        $query->setParameter('pwd', $password);
        $abonnement = $query->getSingleResult();
	    return $abonnement;

        //return $this->db->getRepository('Abonnement')->find(array('email' => $email, 'password' => $password));
	}

    public function getRoleByName($nom){
        $query = $this->db
            ->createQuery('SELECT r FROM Roles r WHERE r.nom = :nomR')
            ->setParameter('nomR', $nom);
        $role = $query->getSingleResult();
        return $role;
    }
	
}
