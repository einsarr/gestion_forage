<?php
use libs\system\Controller;
use src\model\UserRepository;
use src\model\ReglementRepository;
use src\model\CompteurRepository;
use src\model\FacturationRepository;
use src\service\pdf\SamanePdf;
class ReglementController extends Controller
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

        $facturationdb = new FacturationRepository();
        $this->data['facturations'] = $facturationdb->listeFacturations();

        return $this->view->load("reglements/liste", $this->data);
    }
    public function load_reglements()
    {
        $reglement = new ReglementRepository();
        $reglements = $reglement->listeReglements();
        $num=0;
        $output="";
        foreach($reglements as $key=>$value)
        {
            $output.= "<tr>
                    <td>".++$num."</td>
                    <td>".$value->getEtat_reglement()."</td>
                    <td>".$value->getFacturation()->getDate_limite_paiement()."</td>
                    <td>".$value->getDate_reglement()."</td>
                    <td>".$value->getFacturation()->getConsommation()->getNombre_litre_consomme()*$value->getFacturation()->getConsommation()->getPrix_litre_eau()." FCFA</td>
                    <td>".$value->getTaxe()." FCFA</td>
                    <td>".$value->getMontant()." FCFA</td>
                    <td>
                        <button type='button' name='edit' id='".$value->getId()."' class='btn btn-warning btn-xs edit-reglement'><span class='fa fa-edit'></span></button>
                        <button type='button' name='delete' id='".$value->getId()."' class='btn btn-danger btn-xs delete-reglement'><span class='fa fa-trash'></span></button>
                        <a href='http://localhost:8081/gestion_forage/Reglement/generate/{$value->getId()}'><span class='fa fa-print'></span></a>
                    </td>
                </tr>";
        }
        echo json_encode($output);
    }
    public function add(){
        $reglement = new ReglementRepository();
        extract($_POST);
        $reglementObject = new Reglement();
        $facturation = $reglement->getFacturation($facturation_id);
        $total = $facturation->getConsommation()->getNombre_litre_consomme()*$facturation->getConsommation()->getPrix_litre_eau();
        if($facturation->getDate_limite_paiement() < date("Y-m-d"))
        {
            $taxe = 5*$total/100;
            $montant = $total + $taxe;
            $reglementObject->setTaxe(addslashes($taxe));
            $reglementObject->setMontant(addslashes($montant));

            /*Coupure du compteur
            
            $compteurObject->setEtat_compteur(addslashes('coupé'));
            $compteur->updateCompteur($compteurObject);*/
        }
        else{
            $reglementObject->setMontant(addslashes($total));
        }
        $reglementObject->setEtat_reglement(addslashes($etat_reglement));
        $reglementObject->setDate_reglement(addslashes(date("Y-m-d")));
        $reglementObject->setTaxe(addslashes(0.0));
        $reglementObject->setFacturation($facturation);

       


        $reglement->addReglement($reglementObject);
        echo json_encode("ajout réussie avec succès");
   }
   public function edit($id){
        $reglement = new ReglementRepository();
        $data = $reglement->getReglement($id);
        $output = array(
            'id' => $data->getId(),
            'etat_reglement'         => $data->getEtat_reglement(),
            'facturation'            => $data->getFacturation()->getId(),
        );
        echo json_encode($output);
    }
    public function update(){
        $reglement = new ReglementRepository();
        extract($_POST);
        $reglementObject = $reglement->getReglement($id);
        $reglementObject = new Reglement();
        $facturation = $reglement->getFacturation($facturation_id);
        $reglementObject->setId(addslashes($id));
        $reglementObject->setEtat_reglement(addslashes($etat_reglement));
        $reglementObject->setFacturation($facturation);
        $reglement->updateReglement($reglementObject);
        echo json_encode("Mise à jour effectué avec succès");
   }
   public function delete($id){
        $reglement = new ReglementRepository();
        $reglementObject = $reglement->getReglement($id);
        $reglement->deleteReglement($id);
        $message = "Suppression reussie";
        echo json_encode($message);
    }

    public function generate($reglement_id)
    {
        $pdf = new SamanePdf();

        $htmlDataFormat = '<center>
                    <h1 style="color:blue;"><u>REGLEMENT DE FACTURE</u></h1>
                    <h3><u>Date d\'édition : </u>'.date('d/m/Y h:i:s').'</h3>
                </center>';
        $reglement = new ReglementRepository();
        $reglementObject = $reglement->getReglement($reglement_id);
        $htmlDataFormat = $htmlDataFormat . '<hr>';



        $nbre_de_litre_consomme =$reglementObject->getFacturation()->getConsommation()->getNombre_litre_consomme();
        $prix_du_litre = $reglementObject->getFacturation()->getConsommation()->getPrix_litre_eau();
        $total =$nbre_de_litre_consomme * $prix_du_litre;

        $numero_abonnement = $reglementObject->getFacturation()->getConsommation()->getCompteur()->getAbonnement()->getNumero_abonnement();
        $nom_famille_client = $reglementObject->getFacturation()->getConsommation()->getCompteur()->getAbonnement()->getClient()->getNom_famille();
        $telephone_client_client = $reglementObject->getFacturation()->getConsommation()->getCompteur()->getAbonnement()->getClient()->getTelephone_abonne();
        $village_client = $reglementObject->getFacturation()->getConsommation()->getCompteur()->getAbonnement()->getClient()->getChef_village()->getVillage()->getNom_village();
        $chef_village_client = $reglementObject->getFacturation()->getConsommation()->getCompteur()->getAbonnement()->getClient()->getChef_village()->getPrenom_chef_village();



        $htmlDataFormat = $htmlDataFormat . '<br><p>[Numéro abonnement : '.$numero_abonnement.']</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>[Nom de famille du client : '.$nom_famille_client.']</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>[Télephone du client : '.$telephone_client_client.']</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>[Village du client : '.$village_client.']</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>[Chef du village du client : '.$chef_village_client.']</p>';
        
        $htmlDataFormat = $htmlDataFormat . '<hr>';


        $htmlDataFormat = $htmlDataFormat . '<br><p>Mode de reglemenet : '.$reglementObject->getEtat_reglement().'</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>Date de reglement : '.$reglementObject->getDate_reglement().'</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>Taxe : '.$reglementObject->getTaxe().'</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>Montant : '.$reglementObject->getMontant().' FCFA</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>N° Compteur : '.$reglementObject->getFacturation()->getConsommation()->getCompteur()->getNumero_compteur().'</p>';
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
    