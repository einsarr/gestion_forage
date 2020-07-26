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
	
class VillageRepository extends Model{
	
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
	
	public function addVillage($village)
	{
		if($this->db != null)
		{
			$this->db->persist($village);
			$this->db->flush();

			return $village->getId();
		}
	}
	
	public function deleteVillage($id){
		if($this->db != null)
		{
			$village = $this->db->find('Village', $id);
			if($village != null)
			{
				$this->db->remove($village);
				$this->db->flush();
			}else {
				die("Objet ".$id." n'existe pas");
			}
		}
	}
	
	public function updateVillage($village){
		if($this->db != null)
		{
			$u = $this->db->find('Village', $village->getId());
			if($u != null)
			{
				$u->setNom($village->getNom());
				$u->setPrenom($village->getPrenom());
                $u->setEmail($village->getEmail());
                $u->setPassword($village->getPassword());
                $u->setPassword($village->getPassword());
                $u->setPassword($village->getPassword());
                $u->setRoles($village->getRoles());
				$this->db->flush();

			}else {
				die("Objet ".$village->getId()." n'existe pas!!");
			}	
		}
	}
	
	public function listeVillages(){
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT u FROM Village u")->getResult();// array of Village objects
		}
	}
	

	
	public function getVillageByLogin($email, $password)
	{
        $query = $this
                    ->db
                    ->createQuery('SELECT u FROM Village u 
                                    WHERE u.email = :em 
                                    AND u.password = :pwd');
        $query->setParameter('em', $email);
        $query->setParameter('pwd', $password);
        $village = $query->getSingleResult();
	    return $village;

        //return $this->db->getRepository('Village')->find(array('email' => $email, 'password' => $password));
	}

    public function getRoleByName($nom){
        $query = $this->db
            ->createQuery('SELECT r FROM Roles r WHERE r.nom = :nomR')
            ->setParameter('nomR', $nom);
        $role = $query->getSingleResult();
        return $role;
    }
	
}
