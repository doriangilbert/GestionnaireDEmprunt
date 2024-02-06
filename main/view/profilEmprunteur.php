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

<?php include('navbar.php'); ?>

<div class="d-flex justify-content-center align-items-center h-100 flex-column">
    <h1 class="mb-5">Profil emprunteur</h1>
    <h3 class="mb-5">Matricule : XXXXXXX</h3>
    <a href="consultationEmprunts.php" class="btn btn-primary m-5 p-4">Consulter vos emprunts en cours</a>
    <a href="consultationMateriels.php" class="btn btn-primary m-5 p-4">Faire un nouvel emprunt de matériel</a>
    <a href="index.php" class="btn btn-primary m-5 p-4">Se déconnecter</a>
</div>

<?php include('footer.php') ?>

</body>

</html>