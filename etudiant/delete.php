<?php
require_once '../database/connexion.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM etudiant WHERE id_etudiant = :id");
$stmt->execute(array(":id" => $id));

header("Location: index.php");
exit;
?>