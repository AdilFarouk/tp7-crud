<?php
require_once '../database/connexion.php';

//  récupérer l'identifiant
$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM formation WHERE id_formation = :id");
    $stmt->execute(array(":id" => $id));

    header("Location: index.php");
} catch (PDOException $e) {
    header("Location: index.php?erreur=1");
}
exit;
?>