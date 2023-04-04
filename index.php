<?php
require_once 'init.php';

$PDO = db_connect();

$sql_count = "SELECT COUNT(*) AS total FROM dados ORDER BY nome ASC";
$sql = "SELECT id, nome, email, telefone, insta FROM dados ORDER BY nome ASC";
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Agenda</title>

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery.js"></script>
    <style type="text/css">
        .container{
            margin.top: 50px;
            /*margin-left: 100px;*/
        }
    </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <button class="navbar-toggler" typt="button" data-toggle="collapse" data-target="#navbarExample10" 
                    aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="nav" href="#">
                <!--imagem icon-->
            </a>
            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExemple10">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html"> Início <span class="sr-only">(atual)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Tarefa</a>
                            <!--parei aqui-->
                    </li>
                    <li></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <h1>Agenda de contato</h1>
            <p><a href="form-add.php">Adicionar contato</a></p>
            <h2>Lista de contato</h2>
            <p>Total de contato: <?php echo $total ?></p>
            <?php if ($total > 0): ?>
            <table class="table table-striped" width="50%" border="1">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Instagram</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $user['nome'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['telefone'] ?></td>
                        <td><?php echo $user['insta'] ?></td>
                        <td>
                            <a href="form-edit.php?id=<?php echo $user['id'] ?>">Editar</a>
                            <a href="delete.php?id=<?php echo $user['id'] ?>" onclick="return confirm(' tem certeza que deseja remover?');">Remover<a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>Nenhum contato registrado</p>
        <?php endif; ?>
        </div>
    </body>
</html>

