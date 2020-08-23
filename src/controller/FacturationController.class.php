<?php
use libs\system\Controller;
use src\model\UserRepository;
use src\model\FacturationRepository;
use src\model\ConsommationRepository;
use src\service\pdf\SamanePdf;
class FacturationController extends Controller
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

        $consommationdb = new ConsommationRepository();
        $this->data['consommations'] = $consommationdb->listeConsommations();

        return $this->view->load("facturations/liste", $this->data);
    }
    public function load_facturations()
    {
        $facturation = new FacturationRepository();
        $facturations = $facturation->listeFacturations();
        $num=0;
        $output="";
        foreach($facturations as $key=>$value)
        {
            $output.= "<tr>
                    <td style='width:1%'>".++$num."</td>
                    <td style='width:25%'>".$value->getDate_facturation()."</td>
                    <td style='width:25%'>".$value->getDate_limite_paiement()."</td>
                    <td style='width:25%'>".$value->getConsommation()->getNombre_litre_consomme() * $value->getConsommation()->getPrix_litre_eau()." FCFA</td>
                    <td>
                        <button type='button' name='edit' id='".$value->getId()."' class='btn btn-warning btn-xs edit-facturation'><span class='fa fa-edit'></span></button>
                        <button type='button' name='delete' id='".$value->getId()."' class='btn btn-danger btn-xs delete-facturation'><span class='fa fa-trash'></span></button>
                        <a href='http://localhost:8081/gestion_forage/Facturation/generate/'".$value->getId()."'><span class='fa fa-print'></span></a>
                        </td>
                </tr>";
        }
        echo json_encode($output);
    }
    public function add(){
        $facturation = new FacturationRepository();
        extract($_POST);
        $facturationObject = new Facturation();
        $consommation = $facturation->getConsommation($consommation_id);
        $facturationObject->setDate_facturation(addslashes($date_facturation));
        $facturationObject->setDate_limite_paiement(addslashes($date_limite_paiement));
        $facturationObject->setConsommation($consommation);

        $facturation->addFacturation($facturationObject);
        echo json_encode("ajout réussie avec succès");
   }
   public function edit($id){
        $facturation = new FacturationRepository();
        $data = $facturation->getFacturation($id);
        $output = array(
            'id' => $data->getId(),
            'date_facturation'         => $data->getDate_facturation(),
            'date_limite_paiement'     => $data->getDate_limite_paiement(),
            'consommation'             => $data->getConsommation()->getId(),
        );
        echo json_encode($output);
    }
    public function update(){
        $facturation = new FacturationRepository();
        extract($_POST);
        $facturationObject = $facturation->getFacturation($id);
        $facturationObject = new Facturation();
        $consommation= $facturation->getConsommation($consommation_id);
        $facturationObject->setId(addslashes($id));
        $facturationObject->setDate_facturation(addslashes($date_facturation));
        $facturationObject->setDate_limite_paiement(addslashes($date_limite_paiement));
        $facturationObject->setConsommation($consommation);
        $facturation->updateFacturation($facturationObject);
        echo json_encode("Mise à jour effectué avec succès");
   }
   public function delete($id){
        $facturation = new FacturationRepository();
        $facturationObject = $facturation->getFacturation($id);
        $facturation->deleteFacturation($id);
        $message = "Suppression reussie";
        echo json_encode($message);
    }

    public function generate($facture_id)
    {
        $pdf = new SamanePdf();

        $htmlDataFormat = '<center>
                    <h1 style="color:blue;"><u>FACTURE D\'EAU</u></h1>
                    <h3><u>Date d\'édition : </u>'.date('d/m/Y h:i:s').'</h3>
                </center>';
        $facturation = new FacturationRepository();
        $facturationObject = $facturation->getFacturation($facture_id);

        $nbre_de_litre_consomme =$facturationObject->getConsommation()->getNombre_litre_consomme();
        $prix_du_litre = $facturationObject->getConsommation()->getPrix_litre_eau();
        $total =$nbre_de_litre_consomme * $prix_du_litre;

        $numero_abonnement = $facturationObject->getConsommation()->getCompteur()->getAbonnement()->getNumero_abonnement();
        $nom_famille_client = $facturationObject->getConsommation()->getCompteur()->getAbonnement()->getClient()->getNom_famille();
        $telephone_client_client = $facturationObject->getConsommation()->getCompteur()->getAbonnement()->getClient()->getTelephone_abonne();
        $village_client = $facturationObject->getConsommation()->getCompteur()->getAbonnement()->getClient()->getChef_village()->getVillage()->getNom_village();
        $chef_village_client = $facturationObject->getConsommation()->getCompteur()->getAbonnement()->getClient()->getChef_village()->getPrenom_chef_village();

        $htmlDataFormat = $htmlDataFormat . '<br><p>[Numéro abonnement : '.$numero_abonnement.']</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>[Nom de famille du client : '.$nom_famille_client.']</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>[Télephone du client : '.$telephone_client_client.']</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>[Village du client : '.$village_client.']</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>[Chef du village du client : '.$chef_village_client.']</p>';
        
        $htmlDataFormat = $htmlDataFormat . '<hr>';
        
        
        
        $htmlDataFormat = $htmlDataFormat . '<br><p>Date facturation : '.$facturationObject->getDate_facturation().'</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>Date limite de paiment : <b style="color:red;">'.$facturationObject->getDate_limite_paiement().'</b></p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>Nombre de litre consommé : '.$nbre_de_litre_consomme.'</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>Prix du litre d\'eau : '.$prix_du_litre.' FCFA</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>Total à payé : <b style="color:red;">'.$total.' FCFA</b></p>';
        // (Optional) Setup the paper size and orientation
        $paperFormat = array();
        $paperFormat['A4'] = 'portrait';//$paperFormat['A4'] = 'landscape';
        //numérotation
        $num = rand(1,1000);
        $nr = $num;
        $fileName  = 'public/folder/pdf/reglement'.$nr.'.pdf';
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
    