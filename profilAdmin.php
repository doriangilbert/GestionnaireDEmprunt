<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionnaireDEmprunt</title>
    <link rel="stylesheet" href="ressources/styles/style.css">
    <link href="ressources/styles/bootstrap.min.css" rel="stylesheet">
</head>

<body class="h-100 text-black">
<?php include('main/view/navbar.php'); ?>
<div class="d-flex justify-content-center align-items-center h-100 flex-column">
    <h1 class="mb-5">Profil administrateur</h1>
    <h3 class="mb-5">Matricule : XXXXX</h3>
    <div class="d-flex">
        <a href="profilAdmin.php" class="btn btn-primary m-5 p-4">Gérer les utilisateurs</a>
        <a href="profilAdmin.php" class="btn btn-primary m-5 p-4">Gérer les matériels</a>
    </div>
    <a href="index.php" class="btn btn-primary m-5 p-4">Se déconnecter</a>
</div>

<footer class="fixed-bottom">
    <div class="row bg-primary text-white">
        <span class="col-4"></span>
        <p class="col-4 text-center mb-1 mt-1">GestionnaireDEmprunt</p>
    </div>
</footer>
</body>

</html>