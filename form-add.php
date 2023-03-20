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
<div class="">
    <h1> Agenda de Contatos</h1>
    <h2> Cadastro de Contato</h2>

    <form action="add.php" method="post">
    <div class="form-group">
        <label for="name">Nome: </label>
        <input type="text" class="form-control col-sm" name="name" style="whidth:25%;" placeholder="Informe o seu nome">
    </div>
    <div class="form-group">
        <<label for="email">E-mail: </label>
        <input type="text" class="form-control col-sm" name="email" style="whidth:25%;" placeholder="Informe o seu e-mail">
    </div>
