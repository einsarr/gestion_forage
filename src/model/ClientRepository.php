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
	
class ClientRepository extends Model{
	
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
	public function getClient($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Client')->find(array('id' => $id));
		}
	}
	
	public function addClient($client)
	{
		if($this->db != null)
		{
			$this->db->persist($client);
			$this->db->flush();

			return $client->getId();
		}
	}
	
	public function deleteClient($id){
		if($this->db != null)
		{
			$client = $this->db->find('Client', $id);
			if($client != null)
			{
				$this->db->remove($client);
				$this->db->flush();
			}else {
				die("Objet ".$id." n'existe pas");
			}
		}
	}
	
	public function updateClient($client){
		if($this->db != null)
		{
			$u = $this->db->find('Client', $client->getId());
			if($u != null)
			{
				$u->setNom_famille($client->getNom_famille());
				$u->setTelephone_abonne($client->getTelephone_abonne());
				$u->setVillage($client->getVillage());
				$this->db->flush();
			}else {
				die("Objet ".$client->getId()." n'existe pas!!");
			}	
		}
	}
	
	public function listeClients(){
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT u FROM Client u")->getResult();// array of Client objects
		}
	}
	

	
	public function getClientByLogin($email, $password)
	{
        $query = $this
                    ->db
                    ->createQuery('SELECT u FROM Client u 
                                    WHERE u.email = :em 
                                    AND u.password = :pwd');
        $query->setParameter('em', $email);
        $query->setParameter('pwd', $password);
        $client = $query->getSingleResult();
	    return $client;

        //return $this->db->getRepository('Client')->find(array('email' => $email, 'password' => $password));
	}

    public function getRoleByName($nom){
        $query = $this->db
            ->createQuery('SELECT r FROM Roles r WHERE r.nom = :nomR')
            ->setParameter('nomR', $nom);
        $role = $query->getSingleResult();
        return $role;
    }
	
}
