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
	
class FacturationRepository extends Model{
	
	/**
	 * Methods with DQL (Doctrine Query Language) 
	 */
	public function __construct(){
		parent::__construct();
	}
	public function getConsommation($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Consommation')->find(array('id' => $id));
		}
    }
	public function getFacturation($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Facturation')->find(array('id' => $id));
		}
	}
	
	public function addFacturation($facturation)
	{
		if($this->db != null)
		{
			$this->db->persist($facturation);
			$this->db->flush();

			return $facturation->getId();
		}
	}
	
	public function deleteFacturation($id){
		if($this->db != null)
		{
			$facturation = $this->db->find('Facturation', $id);
			if($facturation != null)
			{
				$this->db->remove($facturation);
				$this->db->flush();
			}else {
				die("Objet ".$id." n'existe pas");
			}
		}
	}
	
	public function updateFacturation($facturation){
		if($this->db != null)
		{
			$u = $this->db->find('Facturation', $facturation->getId());
			if($u != null)
			{
				$u->setDate_facturation($facturation->getDate_facturation());
				$u->setDate_limite_paiement($facturation->getDate_limite_paiement());
				$u->setConsommation($facturation->getConsommation());
				$this->db->flush();
			}else {
				die("Objet ".$facturation->getId()." n'existe pas!!");
			}	
		}
	}
	
	public function listeFacturations(){
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT a FROM Facturation a")->getResult();// array of Facturation objects
		}
	}
	

	
	public function getFacturationByLogin($email, $password)
	{
        $query = $this
                    ->db
                    ->createQuery('SELECT u FROM Facturation u 
                                    WHERE u.email = :em 
                                    AND u.password = :pwd');
        $query->setParameter('em', $email);
        $query->setParameter('pwd', $password);
        $facturation = $query->getSingleResult();
	    return $facturation;

        //return $this->db->getRepository('Facturation')->find(array('email' => $email, 'password' => $password));
	}

    public function getRoleByName($nom){
        $query = $this->db
            ->createQuery('SELECT r FROM Roles r WHERE r.nom = :nomR')
            ->setParameter('nomR', $nom);
        $role = $query->getSingleResult();
        return $role;
    }
	
}
