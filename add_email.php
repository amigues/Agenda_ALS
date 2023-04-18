<?php
require_once 'init.php';

$email = isset($_POST['email']) ? $_POST['email'] : null;
$contato = isset($_POST['contato']) ? $_POST['contato'] : null;


if (empty($email) || empty($contato))
{
    echo "Volte e preencha todos os campos";
    exit;
}

$PDO = db_connect();
$sql = "INSERT INTO email(email, dados_id) VALUES(:email, :contato)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':email',$email);
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