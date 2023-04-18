<?php
    require_once 'init.php';
    $PDO = db_connect();
    $sql = "SELECT id, nome FROM dados ORDER BY nome ASC";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Agenda de Contatos</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <scrip src="bootstrap/js/boostrap.js"></script>
    </head>
    <body>
    <div class="jumbotron">
        <p class="h2 text-center">Cadastro de Telefone</p>
    </div>
    <div class="container">
        <form action="add_telefone.php" method="post">
        <div class="form-group">
            <label for="telefone">Telefone: </label>
            <input type="text" class="form-control col-sm" name="telefone" style="width:80%;" placeholder="Informe o telefone">
        </div>
        <div class="form-group">
            <label for="selectTipo">Selecione o contato</label>
            <select class="form-control" name="contato" id="contato" required>
                <?php while($dados = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value=" <?php echo $dados['id'] ?> "> <?php echo $dados['nome'] ?> </option>   
                <?php endwhile; ?>
            </select>
        </div>
        
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
    </body>
</html>


