<?php
use libs\system\Controller;
use src\model\UserRepository;
use src\model\Chef_villageRepository;
use src\model\VillageRepository;
class VillageController extends Controller
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

        //$chef_villagedb = new Chef_villageRepository();
       // $this->data['chefs_village'] = $chef_villagedb->liste_chefs_village();
        return $this->view->load("villages/liste", $this->data);
    }
    public function load_villages()
    {
        $village = new VillageRepository();
        $villages = $village->listeVillages();
        $num=0;
        $output="";
        foreach($villages as $key=>$value)
        {
            $output.= "<tr>
                    <td>".++$num."</td>
                    <td>".$value->getNom_village()."</td>
                    <td>".$value->getIdentifiant_village()."</td>
                    <td>
                        <button type='button' name='edit' id='".$value->getId()."' class='btn btn-warning btn-xs edit-village'><span class='fa fa-edit'></span></button>
                        <button type='button' name='delete' id='".$value->getId()."' class='btn btn-danger btn-xs delete-village'><span class='fa fa-trash'></span></button>
                    </td>
                </tr>";
        }
        echo json_encode($output);
    }
    public function add(){
        $village = new VillageRepository();
        extract($_POST);
        $villageObject = new Village();
        $villageObject->setIdentifiant_village(addslashes($identifiant_village));
        $villageObject->setNom_village(addslashes($nom_village));

        $village->addVillage($villageObject);
        echo json_encode("ajout réussie avec succès");
   }
   public function edit($id){
        $village = new VillageRepository();
        $data = $village->getVillage($id);
        $output = array(
            'id' => $data->getId(),
            'identifiant_village' => $data->getIdentifiant_village(),
            'nom_village' => $data->getNom_village(),
        );
        echo json_encode($output);
    }
    public function update(){
        $village = new VillageRepository();
        extract($_POST);
        $villageObject = new Village();
        $villageObject->setId(addslashes($id));
        $villageObject->setIdentifiant_village(addslashes($identifiant_village));
        $villageObject->setNom_village(addslashes($nom_village));
        $village->updateVillage($villageObject);
        echo json_encode("Mise à jour effectué avec succès");
   }
   public function delete($id){
        $village = new VillageRepository();
        $villageObject = $village->getVillage($id);
        $village->deleteVillage($id);
        $message = "Suppression reussie";
        echo json_encode($message);
    }
}
?>
