<?php
require_once 'init.php';

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$insta = isset($_POST['insta']) ? $_POST['insta'] : null;

if (empty($nome) || empty($email) || empty($telefone) || empty($insta))
{
    echo "Volte e preencha todos os campos";
    exit;
}

$PDO = bd_connect();
$sql = "INSERT INTO dados(nome, email, telefone, insta) VALUES(:nome, :email, :telefone, :insta)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome',$nome);
$stmt->bindParam(':nome',$email);
$stmt->bindParam(':nome',$telefone);
$stmt->bindParam(':nome',$insta);
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