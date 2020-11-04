<?php require_once('header.php');
require_once('../controller/UserController.php') ?>


<div class="container mt-5">
    <h1>Editar Usuário</h1>
    <form action="UserController.php" method="POST">
        <div class="row">
            <div class="col-sm col-md-5 my-1">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="name" class="form-control" placeholder="Júlio dos Santos">
            </div>
            <div class="col-sm col-md-5 my-1">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" class="form-control" placeholder="123456789-10">
            </div>
            <div class="col-sm my-1 col-md-6">
                <label for="email">Email</label>
                <input type="mail" id="email" name="email" class="form-control" placeholder="julio@mail.com">
            </div>
            <div class="col-sm mb-2 mt-md-4 ml-5 col-md-auto form-check align-self-center">
                <input type="checkbox" class="form-check-input" disabled id="admin" name="admin">
                <label class="form-check-label" for="admin">Administrador</label>
            </div>
        </div>
        <button class="btn btn-block btn-outline-dark my-1">Editar</button>
    </form>
</div>
<?php require_once('footer.php') ?>