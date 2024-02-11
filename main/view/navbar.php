<?php

if (!isset($_SESSION))
    session_start();
if (isset($_SESSION["matricule"])) {
    if ($_SESSION['isAdmin'])
        $url = "../view/profilAdmin.php";
    else
        $url = "../view/profilEmprunteur.php";
} else
    $url = "../view/login.php";

?>

<header>
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
        <div class="container-fluid">

            <a class="navbar-brand fw-bold" href="../view/index.php">Gestionnaire d'emprunts</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-item-custom">
                <div class="d-flex align-items-center">
                    <a href="../view/index.php" class="text-black text-decoration-none px-3">Accueil</a>
                    <a class="text-black text-decoration-none px-3" href=<?php echo $url ?>>Mon compte</a>
                </div>
            </div>
        </div>
    </nav>
</header>