<?php
use libs\system\Controller;
use src\model\UserRepository;
class UserController extends Controller
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

        return $this->view->load("user/liste", $this->data);
    }

    public function load_users()
    {
        $user = new UserRepository();
        $users = $user->listeUser();
        $num=0;
        $output="";
        foreach($users as $key=>$value)
        {
            $output.= "<tr>
                    <td style='width:1%'>".++$num."</td>
                    <td style='width:25%'>".$value->getPrenom()."</td>
                    <td style='width:20%'>".$value->getNom()."</td>
                    <td style='width:25%'>".$value->getEmail()."</td>
                    <td>
                        <button type='button' name='edit' id='".$value->getId()."' class='btn btn-warning btn-xs edit-user'><span class='fa fa-edit'></span></button>
                        <button type='button' name='delete' id='".$value->getId()."' class='btn btn-danger btn-xs delete-user'><span class='fa fa-trash'></span></button>
                    </td>
                </tr>";
        }
        echo json_encode($output);
    }

    public function add(){
        $user = new UserRepository();
        extract($_POST);
        $userObject = new User();
        $userObject->setPrenom(addslashes($prenom));
        $userObject->setNom(addslashes($nom));
        $userObject->setEmail($email);
        //crypter le mot de passe avec sha1
        $userObject->setPassword(sha1($password));

        $user->addUser($userObject);
        echo json_encode("ajout réussie avec succès");
   }
   public function edit($id){
    $user = new UserRepository();
    $data = $user->getUser($id);
    $output = array(
        'id'        => $data->getId(),
        'prenom'    => $data->getPrenom(),
        'nom'       => $data->getNom(),
        'password'  => $data->getPassword(),
        );
    echo json_encode($output);
    }
    public function update(){
        $user = new UserRepository();
        extract($_POST);
        $userObject = $user->getUser($id);
        $userObject = new User();
        $userObject->setId(addslashes($id));
        $userObject->setPrenom(addslashes($prenom));
        $userObject->setNom(addslashes($nom));
        $userObject->setEmail(addslashes($email));
        $userObject->setPassword(addslashes($password));
        $user->updateUser($userObject);
        echo json_encode("Mise à jour effectué avec succès");
   }
   public function delete($id){
        $user = new UserRepository();
        $userObject = $user->getUser($id);
        $user->deleteUser($id);
        $message = "Suppression reussie";
        echo json_encode($message);
    }


}
?>
