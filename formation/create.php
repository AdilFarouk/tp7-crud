<?php
require_once '../database/connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // a. récupérer les valeurs
    $titre  = $_POST['titre'];
    $duree  = $_POST['duree'];
    $niveau = $_POST['niveau'];

    $sql = "INSERT INTO formation (titre, duree, niveau) VALUES (:titre, :duree, :niveau)";
    $stmt = $pdo->prepare($sql);

    $stmt->execute(array(
        ":titre"  => $titre,
        ":duree"  => $duree,
        ":niveau" => $niveau
    ));

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter une formation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php $base = '../'; $page = 'formation'; include '../navbar.php'; ?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h1 class="h5 mb-0"><i class="bi bi-plus-circle me-2"></i>Ajouter une formation</h1>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Titre</label>
                            <input type="text" name="titre" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Durée (mois)</label>
                            <input type="number" name="duree" min="1" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Niveau</label>
                            <input type="text" name="niveau" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success"><i class="bi bi-check-circle me-1"></i>Enregistrer</button>
                        <a href="index.php" class="btn btn-secondary"><i class="bi bi-x-circle me-1"></i>Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>