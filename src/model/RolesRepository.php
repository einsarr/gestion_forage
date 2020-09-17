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

class RolesRepository extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function add($role)
    {
        if($this->db != null)
        {
            $this->db->persist($role);
            $this->db->flush();

            return $role->getId();
        }
    }

    public function getAll(){
        if($this->db != null)
        {
            return $this->db->createQuery("SELECT r FROM Roles r")->getResult();// array of User objects
        }
    }

    public function getRole($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Roles')->find(array('id' => $id));
		}
    }
    public function deleteRole($id){
		if($this->db != null)
		{
			$role = $this->db->find('Roles', $id);
			if($role != null)
			{
				$this->db->remove($role);
				$this->db->flush();
			}else {
				die("Objet ".$id." n'existe pas");
			}
		}
	}

}
