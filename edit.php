<?php
require_once 'init.php';

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$insta = isset($_POST['insta']) ? $_POST['insta'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

if (empty($nome) || empty($insta))
{
    echo "Preencha todos os campos";
    exit;
}

$PDO = db_connect();
$sql = "UPDATE dados SET nome = :nome, insta = :insta WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':insta', $insta);
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