<?php
require_once '../database/connexion.php';

$sql = "SELECT e.id_etudiant, e.nom, e.prenom, e.email, f.titre AS formation
        FROM etudiant e
        JOIN formation f ON e.id_formation = f.id_formation
        ORDER BY e.id_etudiant";
$stmt = $pdo->query($sql);
$etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Étudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php $base = '../'; $page = 'etudiant'; include '../navbar.php'; ?>

<div class="container my-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0"><i class="bi bi-people me-2"></i>Liste des étudiants</h1>
        <a href="create.php" class="btn btn-primary"><i class="bi bi-person-plus me-1"></i>Ajouter un étudiant</a>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Formation</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($etudiants as $e) : ?>
                    <tr>
                        <td><?php echo $e['id_etudiant']; ?></td>
                        <td><?php echo htmlspecialchars($e['nom']); ?></td>
                        <td><?php echo htmlspecialchars($e['prenom']); ?></td>
                        <td><?php echo htmlspecialchars($e['email']); ?></td>
                        <td><span class="badge bg-primary"><?php echo htmlspecialchars($e['formation']); ?></span></td>
                        <td class="text-center">
                            <a href="edit.php?id=<?php echo $e['id_etudiant']; ?>" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil-square"></i> Modifier</a>
                            <a href="delete.php?id=<?php echo $e['id_etudiant']; ?>" class="btn btn-sm btn-outline-danger"
                               onclick="return confirm('Supprimer cet étudiant ?');">
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