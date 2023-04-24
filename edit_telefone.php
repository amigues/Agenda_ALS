<?php
require_once 'init.php';

$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

if (empty($telefone))
{
    echo "Preencha todos os campos";
    exit;
}

$PDO = db_connect();
$sql = "UPDATE telefone SET numero = :numero WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':numero', $telefone);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
if ($stmt->execute())
{
    header('Location: index.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}
?>