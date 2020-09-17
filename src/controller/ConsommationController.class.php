<?php
use libs\system\Controller;
use src\model\UserRepository;
use src\model\ConsommationRepository;
use src\model\CompteurRepository;
class ConsommationController extends Controller
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

        $compteurdb = new CompteurRepository();
        $this->data['compteurs'] = $compteurdb->listeCompteurs_ncoupe();

        return $this->view->load("consommations/liste", $this->data);
    }
    public function load_consommations()
    {
        $consommation = new ConsommationRepository();
        $consommations = $consommation->listeConsommations();
        $num=0;
        $output="";
        foreach($consommations as $key=>$value)
        {
            $output.= "<tr>
                    <td style='width:1%'>".++$num."</td>
                    <td style='width:10%'>".$value->getCode_consommation()."</td>
                    <td style='width:17%'>".$value->getNombre_litre_consomme()."</td>
                    <td style='width:20%'>".$value->getDate_consommation()."</td>
                    <td style='width:20%'>".$value->getPrix_litre_eau()." FCFA</td>
                    <td style='width:10%'>".$value->getCompteur()->getNumero_compteur()."</td>
                    <td>
                        <button type='button' name='edit' id='".$value->getId()."' class='btn btn-warning btn-xs edit-consommation'><span class='fa fa-edit'></span></button>
                        <button type='button' name='delete' id='".$value->getId()."' class='btn btn-danger btn-xs delete-consommation'><span class='fa fa-trash'></span></button>
                    </td>
                </tr>";
        }
        echo json_encode($output);
    }
    public function add(){
        $consommation = new ConsommationRepository();
        extract($_POST);
        //var_dump($compteur_id);exit;
        $consommationObject = new Consommation();
        $compteur = $consommation->getCompteur($compteur_id);
        $consommationObject->setCode_consommation(addslashes($code_consommation));
        $consommationObject->setNombre_litre_consomme(addslashes($nombre_litre_consomme));
        $consommationObject->setDate_consommation(addslashes($date_consommation));
        $consommationObject->setPrix_litre_eau(addslashes($prix_litre_eau));
        $consommationObject->setCompteur($compteur);

        $consommation->addConsommation($consommationObject);
        echo json_encode("ajout réussie avec succès");
   }
   public function edit($id){
        $consommation = new ConsommationRepository();
        $data = $consommation->getConsommation($id);
        $output = array(
            'id'                      => $data->getId(),
            'code_consommation'       => $data->getCode_consommation(),
            'nombre_litre_consomme'   => $data->getNombre_litre_consomme(),
            'date_consommation'       => $data->getDate_consommation(),
            'prix_litre_eau'          => $data->getPrix_litre_eau(),
            'compteur'                => $data->getCompteur()->getId(),
        );
        echo json_encode($output);
    }
    public function update(){
        $consommation = new ConsommationRepository();
        extract($_POST);
        $consommationObject = $consommation->getConsommation($id);
        $consommationObject = new Consommation();
        $compteur = $consommation->getCompteur($compteur_id);
        $consommationObject->setId(addslashes($id));
        $consommationObject->setCode_consommation(addslashes($code_consommation));
        $consommationObject->setNombre_litre_consomme(addslashes($nombre_litre_consomme));
        $consommationObject->setDate_consommation(addslashes($date_consommation));
        $consommationObject->setPrix_litre_eau(addslashes($prix_litre_eau));
        $consommationObject->setCompteur($compteur);
        $consommation->updateConsommation($consommationObject);
        echo json_encode("Mise à jour effectué avec succès");
   }
   public function delete($id){
        $consommation = new ConsommationRepository();
        $abonnementObject = $consommation->getConsommation($id);
        $consommation->deleteConsommation($id);
        $message = "Suppression reussie";
        echo json_encode($message);
    }
}
?>
    