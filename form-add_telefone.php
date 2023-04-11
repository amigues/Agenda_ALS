<?php 
    require 'init.php';
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
        <form action="add.php" method="post">
        <div class="form-group">
            <label for="telefone">Telefone: </label>
            <input type="text" class="form-control col-sm" name="telefone" style="width:80%;" placeholder="Informe o telefone">
        </div>
        
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
    </body>
</html>


