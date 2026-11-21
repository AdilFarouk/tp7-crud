<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Centre de formation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php $base = ''; $page = 'accueil'; include 'navbar.php'; ?>

<div class="container my-5">
    <div class="p-5 mb-4 bg-white rounded-3 shadow-sm text-center">
        <i class="bi bi-mortarboard-fill text-primary" style="font-size:4rem;"></i>
        <h1 class="display-6 fw-bold mt-2">Centre de formation</h1>
        <p class="lead text-muted mb-0">Gestion des formations, des étudiants et des modules.</p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm h-100 text-center border-0">
                <div class="card-body p-4">
                    <i class="bi bi-journal-bookmark text-primary" style="font-size:3rem;"></i>
                    <h2 class="h5 mt-3">Formations</h2>
                    <p class="text-muted">Gérer les formations proposées par le centre.</p>
                    <a href="formation/index.php" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm h-100 text-center border-0">
                <div class="card-body p-4">
                    <i class="bi bi-people text-success" style="font-size:3rem;"></i>
                    <h2 class="h5 mt-3">Étudiants</h2>
                    <p class="text-muted">Gérer les étudiants et leur formation.</p>
                    <a href="etudiant/index.php" class="btn btn-success">Accéder</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm h-100 text-center border-0">
                <div class="card-body p-4">
                    <i class="bi bi-collection text-warning" style="font-size:3rem;"></i>
                    <h2 class="h5 mt-3">Modules</h2>
                    <p class="text-muted">Gérer les modules de chaque formation.</p>
                    <a href="module/index.php" class="btn btn-warning">Accéder</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>