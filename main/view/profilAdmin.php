<?php include('navbar.php'); 
session_start();?>
<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionnaireDEmprunt</title>
    <link rel="stylesheet" href="../../ressources/styles/style.css">
    <link href="../../ressources/styles/bootstrap.min.css" rel="stylesheet">
</head>


<body class="h-100 text-black">



<div class="d-flex justify-content-center align-items-center h-100 flex-column">
    <h1 class="mb-5">Profil administrateur</h1>
    <h3 class="mb-5">Matricule : <?php echo $_SESSION['matricule']; ?></h3>
    <div class="row w-75">
        <div class="col-4">
            <div class="d-flex flex-column align-items-center">
                <p>Partie Utilisateur</p>
                <a class="btn btn-primary m-3 p-4" href="ajoutUtilisateur.php">Création Utilisateur</a>
                <a class="btn btn-primary m-3 p-4" href="consultationUtilisateur.php">Consultation Utilisateur</a>
            </div>
        </div>
        <div class="col-4"></div>
        <div class="col-4">
            <div class="d-flex flex-column align-items-center">
                <p>Partie Emprunt</p>
                <a class="btn btn-primary m-3 p-4" href="ajoutMateriel.php">Ajouter un Matériel</a>
                <a class="btn btn-primary m-3 p-4" href="consultationMateriel.php">Consulter les Matériels</a>
            </div>
        </div>
    </div>
    <a href="logout.php" class="btn btn-primary m-5 p-4">Se déconnecter</a>
</div>

<?php include('footer.php') ?>

</body>

</html>