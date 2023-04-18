<?php
require_once 'init.php';

$numero = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$contato = isset($_POST['contato']) ? $_POST['contato'] : null;

if (empty($numero) || empty($contato))
{
    echo "Volte e preencha todos os campos";
    exit;
}

$PDO = db_connect();
$sql = "INSERT INTO telefone(numero, dados_id) VALUES(:numero, :contato)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':numero',$numero);
$stmt->bindParam(':contato',$contato);
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