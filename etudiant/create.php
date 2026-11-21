<?php
require_once '../database/connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "INSERT INTO etudiant (nom, prenom, email, id_formation)
            VALUES (:nom, :prenom, :email, :idf)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ":nom"    => $_POST['nom'],
        ":prenom" => $_POST['prenom'],
        ":email"  => $_POST['email'],
        ":idf"    => $_POST['id_formation']
    ));
    header("Location: index.php");
    exit;
}

// pour alimenter la liste select
$formations = $pdo->query("SELECT id_formation, titre FROM formation ORDER BY titre")
                  ->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php $base = '../'; $page = 'etudiant'; include '../navbar.php'; ?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h1 class="h5 mb-0"><i class="bi bi-person-plus me-2"></i>Ajouter un étudiant</h1>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" name="nom" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prénom</label>
                            <input type="text" name="prenom" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Formation</label>
                            <select name="id_formation" class="form-select" required>
                                <option value="">-- Choisir une formation --</option>
                                <?php foreach ($formations as $f) : ?>
                                    <option value="<?php echo $f['id_formation']; ?>">
                                        <?php echo htmlspecialchars($f['titre']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
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