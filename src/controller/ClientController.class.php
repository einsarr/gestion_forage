<?php
use libs\system\Controller;
use src\model\UserRepository;
use src\model\ClientRepository;
use src\model\VillageRepository;
use src\model\Chef_villageRepository;
class ClientController extends Controller
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

        $chef_villagedb = new Chef_villageRepository();
        $this->data['chefs_village'] = $chef_villagedb->liste_chef_Villages();

        return $this->view->load("clients/liste", $this->data);
    }
    public function load_clients()
    {
        $client = new ClientRepository();
        $clients = $client->listeClients();
        $num=0;
        $output="";
        foreach($clients as $key=>$value)
        {
            $output.= "<tr>
                    <td>".++$num."</td>
                    <td>".$value->getNom_famille()."</td>
                    <td>".$value->getTelephone_abonne()."</td>
                    <td>".$value->getChef_Village()->getVillage()->getNom_village()."</td>
                    <td>".$value->getChef_Village()->getPrenom_chef_village()."</td>
                    <td>
                        <button type='button' name='edit' id='".$value->getId()."' class='btn btn-warning btn-xs edit-client'><span class='fa fa-edit'></span></button>
                        <button type='button' name='delete' id='".$value->getId()."' class='btn btn-danger btn-xs delete-client'><span class='fa fa-trash'></span></button>
                    </td>
                </tr>";
        }
        echo json_encode($output);
    }
    public function add(){
        $client = new ClientRepository();
        extract($_POST);
        $clientObject = new Client();
        $chef_village = $client->getChef_village($chef_village_id);
        $clientObject->setNom_famille(addslashes($nom_famille));
        $clientObject->setTelephone_abonne(addslashes($telephone_abonne));
        $clientObject->setChef_village($chef_village);

        $client->addClient($clientObject);
        echo json_encode("ajout réussie avec succès");
   }
   public function edit($id){
        $client = new ClientRepository();
        $data = $client->getClient($id);
        $output = array(
            'id' => $data->getId(),
            'village' => $data->getVillage()->getId(),
            'nom_famille' => $data->getNom_famille(),
            'telephone_abonne' => $data->getTelephone_abonne(),
        );
        echo json_encode($output);
    }
    public function update(){
        $client = new ClientRepository();
        extract($_POST);
        $clientObject = $client->getClient($id);
        $clientObject = new Client();
        $village = $client->getVillage($village_id);
        $clientObject->setId(addslashes($id));
        $clientObject->setNom_famille(addslashes($nom_famille));
        $clientObject->setTelephone_abonne(addslashes($telephone_abonne));
        $clientObject->setVillage($village);
        $client->updateClient($clientObject);
        echo json_encode("Mise à jour effectué avec succès");
   }
   public function delete($id){
        $client = new ClientRepository();
        $clientObject = $client->getClient($id);
        $client->deleteClient($id);
        $message = "Suppression reussie";
        echo json_encode($message);
    }
}
?>
