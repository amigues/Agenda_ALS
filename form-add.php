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
        <style type="text/css">
            #colorButton {
                width: 100px;
                background-color: red;
                border-color: red;
            }
        </style>
    </head>
    <body>
        <div class="jumbotron">
            <p class="h2 text-center">Cadastro de Contato</p>
        </div>
        <div class="container">
            <form action="add.php" method="post">
                <div class="form-group">
                    <label for="name">Nome: </label>
                    <input type="text" class="form-control col-sm" name="nome" style="width:80%;" placeholder="Informe o nome">
                </div>
                <div class="form-group">
                    <label for="insta">Instagram: </label>
                    <input type="text" class="form-control col-sm" name="insta" style="width:80%;" placeholder="Informe o @ do Instagram">
                </div>
                <a href="page-add.php">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </a>
                <a href="page-add.php" >
                    <button type="button" class="btn btn-primary" id="colorButton">Cancelar</button>
                </a>
            </form>
        </div>
    </body>
</html>


