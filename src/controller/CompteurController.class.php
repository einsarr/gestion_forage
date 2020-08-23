<?php
use libs\system\Controller;
use src\model\UserRepository;
use src\model\CompteurRepository;
use src\model\AbonnementRepository;
use src\service\pdf\SamanePdf;
class CompteurController extends Controller
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

        $abonnementdb = new AbonnementRepository();
        $this->data['abonnements'] = $abonnementdb->listeAbonnements();

        return $this->view->load("compteurs/liste", $this->data);
    }
    public function load_compteurs()
    {
        $compteur = new CompteurRepository();
        $compteurs = $compteur->listeCompteurs();
        $num=0;
        $output="";
        foreach($compteurs as $key=>$value)
        {
            $sarr = $value->getEtat_compteur()==='Coupé' ? $value->getId() :'';
            $sarr1 = $value->getEtat_compteur()==='Coupé' ? "Bon de coupure" : "";
            $output.= "<tr>
                    <td style='width:1%'>".++$num."</td>
                    <td style='width:20%'>".$value->getNumero_compteur()."</td>
                    <td style='width:20%'>".$value->getEtat_compteur()."</td>
                    <td style='width:25%'>".$value->getAbonnement()->getNumero_abonnement()."</td>
                    <td>
                        <button type='button' name='edit' id='".$value->getId()."' class='btn btn-warning btn-xs edit-compteur'><span class='fa fa-edit'></span></button>
                        <button type='button' name='delete' id='".$value->getId()."' class='btn btn-danger btn-xs delete-compteur'><span class='fa fa-trash'></span></button>
                        <a href='http://localhost:8081/gestion_forage/Compteur/generate/'".$sarr."'>'".$sarr1."'</a>
                    </td>
                </tr>";
        }
        echo json_encode($output);
    }
    public function add(){
        $compteur = new CompteurRepository();
        extract($_POST);
        $compteurRepositoryObject = new Compteur();
        $abonnement = $compteur->getAbonnement($abonnement_id);
        $compteurRepositoryObject->setNumero_compteur(addslashes($numero_compteur));
        $compteurRepositoryObject->setEtat_compteur(addslashes($etat_compteur));
        $compteurRepositoryObject->setAbonnement($abonnement);

        $compteur->addCompteur($compteurRepositoryObject);
        echo json_encode("ajout réussie avec succès");
   }
   public function edit($id){
        $compteur = new CompteurRepository();
        $data = $compteur->getCompteur($id);
        $output = array(
            'id' => $data->getId(),
            'numero_compteur'  => $data->getNumero_compteur(),
            'abonnement'       => $data->getAbonnement()->getId(),
            'etat_compteur'    => $data->getEtat_compteur(),
        );
        echo json_encode($output);
    }
    public function update(){
        $compteur = new CompteurRepository();
        extract($_POST);
        $compteurRepositoryObject = $compteur->getCompteur($id);
        $compteurRepositoryObject = new Compteur();
        $abonnement = $compteur->getAbonnement($abonnement_id);
        $compteurRepositoryObject->setId(addslashes($id));
        $compteurRepositoryObject->setNumero_compteur(addslashes($numero_compteur));
        $compteurRepositoryObject->setEtat_compteur(addslashes($etat_compteur));
        $compteurRepositoryObject->setAbonnement($abonnement);
        $compteur->updateCompteur($compteurRepositoryObject);
        echo json_encode("Mise à jour effectué avec succès");
   }
   public function delete($id){
        $compteur = new CompteurRepository();
        $abonnementObject = $compteur->getCompteur($id);
        $compteur->deleteCompteur($id);
        $message = "Suppression reussie";
        echo json_encode($message);
    }

    public function generate($compteur_id)
    {
        $pdf = new SamanePdf();

        $htmlDataFormat = '<center>
                    <h1 style="color:red;"><u>BON DE COUPURE D\'EAU</u></h1>
                    <h3><u>Date d\'édition : </u>'.date('d/m/Y h:i:s').'</h3>
                </center>';
        $htmlDataFormat = $htmlDataFormat . '<hr>';
        $compteur = new CompteurRepository();
        $compteurobject = $compteur->getCompteur($compteur_id);

       

        $numero_abonnement = $compteurobject->getAbonnement()->getNumero_abonnement();
        $nom_famille_client = $compteurobject->getAbonnement()->getClient()->getNom_famille();
        $telephone_client_client = $compteurobject->getAbonnement()->getClient()->getTelephone_abonne();
        $village_client = $compteurobject->getAbonnement()->getClient()->getChef_village()->getVillage()->getNom_village();
        $chef_village_client = $compteurobject->getAbonnement()->getClient()->getChef_village()->getPrenom_chef_village();

        $htmlDataFormat = $htmlDataFormat . '<br><p>[Numéro abonnement : '.$numero_abonnement.']</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>[Nom de famille du client : '.$nom_famille_client.']</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>[Télephone du client : '.$telephone_client_client.']</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>[Village du client : '.$village_client.']</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>[Chef du village du client : '.$chef_village_client.']</p>';
        
        $htmlDataFormat = $htmlDataFormat . '<hr>';
        
        
        
        $htmlDataFormat = $htmlDataFormat . '<br><p>Numero compteur : '.$compteurobject->getNumero_compteur().'</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>Numero abonnement : '.$compteurobject->getAbonnement()->getNumero_abonnement().'</p>';
        $htmlDataFormat = $htmlDataFormat . '<br><p>Date abonnement : '.$compteurobject->getAbonnement()->getdate_abonnement().'</p>';
        // (Optional) Setup the paper size and orientation
        $paperFormat = array();
        $paperFormat['A5'] = 'portrait';//$paperFormat['A4'] = 'landscape';
        //numérotation
        $num = rand(1,1000);
        $nr = $num;
        $fileName  = 'public/folder/pdf/bon_de_coupure'.$nr.'.pdf';
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
    