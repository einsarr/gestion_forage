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
	
class ConsommationRepository extends Model{
	
	/**
	 * Methods with DQL (Doctrine Query Language) 
	 */
	public function __construct(){
		parent::__construct();
	}
	public function getCompteur($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Compteur')->find(array('id' => $id));
		}
    }
	public function getConsommation($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Consommation')->find(array('id' => $id));
		}
	}
	
	public function addConsommation($consommation)
	{
		if($this->db != null)
		{
			$this->db->persist($consommation);
			$this->db->flush();

			return $consommation->getId();
		}
	}
	
	public function deleteConsommation($id){
		if($this->db != null)
		{
			$consommation = $this->db->find('Consommation', $id);
			if($consommation != null)
			{
				$this->db->remove($consommation);
				$this->db->flush();
			}else {
				die("Objet ".$id." n'existe pas");
			}
		}
	}
	
	public function updateConsommation($consommation){
		if($this->db != null)
		{
			$u = $this->db->find('Consommation', $consommation->getId());
			if($u != null)
			{
				$u->setCode_consommation($consommation->getCode_consommation());
				$u->setNombre_litre_consomme($consommation->getNombre_litre_consomme());
				$u->setDate_consommation($consommation->getDate_consommation());
				$u->setPrix_litre_eau($consommation->getPrix_litre_eau());
				$u->setCompteur($consommation->getCompteur());
				$this->db->flush();
			}else {
				die("Objet ".$consommation->getId()." n'existe pas!!");
			}	
		}
	}
	
	public function listeConsommations(){
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT a FROM Consommation a")->getResult();// array of Consommation objects
		}
	}
	

	
	public function getConsommationByLogin($email, $password)
	{
        $query = $this
                    ->db
                    ->createQuery('SELECT u FROM Consommation u 
                                    WHERE u.email = :em 
                                    AND u.password = :pwd');
        $query->setParameter('em', $email);
        $query->setParameter('pwd', $password);
        $consommation = $query->getSingleResult();
	    return $consommation;

        //return $this->db->getRepository('Consommation')->find(array('email' => $email, 'password' => $password));
	}

    public function getRoleByName($nom){
        $query = $this->db
            ->createQuery('SELECT r FROM Roles r WHERE r.nom = :nomR')
            ->setParameter('nomR', $nom);
        $role = $query->getSingleResult();
        return $role;
    }
	
}
