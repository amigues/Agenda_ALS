<?php
require 'init.php';
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}
$PDO = db_conneect();
$sql = "SELECT nome, email, telefone, insta FROM users WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if (!is_array($user))
{
    echo "Nenhum usuário encontrado";
    exit;
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Editar contato</title>
        <link rel="bootstrap/css/bootstrap.css" href="stylesheet">
        <script rel="bootstrap/js/bootstrap.js"></script>
        <script rel="bootstrap/js/bootstrap.js"></script>
    </head>
    <body>
    <div class="conteiner">
        <h1>AGENDA</h1>
        <h1>Edição de contato</h1>
        <form action="edit.php" method="post">
        <div class="form-group">
            <label for="nome">Nome: </label>
            <input type="text" class="form-control col-sm" name="nome" id="nome" style="width:25%;" value="<?php echo $user['nome'] ?>">
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="email" class="form-control col-sm" name="email" id="email" style="width:25%;" value="<?php echo $user['email'] ?>">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone: </label>
            <input type="text" class="form-control col-sm" name="telefone" id="telefone" style="width:25%;" value="<?php echo $user['telefone'] ?>">
        </div>
        <div class="form-group">
            <label for="insta">Insta: </label>
            <input type="text" class="form-control col-sm" name="insta" id="insta" style="width:25%;" value="<?php echo $user['insta'] ?>">
        </div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button type="submit" class="btn btn-primary">Alterar</button>
        </form>
    </div>
    </body>
</html>