<?php
require_once 'init.php';

$PDO = db_connect();

$sql_count = "SELECT COUNT(*) AS total FROM dados ORDER BY name ASC";
$sql = "SELECT id, nome, email, telefone, insta FROM dados ORDER BY name ASC";
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>