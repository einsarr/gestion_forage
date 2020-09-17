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
	
class ReglementRepository extends Model{
	
	/**
	 * Methods with DQL (Doctrine Query Language) 
	 */
	public function __construct(){
		parent::__construct();
	}
	public function getFacturation($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Facturation')->find(array('id' => $id));
		}
	}
	public function getUser($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('User')->find(array('id' => $id));
		}
    }
	public function getReglement($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Reglement')->find(array('id' => $id));
		}
	}
	
	public function addReglement($reglement)
	{
		if($this->db != null)
		{
			$this->db->persist($reglement);
			$this->db->flush();

			return $reglement->getId();
		}
	}
	
	public function deleteReglement($id){
		if($this->db != null)
		{
			$reglement = $this->db->find('Reglement', $id);
			if($reglement != null)
			{
				$this->db->remove($reglement);
				$this->db->flush();
			}else {
				die("Objet ".$id." n'existe pas");
			}
		}
	}
	
	public function updateReglement($reglement){
		if($this->db != null)
		{
			$u = $this->db->find('Reglement', $reglement->getId());
			if($u != null)
			{
				$u->setEtat_reglement($reglement->getEtat_reglement());
				$u->setFacturation($reglement->getFacturation());
				$this->db->flush();
			}else {
				die("Objet ".$reglement->getId()." n'existe pas!!");
			}	
		}
	}
	
	public function listeReglements(){
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT a FROM Reglement a")->getResult();// array of Reglement objects
		}
	}
	

	
	public function getReglementByLogin($email, $password)
	{
        $query = $this
                    ->db
                    ->createQuery('SELECT u FROM Reglement u 
                                    WHERE u.email = :em 
                                    AND u.password = :pwd');
        $query->setParameter('em', $email);
        $query->setParameter('pwd', $password);
        $reglement = $query->getSingleResult();
	    return $reglement;

        //return $this->db->getRepository('Reglement')->find(array('email' => $email, 'password' => $password));
	}

    public function getRoleByName($nom){
        $query = $this->db
            ->createQuery('SELECT r FROM Roles r WHERE r.nom = :nomR')
            ->setParameter('nomR', $nom);
        $role = $query->getSingleResult();
        return $role;
    }
	
}
