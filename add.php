<?php
require_once 'init.php';

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$insta = isset($_POST['insta']) ? $_POST['insta'] : null;

if (empty($nome) || empty($insta))
{
    echo "Volte e preencha todos os campos";
    exit;
}

$PDO = db_connect();
$sql = "INSERT INTO dados(nome, insta) VALUES(:nome, :insta)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome',$nome);
$stmt->bindParam(':insta',$insta);
if ($stmt->execute())
{
    header('Location: index.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>