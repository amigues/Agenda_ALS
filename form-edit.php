<?php
require 'init.php';
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}
$PDO = db_connect();
$sql = "SELECT  c.id, c.nome, c.insta, t.numero, e.email FROM dados AS c INNER JOIN telefone AS t ON c.id = t.dados_id INNER JOIN email AS e ON c.id = e.dados_id where c.id = :id";
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
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="bootstrap/js/bootstrap.js"></script>
    </head>
    <body>
    <div class="jumbotron">
        <p class="h2 text-center">Edição de contato</p>
    </div>
    <div class="container">
        <form action="edit.php" method="post">
        <div class="form-group">
            <label for="nome">Nome: </label>
            <input type="text" class="form-control col-sm" name="nome" id="nome" style="width:80%;" value="<?php echo $user['nome'] ?>">
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="email" class="form-control col-sm" name="email" id="email" style="width:80%;" value="<?php echo $user['email'] ?>">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone: </label>
            <input type="text" class="form-control col-sm" name="telefone" id="telefone" style="width:80%;" value="<?php echo $user['numero'] ?>">
        </div>
        <div class="form-group">
            <label for="insta">Insta: </label>
            <input type="text" class="form-control col-sm" name="insta" id="insta" style="width:80%;" value="<?php echo $user['insta'] ?>">
        </div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button type="submit" class="btn btn-primary">Alterar</button>
        </form>
    </div>
    </body>
</html>