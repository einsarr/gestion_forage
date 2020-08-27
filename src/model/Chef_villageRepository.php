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
	
class Chef_villageRepository extends Model{
	
	/**
	 * Methods with DQL (Doctrine Query Language) 
	 */
	public function __construct(){
		parent::__construct();
	}

	public function getVillage($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Village')->find(array('id' => $id));
		}
	}
	public function getChef_village($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Chef_village')->find(array('id' => $id));
		}
	}
	
	public function addChef_village($chef_village)
	{
		if($this->db != null)
		{
			$this->db->persist($chef_village);
			$this->db->flush();

			return $chef_village->getId();
		}
	}
	
	public function deleteChef_village($id){
		if($this->db != null)
		{
			$village = $this->db->find('Chef_village', $id);
			if($village != null)
			{
				$this->db->remove($village);
				$this->db->flush();
			}else {
				die("Objet ".$id." n'existe pas");
			}
		}
	}
	
	public function updateChef_village($village){
		if($this->db != null)
		{
			$u = $this->db->find('Chef_village', $village->getId());
			if($u != null)
			{
				$u->setPrenom_chef_village($village->getPrenom_chef_village());
				$u->setTelephone_chef_village($village->getTelephone_chef_village());
                $u->setVillage($village->getVillage());
				$this->db->flush();
			}else {
				die("Objet ".$village->getId()." n'existe pas!!");
			}	
		}
	}
	
	public function liste_chef_Villages(){
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT c FROM Chef_village c")->getResult();// array of Chef_village objects
		}
	}
	

	
	public function getChef_villageByLogin($email, $password)
	{
        $query = $this
                    ->db
                    ->createQuery('SELECT u FROM Chef_village u 
                                    WHERE u.email = :em 
                                    AND u.password = :pwd');
        $query->setParameter('em', $email);
        $query->setParameter('pwd', $password);
        $village = $query->getSingleResult();
	    return $village;

        //return $this->db->getRepository('Chef_village')->find(array('email' => $email, 'password' => $password));
	}

    public function getRoleByName($nom){
        $query = $this->db
            ->createQuery('SELECT r FROM Roles r WHERE r.nom = :nomR')
            ->setParameter('nomR', $nom);
        $role = $query->getSingleResult();
        return $role;
    }
	
}
