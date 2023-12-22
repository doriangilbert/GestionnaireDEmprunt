<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprunt | Ajout d'équipement</title>


    <link rel="stylesheet" href="../../ressources/styles/style.css">
    <link href="../../ressources/styles/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../ressources/styles/table.css">
</head>
<body>
<?php include('navbar.php') ?>
<div class="container mt-5 pt-5">
    <h2 class="w-100 text-center mb-3">Consultation des matériels informatique</h2>
    <table class="table table-hover table-responsive table-bordered border-black">
        <thead>
        <tr>
            <th scope="col">Référence</th>
            <th scope="col">Nom</th>
            <th scope="col">Version</th>
            <th scope="col">Statut</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>TestNom</td>
            <td>Version 1</td>
            <td>Disponible</td>
        </tr>
        </tbody>
    </table>
    <div class="custom-table">
        <div class="row custom-table-head">
            <div class="col-3 ps-3 h-100"><h3 class="h5 mb-0 fw-bold">Référence</h3></div>
            <div class="col-3 ps-3"><h3 class="h5 mb-0 fw-bold">Nom</h3></div>
            <div class="col-3 ps-3"><h3 class="h5 mb-0 fw-bold">Version</h3></div>
            <div class="col-3 ps-3"><h3 class="h5 mb-0 fw-bold">Statut</h3></div>
        </div>
        <a class="row">
            <div class="col-3 ps-3"><p class="mb-0 fw-bold">XX000</p></div>
            <div class="col-3 ps-3"><p class="mb-0">ordkuheyfozieofgjraegpi</p></div>
            <div class="col-3 ps-3"><p class="mb-0">euuuuh</p></div>
            <div class="col-3 ps-3"><p class="mb-0">Statut</p></div>
        </a>
        <a class="row">
            <div class="col-3 ps-3"><p class="mb-0 fw-bold">XX000</p></div>
            <div class="col-3 ps-3"><p class="mb-0">ordi</p></div>
            <div class="col-3 ps-3"><p class="mb-0">euuuuh</p></div>
            <div class="col-3 ps-3"><p class="mb-0">Statut</p></div>
        </a>
    </div>
</div>
<?php include('footer.php') ?>
</body>
</html>
