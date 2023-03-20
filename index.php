<?php
require_once 'init.php';

$PDO = db_connect();

$sql_count = "SELECT COUNT(*) AS total FROM dados ORDER BY name ASC";
$sql = "SELECT id, nome, email, telefone, insta FROM dados ORDER BY name ASC";
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
    <script src="bootstrap/js/bootstrap.js"></script>
    <style type="text/css">
        .container{
            margin.top: 50px;
            margin-left: 100px;
        }
    </style>
    </head>
    <body>
        <div class="container">
            <h1>Agenda telefônica</h1>
            <p><a href="form-add.php">Adicionar usuário</a></p>
            <h2>Lista de usuário</h2>
            <p>Total de usuários> <?php echo $total ?></p>
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
                    <?php while ($user = $stmt->fetch(PDO:FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $user['nome'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['telefone'] ?></td>
                        <td><?php echo $user['instagram'] ?></td>
                        <td>
                            <a href="form-edit.php?id=<?php echo $user['id'] ?>">Editar</a>
                            <a href="delete.php?id=<?php echo $user['id'] ?>" onclick="return confirm(' tem certeza que deseja remover?');">Remover<a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>Nenhum usuário registrado</p>
        <?php endif; ?>
        </div>
    </body>
</html>

