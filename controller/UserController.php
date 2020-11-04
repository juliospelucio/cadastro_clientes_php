<?php
require_once('../model/User.php');

session_start();
$controller = new UserController();

// var_dump($controller->loadAllUsers());
// var_dump($controller->getUser(1));



class UserController
{

    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function loadAllUsers()
    {
        return $this->user->getUsers();
    }

    public function getUser($id)
    {
        $user =  $this->user->getUser($id);
        if (!$user) {
            return array(array('name' => 'Usuário indisponível', 'id' => ''));
        }
        return $user;
    }

    public function insert($fields)
    {
        if ($this->user->insertUser()) {
            $dados = array('msg' => 'Usuário cadastrado com sucesso', 'type' => 'success');
            $_SESSION['data'] = $dados;
            return 1;
            // header('location: ../view/users.php');
            exit;
        }
        $dados = array('msg' => 'Erro ao cadastrar novo usuário', 'type' => 'error');
        $_SESSION['data'] = $dados;
        return 0;
        // header('location: ../view/users.php');
        exit;
    }


    

    public function cpf_format($string){
        return substr($string, 0, -2) . '-' . substr($string, -2);
    }
    
}
