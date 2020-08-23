<?php
use libs\system\Controller;
use src\model\UserRepository;
use src\model\ClientRepository;
use src\model\VillageRepository;
use src\model\Chef_villageRepository;
use src\service\pdf\SamanePdf;
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
                    <td style='width:1%'>".++$num."</td>
                    <td style='width:20%'>".$value->getNom_famille()."</td>
                    <td style='width:15%'>".$value->getTelephone_abonne()."</td>
                    <td style='width:20%'>".$value->getChef_Village()->getVillage()->getNom_village()."</td>
                    <td style='width:25%'>".$value->getChef_Village()->getPrenom_chef_village()."</td>
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

    public function generate()
    {
        $pdf = new SamanePdf();

        $htmlDataFormat = '
                <table>
                ';
        $client = new ClientRepository();
        $clients = $client->listeClients();

        foreach($clients as $value)
        {
            $nom_famille_client = $value->getNom_famille();
            $telephone_client_client = $value->getTelephone_abonne();
            $village_client = $value->getChef_village()->getVillage()->getNom_village();
            $chef_village_client = $value->getChef_village()->getPrenom_chef_village();
            $htmlDataFormat = $htmlDataFormat.'<tr>';
                $htmlDataFormat = $htmlDataFormat. '<td>'.$nom_famille_client.'<td>';
                $htmlDataFormat = $htmlDataFormat.'<td>'.$telephone_client_client.'<td>';
                $htmlDataFormat =$htmlDataFormat. '<td>'.$village_client.'<td>';
                $htmlDataFormat = $htmlDataFormat.'<td>'.$chef_village_client.'<td>';
            $htmlDataFormat = $htmlDataFormat.'</tr>';

        }
        $htmlDataFormat = $htmlDataFormat.'</table>';
       

        $htmlDataFormat = $htmlDataFormat . '<hr>';
        
        // (Optional) Setup the paper size and orientation
        $paperFormat = array();
        $paperFormat['A4'] = 'portrait';//$paperFormat['A4'] = 'landscape';
        //numérotation
        $num = rand(1,1000);
        $nr = $num;
        $fileName  = 'public/folder/pdf/liste_abonnes'.$nr.'.pdf';
        /**
         * V1.9.2
         */
        /*if(file_exists($fileName))
        {
            unlink($fileName);
            $fileName  = 'public/folder/pdf/reglement1.pdf';
        }*/
        $result = $pdf->generate($htmlDataFormat, $paperFormat, $fileName);
        
        $data['pdfResult'] = $fileName;

        return $this->view->load("pdf/index",$data);
    }
}
?>
