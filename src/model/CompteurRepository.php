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
	
class CompteurRepository extends Model{
	
	/**
	 * Methods with DQL (Doctrine Query Language) 
	 */
	public function __construct(){
		parent::__construct();
	}
	public function getAbonnement($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Abonnement')->find(array('id' => $id));
		}
    }
	public function getCompteur($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Compteur')->find(array('id' => $id));
		}
	}
	
	public function addCompteur($compteur)
	{
		if($this->db != null)
		{
			$this->db->persist($compteur);
			$this->db->flush();

			return $compteur->getId();
		}
	}
	
	public function deleteCompteur($id){
		if($this->db != null)
		{
			$compteur = $this->db->find('Compteur', $id);
			if($compteur != null)
			{
				$this->db->remove($compteur);
				$this->db->flush();
			}else {
				die("Objet ".$id." n'existe pas");
			}
		}
	}
	
	public function updateCompteur($compteur){
		if($this->db != null)
		{
			$u = $this->db->find('Compteur', $compteur->getId());
			if($u != null)
			{
				$u->setNumero_compteur($compteur->getNumero_compteur());
				$u->setEtat_compteur($compteur->getEtat_compteur());
				$u->setAbonnement($compteur->getAbonnement());
				$this->db->flush();
			}else {
				die("Objet ".$compteur->getId()." n'existe pas!!");
			}	
		}
	}
	
	public function listeCompteurs(){
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT a FROM Compteur a")->getResult();// array of Compteur objects
		}
	}
	

	
	public function getCompteurByLogin($email, $password)
	{
        $query = $this
                    ->db
                    ->createQuery('SELECT u FROM Compteur u 
                                    WHERE u.email = :em 
                                    AND u.password = :pwd');
        $query->setParameter('em', $email);
        $query->setParameter('pwd', $password);
        $compteur = $query->getSingleResult();
	    return $compteur;

        //return $this->db->getRepository('Compteur')->find(array('email' => $email, 'password' => $password));
	}

    public function getRoleByName($nom){
        $query = $this->db
            ->createQuery('SELECT r FROM Roles r WHERE r.nom = :nomR')
            ->setParameter('nomR', $nom);
        $role = $query->getSingleResult();
        return $role;
    }
	
}
