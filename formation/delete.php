<?php
require_once '../database/connexion.php';

// a. récupérer l'identifiant
$id = $_GET['id'];

try {
    // b + c. DELETE avec WHERE obligatoire
    $stmt = $pdo->prepare("DELETE FROM formation WHERE id_formation = :id");
    $stmt->execute(array(":id" => $id));

    // d. rediriger vers la liste
    header("Location: index.php");
} catch (PDOException $e) {
    // la formation a encore des étudiants ou des modules
    header("Location: index.php?erreur=1");
}
exit;
?>