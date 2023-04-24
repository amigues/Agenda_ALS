<?php
require_once 'init.php';

$email = isset($_POST['email']) ? $_POST['email'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

if (empty($email))
{
    echo "Preencha todos os campos";
    exit;
}

$PDO = db_connect();
$sql = "UPDATE email SET email = :email WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':email', $email);
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