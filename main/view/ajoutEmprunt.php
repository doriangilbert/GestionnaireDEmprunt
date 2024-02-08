<?php include('navbar.php'); ?>
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
    <h1 class="mb-5">Emprunt d'un matériel</h1>
    <h5 class="mb-3">Référence : XXXXX</h5>
    <h5 class="mb-3">Nom : XXXXXXXXXX</h5>
    <h5 class="mb-3">Version : XX</h5>
    <h5 class="mb-3">Numéro de téléphone : XXXXXXXXXX</h5>
    <form class="mt-3">
        <div class="row mb-3 align-items-center">
            <label for="inputDateDebut" class="form-label col m-0">Date de début de l'emprunt :</label>
            <input type="date" class="form-control col" id="inputDateDebut" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputDateFin" class="form-label col m-0">Date de début de l'emprunt :</label>
            <input type="date" class="form-control col" id="inputDateFin" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-4">Valider</button>
    </form>
    <div>
        <a href="profilAdmin.php" class="btn btn-primary w-100 mt-4">Annuler</a>
    </div>
</div>

<?php include('footer.php'); ?>

</body>

</html>
