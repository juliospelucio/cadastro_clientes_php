<?php require_once('header.php');
require_once('../controller/UserController.php') ?>
<?php $users = $controller->loadAllUsers() ?>

<div class="container mt-5">
    <?php $i = 0;
    foreach ($users as $row => $column) : $i++; ?>
        <div class="row bg-light py-2 m-1 border border-secondary align-items-center">
            <div class="col-sm my-1">
                <?php echo $column['name'] ?>
            </div>
            <div class="col-sm my-1">
                <?php echo $column['email'] ?>
            </div>
            <div class="col-sm my-1">
                <?php echo $controller->cpf_format($column['cpf']) ?>
            </div>
            <div class="col-sm my-1">
                <a href="edit.php?id=<?php echo $column['id'] ?>" class="btn btn-block btn-outline-dark">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentcolor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                    </svg>
                </a>
                <a href="index.php?delete=1&id=<?php echo $column['id'] ?>" class="btn btn-block btn-outline-danger" name="delete">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                    </svg>
                </a>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?php require_once('footer.php') ?>