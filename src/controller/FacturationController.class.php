<?php
use libs\system\Controller;
use src\model\UserRepository;
use src\model\FacturationRepository;
use src\model\ConsommationRepository;
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
                    <td>".++$num."</td>
                    <td>".$value->getDate_facturation()."</td>
                    <td>".$value->getDate_limite_paiement()."</td>
                    <td>".$value->getConsommation()->getNombre_litre_consomme() * $value->getConsommation()->getPrix_litre_eau()." FCFA</td>
                    <td>
                        <button type='button' name='edit' id='".$value->getId()."' class='btn btn-warning btn-xs edit-facturation'><span class='fa fa-edit'></span></button>
                        <button type='button' name='delete' id='".$value->getId()."' class='btn btn-danger btn-xs delete-facturation'><span class='fa fa-trash'></span></button>
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
}
?>
    