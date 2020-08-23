<?php
use libs\system\Controller;
use src\model\UserRepository;
use src\model\AbonnementRepository;
use src\model\ClientRepository;
class AbonnementController extends Controller
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

        $clientdb = new ClientRepository();
        $this->data['clients'] = $clientdb->listeClients();

        return $this->view->load("abonnements/liste", $this->data);
    }
    public function load_abonnements()
    {
        $abonnement = new AbonnementRepository();
        $abonnements = $abonnement->listeAbonnements();
        $num=0;
        $output="";
        foreach($abonnements as $key=>$value)
        {
            $output.= "<tr>
                    <td style='width:1%'>".++$num."</td>
                    <td style='width:20%'>".$value->getNumero_abonnement()."</td>
                    <td style='width:20%'>".$value->getDate_abonnement()."</td>
                    <td style='width:20%'>".$value->getClient()->getNom_famille()."</td>
                    <td style='width:20%'>".$value->getDescription_abonnement()."</td>
                    <td>
                        <button type='button' name='edit' id='".$value->getId()."' class='btn btn-warning btn-xs edit-abonnement'><span class='fa fa-edit'></span></button>
                        <button type='button' name='delete' id='".$value->getId()."' class='btn btn-danger btn-xs delete-abonnement'><span class='fa fa-trash'></span></button>
                    </td>
                </tr>";
        }
        echo json_encode($output);
    }
    public function add(){
        $abonnement = new AbonnementRepository();
        extract($_POST);
        $abonnementObject = new Abonnement();
        $client = $abonnement->getClient($client_id);
        $abonnementObject->setNumero_abonnement(addslashes($numero_abonnement));
        $abonnementObject->setDate_abonnement(addslashes($date_abonnement));
        $abonnementObject->setDescription_abonnement(addslashes($description_abonnement));
        $abonnementObject->setClient($client);

        $abonnement->addAbonnement($abonnementObject);
        echo json_encode("ajout réussie avec succès");
   }
   public function edit($id){
        $abonnement = new AbonnementRepository();
        $data = $abonnement->getAbonnement($id);
        $output = array(
            'id' => $data->getId(),
            'numero_abonnement'         => $data->getNumero_abonnement(),
            'date_abonnement'           => $data->getDate_abonnement(),
            'client'                    => $data->getClient()->getId(),
            'description_abonnement'    => $data->getDescription_abonnement(),
        );
        echo json_encode($output);
    }
    public function update(){
        $abonnement = new AbonnementRepository();
        extract($_POST);
        $abonnementObject = $abonnement->getAbonnement($id);
        $abonnementObject = new Abonnement();
        $client = $abonnement->getClient($client_id);
        $abonnementObject->setId(addslashes($id));
        $abonnementObject->setNumero_abonnement(addslashes($numero_abonnement));
        $abonnementObject->setDate_abonnement(addslashes($date_abonnement));
        $abonnementObject->setDescription_abonnement(addslashes($description_abonnement));
        $abonnementObject->setClient($client);
        $abonnement->updateAbonnement($abonnementObject);
        echo json_encode("Mise à jour effectué avec succès");
   }
   public function delete($id){
        $abonnement = new AbonnementRepository();
        $abonnementObject = $abonnement->getAbonnement($id);
        $abonnement->deleteAbonnement($id);
        $message = "Suppression reussie";
        echo json_encode($message);
    }
}
?>
    