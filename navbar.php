<?php
// $base (chemin vers la racine) et $page (page active)
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?php echo $base; ?>index.php">
            <i class="bi bi-mortarboard-fill me-2"></i>Centre de Formation
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'accueil') echo 'active'; ?>" href="<?php echo $base; ?>index.php">
                        <i class="bi bi-house-door me-1"></i>Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'formation') echo 'active'; ?>" href="<?php echo $base; ?>formation/index.php">
                        <i class="bi bi-journal-bookmark me-1"></i>Formations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'etudiant') echo 'active'; ?>" href="<?php echo $base; ?>etudiant/index.php">
                        <i class="bi bi-people me-1"></i>Étudiants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'module') echo 'active'; ?>" href="<?php echo $base; ?>module/index.php">
                        <i class="bi bi-collection me-1"></i>Modules</a>
                </li>
            </ul>
        </div>
    </div>
</nav>