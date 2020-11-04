<?php
require_once('../model/User.php');

session_start();
$controller = new UserController();

// var_dump($controller->loadAllUsers());
// var_dump($controller->getUser(1));

if (isset($_POST['insert'])) {
    if (!isset($_POST['admin'])) $_POST['admin'] = 0;
    $fields = array(
        'name' => $_POST['name'],
        'cpf' => $_POST['cpf'],
        'email' => $_POST['email'],
        'password' => md5("123456"), //default password
        'admin' => $_POST['admin']
    );
    $controller->insert($fields);
}

if (isset($_POST['edit'])) {
    if (!isset($_POST['admin'])) $_POST['admin'] = 0;
    $fields = array(
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'cpf' => $_POST['cpf'],
        'email' => $_POST['email'],
        'admin' => $_POST['admin']
    );
    $controller->edit($fields);
}


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

    public function loadNonAdmin()
    {
        return $this->user->getNonAdmin();
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
        $this->user->setAttributes($fields);
        if ($this->user->insertUser()) {
            $dados = array('msg' => 'Usuário cadastrado com sucesso', 'type' => 'success');
            $_SESSION['data'] = $dados;
            header('location: ../view/index.php');
            exit;
        }
        $dados = array('msg' => 'Erro ao cadastrar novo usuário', 'type' => 'error');
        $_SESSION['data'] = $dados;
        header('location: ../view/index.php');
        exit;
    }

    public function edit($fields)
    {
        if ($this->user->updateUser($fields)) {
            $dados = array('msg' => 'Erro ao editar os dados do usuário', 'type' => 'success');
            $_SESSION['data'] = $dados;
            header('location: ../view/edit.php?id=' . $fields['id']);
            exit;
        }
        $dados = array('msg' => 'Erro ao editar os dados do usuário', 'type' => 'error');
        $_SESSION['data'] = $dados;
        header('location: ../view/edit.php?id=' . $fields['id']);
        exit;
    }


    public function cpf_format($string)
    {
        return substr($string, 0, -2) . '-' . substr($string, -2);
    }
}
