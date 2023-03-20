<?php
require_once 'init.php';

$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$telefone = isset($_POST['name']) ? $_POST['name'] : null;
$insta = isset($_POST['insta']) ? $_POST['insta'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

if (empty($name) || empty($email) || empty($telefone) || empty($insta))
{
    echo "Preencha todos os campos";
    exit;
}

$PDO = db_connect();
$sql = "UPDATE users SET name = :name, email = :email, telefone = :telefone, insta = :insta WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':telefone', $telefone);
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