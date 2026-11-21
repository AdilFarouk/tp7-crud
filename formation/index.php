<?php
require_once '../database/connexion.php';

$stmt = $pdo->query("SELECT * FROM formation ORDER BY id_formation");
$formations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php $base = '../'; $page = 'formation'; include '../navbar.php'; ?>

<div class="container my-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0"><i class="bi bi-journal-bookmark me-2"></i>Liste des formations</h1>
        <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i>Ajouter une formation</a>
    </div>

    <?php if (isset($_GET['erreur'])) : ?>
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            Suppression impossible : cette formation contient encore des étudiants ou des modules.
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th><th>Titre</th><th>Durée (mois)</th><th>Niveau</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($formations as $f) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($f['id_formation']); ?></td>
                        <td><?php echo htmlspecialchars($f['titre']); ?></td>
                        <td><?php echo htmlspecialchars($f['duree']); ?></td>
                        <td><?php echo htmlspecialchars($f['niveau']); ?></td>
                        <td class="text-center">
                            <a href="edit.php?id=<?php echo $f['id_formation']; ?>" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil-square"></i> Modifier</a>
                            <a href="delete.php?id=<?php echo $f['id_formation']; ?>" class="btn btn-sm btn-outline-danger"
                               onclick="return confirm('Supprimer cette formation ?');">
                                <i class="bi bi-trash"></i> Supprimer</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>