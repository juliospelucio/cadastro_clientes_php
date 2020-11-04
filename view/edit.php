<?php require_once('header.php');
require_once('../controller/UserController.php') ?>
<?php $user = $controller->getUser($_GET['id'])[0] ?>

<div class="container mt-5">
    <h1>Editar Usuário</h1>
    <form action="../controller/UserController.php" method="POST">
        <div class="row">
            <div class="col-sm col-md-5 my-1">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="name" class="form-control" placeholder="Júlio dos Santos" value="<?php echo $user['name'] ?>">
            </div>
            <div class="col-sm col-md-5 my-1">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" class="form-control" placeholder="123456789-10" value="<?php echo $user['cpf'] ?>">
            </div>
            <div class="col-sm my-1 col-md-6">
                <label for="email">Email</label>
                <input type="mail" id="email" name="email" class="form-control" placeholder="julio@mail.com" value="<?php echo $user['email'] ?>">
            </div>
            <div class="col-sm mb-2 mt-md-4 ml-5 col-md-auto form-check align-self-center">
                <input type="checkbox" class="form-check-input" disabled id="admin" name="admin" value="1" <?php echo $user['admin']==1? "checked":"" ?>>
                <label class="form-check-label" for="admin">Administrador</label>
            </div>
            <input type="number" id="id" name="id" value="<?php echo $user['id'] ?>" hidden>
        </div>
        <button class="btn btn-block btn-outline-dark my-1" name="edit" >Editar</button>
    </form>
</div>
<?php require_once('footer.php') ?>