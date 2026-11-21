<?php
require_once '../database/connexion.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM module WHERE id_module = :id");
$stmt->execute(array(":id" => $id));
$module = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$module) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "UPDATE module SET intitule = :intitule, volume_horaire = :vh, id_formation = :idf WHERE id_module = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ":intitule" => $_POST['intitule'],
        ":vh"       => $_POST['volume_horaire'],
        ":idf"      => $_POST['id_formation'],
        ":id"       => $id
    ));
    header("Location: index.php");
    exit;
}

$formations = $pdo->query("SELECT id_formation, titre FROM formation ORDER BY titre")
                  ->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier un module</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php $base = '../'; $page = 'module'; include '../navbar.php'; ?>

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h1 class="h5 mb-0"><i class="bi bi-pencil-square me-2"></i>Modifier le module</h1>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Intitulé</label>
                            <input type="text" name="intitule" class="form-control"
                                   value="<?php echo htmlspecialchars($module['intitule']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Volume horaire (heures)</label>
                            <input type="number" name="volume_horaire" min="1" class="form-control"
                                   value="<?php echo $module['volume_horaire']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Formation</label>
                            <select name="id_formation" class="form-select" required>
                                <?php foreach ($formations as $f) : ?>
                                    <option value="<?php echo $f['id_formation']; ?>"
                                        <?php if ($f['id_formation'] == $module['id_formation']) echo 'selected'; ?>>
                                        <?php echo htmlspecialchars($f['titre']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="bi bi-arrow-repeat me-1"></i>Mettre à jour</button>
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