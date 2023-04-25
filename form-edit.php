<?php
require 'init.php';
$id = isset($_GET['id']) ? $_GET['id'] : null;
if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}
$PDO = db_connect();
$sql = "SELECT  c.id, c.nome, c.insta, t.numero, e.email FROM dados AS c 
        INNER JOIN telefone AS t ON c.id = t.dados_id 
        INNER JOIN email AS e ON c.id = e.dados_id 
        WHERE c.id = :id";
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
        <style type="text/css">
            #colorButton {
                width: 100px;
                background-color: red;
                border-color: red;
            }
            #button {
                width: 100px;
            }
        </style>
    </head>
    <body>
        <div class="jumbotron">
            <p class="h2 text-center">Editar de nome e instagram</p>
        </div>
        <div class="container">
            <form action="edit.php" method="post">
                <div class="form-group">
                    <label for="nome">Nome: </label>
                    <input type="text" class="form-control col-sm" name="nome" id="nome" style="width:80%;" value="<?php echo $user['nome'] ?>">
                </div>
                <div class="form-group">
                    <label for="insta">Insta: </label>
                    <input type="text" class="form-control col-sm" name="insta" id="insta" style="width:80%;" value="<?php echo $user['insta'] ?>">
                </div>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <a href="index.php">
                    <button type="submit" class="btn btn-primary" id="button">Alterar</button>
                    <button type="button" class="btn btn-primary" id="colorButton">Cancelar</button>
                </a>
            </form>
        </div>
    </body>
</html>