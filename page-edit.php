<?php
require_once 'init.php';

$PDO = db_connect();

$sql_count = "SELECT COUNT(*) AS total FROM dados ORDER BY nome ASC";
$sql = "SELECT  c.id, c.nome, c.insta, t.numero, e.email FROM dados AS c INNER JOIN telefone AS t ON c.id = t.dados_id INNER JOIN email AS e ON c.id = e.dados_id";
$stmt_count = $PDO->prepare($sql_count);
$stmt = $PDO->prepare($sql);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC)
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Agenda</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
        <link href="css/estilo.css" rel="stylesheet" />
        <script src="bootstrap/js/jquery.js"></script>
        <script src="bootstrap/js/popper.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <style type="text/css">
            .container {
                margin-top: 60px;
            }
            .corlink {
                color: white;
            }
            .botao {
                margin: 20px;
                display: flex;
                justify-content: center;
            }
            #button {
                width: 300px;
            }
            #colorButton {
                width: 150px;
                background-color: red;
                border-color: red;
            }
        </style>
    </head>
    <body>
        <div class="jumbotron">
            <p class="h2 text-center">Editar contato</p>
        </div>
        <div class="container">
            <section class="botao">
                <a href="form-edit.php?id=<?php echo $user['id'] ?>" class="corlink">
                    <button type="submit" class="btn btn-primary" id="button">Editar nome e insta</button>
                </a>
            </section>
            <section class="botao">
                <a href="form-edit_telefone.php?id=<?php echo $user['id'] ?>" class="corlink">
                    <button type="submit" class="btn btn-primary" id="button">Editar telefone</button>
                </a>
            </section>
            <section class="botao">
                <a href="form-edit_email.php?id=<?php echo $user['id'] ?>" class="corlink">
                    <button type="submit" class="btn btn-primary" id="button">Editar email</button>
                </a>
            </section>
            <section class="botao">
                <a href="index.php" >
                    <button type="submit" class="btn btn-primary" id="colorButton">Cancelar</button>
                </a>
            </section>
        </div>
    </body>
</html>