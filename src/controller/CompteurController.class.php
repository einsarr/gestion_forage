<?php
use libs\system\Controller;
use src\model\UserRepository;
use src\model\CompteurRepository;
use src\model\AbonnementRepository;
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
            $output.= "<tr>
                    <td>".++$num."</td>
                    <td>".$value->getNumero_compteur()."</td>
                    <td>".$value->getEtat_compteur()."</td>
                    <td>".$value->getAbonnement()->getNumero_abonnement()."</td>
                    <td>
                        <button type='button' name='edit' id='".$value->getId()."' class='btn btn-warning btn-xs edit-compteur'><span class='fa fa-edit'></span></button>
                        <button type='button' name='delete' id='".$value->getId()."' class='btn btn-danger btn-xs delete-compteur'><span class='fa fa-trash'></span></button>
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
}
?>
    