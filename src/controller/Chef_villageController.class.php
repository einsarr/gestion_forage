<?php
use libs\system\Controller;
use src\model\UserRepository;
use src\model\Chef_villageRepository;
use src\model\VillageRepository;
class Chef_villageController extends Controller
{
    private $data;
    public function __construct()
    {
        parent::__construct();
        session_start();
        if(isset($_SESSION['user_session'])) {
            $this->data['user'] = $_SESSION['user_session'];
        } else {
            $this->view->redirect('Login');
        }
    }

    public function liste()
    {
        $userdb = new UserRepository();
        $this->data['users'] = $userdb->listeUser();

        $villagedb = new VillageRepository();
        $this->data['villages'] = $villagedb->listeVillages();

        //$chef_villagedb = new Chef_villageRepository();
        //$this->data['chefs_village'] = $chef_villagedb->liste_chef_Villages();
        return $this->view->load("chefs_village/liste", $this->data);
    }
    public function load_chefs_villages()
    {
        $chef_village = new Chef_villageRepository();
        $chefs_village = $chef_village->liste_chef_Villages();
        $num=0;
        $output="";
        
        foreach($chefs_village as $key=>$value)
        {
            $output.= "<tr>
                    <td>".++$num."</td>
                    <td>".$value->getPrenom_chef_village()."</td>
                    <td>".$value->getTelephone_chef_village()."</td>
                    <td>".$value->getVillage()->getNom_village()."</td>
                    <td>
                        <button type='button' name='edit' id='".$value->getId()."' class='btn btn-warning btn-xs edit-chef_village'><span class='fa fa-edit'></span></button>
                        <button type='button' name='delete' id='".$value->getId()."' class='btn btn-danger btn-xs delete-chef_village'><span class='fa fa-trash'></span></button>
                    </td>
                </tr>";
        }
        echo json_encode($output);
    }
    public function add(){
        $chef_village = new Chef_villageRepository();
        extract($_POST);
        //var_dump($village_id);exit;
        $village = $chef_village->getVillage($village_id);
        $chef_villageObject = new Chef_village();
        $chef_villageObject->setPrenom_chef_village(addslashes($prenom_chef_village));
        $chef_villageObject->setTelephone_chef_village(addslashes($telephone_chef_village));
        $chef_villageObject->setVillage($village);

        $chef_village->addChef_village($chef_villageObject);
        echo json_encode("ajout réussie avec succès");
   }
   public function edit($id){
        $chef_village = new Chef_villageRepository();
        $data = $chef_village->getChef_village($id);
        $output = array(
            'id' => $data->getId(),
            'village' => $data->getVillage()->getId(),
            'nom_famille' => $data->getNom_famille(),
            'telephone_abonne' => $data->getTelephone_abonne(),
        );
        echo json_encode($output);
    }
    public function update(){
        $chef_village = new Chef_villageRepository();
        extract($_POST);
        $chef_villageObject = $chef_village->getChef_village($id);
        $chef_villageObject = new Chef_village();
        $village = $chef_village->getVillage($village_id);
        $chef_villageObject->setId(addslashes($id));
        $chef_villageObject->setNom_famille(addslashes($nom_famille));
        $chef_villageObject->setTelephone_abonne(addslashes($telephone_abonne));
        $chef_villageObject->setVillage($village);
        $chef_village->updateChef_village($chef_villageObject);
        echo json_encode("Mise à jour effectué avec succès");
   }
   public function delete($id){
        $chef_village = new Chef_villageRepository();
        $chef_villageObject = $chef_village->getChef_village($id);
        $chef_village->deleteChef_village($id);
        $message = "Suppression reussie";
        echo json_encode($message);
    }
}
?>
