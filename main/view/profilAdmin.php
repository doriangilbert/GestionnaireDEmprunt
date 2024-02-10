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
    <div class="d-flex">
        <a href="consultationUtilisateursAdmin.php" class="btn btn-primary m-5 p-4">Gérer les utilisateurs</a>
        <a href="showHardware.php" class="btn btn-primary m-5 p-4">Gérer les matériels</a>
        <a href="consultationEmpruntsAdmin.php" class="btn btn-primary m-5 p-4">Gérer les emprunts</a>
    </div>
    <a href="index.php" class="btn btn-primary m-5 p-4">Se déconnecter</a>
</div>

<?php include('footer.php') ?>

</body>

</html>