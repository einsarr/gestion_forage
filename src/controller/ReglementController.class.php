<?php
use libs\system\Controller;
use src\model\UserRepository;
use src\model\ReglementRepository;
use src\model\CompteurRepository;
use src\model\FacturationRepository;
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
                        <button type='button' name='impression' id='".$value->getId()."' class='btn btn-default btn-xs imprime-reglement'><span class='fa fa-print'></span></button>
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
}
?>
    