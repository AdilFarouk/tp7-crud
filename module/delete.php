<?php
require_once '../database/connexion.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM module WHERE id_module = :id");
$stmt->execute(array(":id" => $id));

header("Location: index.php");
exit;
?>