<?php
require_once '../database/connexion.php';

$sql = "SELECT m.id_module, m.intitule, m.volume_horaire, f.titre AS formation
        FROM module m
        JOIN formation f ON m.id_formation = f.id_formation
        ORDER BY m.id_module";
$stmt = $pdo->query($sql);
$modules = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modules</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php $base = '../'; $page = 'module'; include '../navbar.php'; ?>

<div class="container my-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0"><i class="bi bi-collection me-2"></i>Liste des modules</h1>
        <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i>Ajouter un module</a>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th><th>Intitulé</th><th>Volume horaire (h)</th><th>Formation</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($modules as $m) : ?>
                    <tr>
                        <td><?php echo $m['id_module']; ?></td>
                        <td><?php echo htmlspecialchars($m['intitule']); ?></td>
                        <td><?php echo htmlspecialchars($m['volume_horaire']); ?></td>
                        <td><span class="badge bg-primary"><?php echo htmlspecialchars($m['formation']); ?></span></td>
                        <td class="text-center">
                            <a href="edit.php?id=<?php echo $m['id_module']; ?>" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil-square"></i> Modifier</a>
                            <a href="delete.php?id=<?php echo $m['id_module']; ?>" class="btn btn-sm btn-outline-danger"
                               onclick="return confirm('Supprimer ce module ?');">
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