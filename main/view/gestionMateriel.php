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
    <h1 class="mb-5">Gestion du matériel</h1>
    <h3 class="mb-5">Référence : XXXXX</h3>
    <form>
        <div class="row mb-3 align-items-center">
            <label for="inputNom" class="form-label col m-0">Nom :</label>
            <input type="text" class="form-control col" id="inputNom" placeholder="Samsung S10" maxlength="30" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputVersion" class="form-label col m-0">Version :</label>
            <input type="text" class="form-control col" id="inputVersion" placeholder="8.0" minlength="3" maxlength="15" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputReference" class="form-label col m-0">Référence :</label>
            <input type="text" class="form-control col" id="inputReference" placeholder="AN001" maxlength="5" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputNumTel" class="form-label col m-0">Numéro de téléphone :</label>
            <input type="text" class="form-control col" id="inputNumTel" placeholder="XXXXXXXXXX">
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputPhoto" class="form-label col m-0">Photo :</label>
            <input type="file" class="form-control col" id="inputPhoto" accept=".png, .jpg, .jpeg, .svg">
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-4">Valider</button>
    </form>
    <div>
        <a href="profilAdmin.php" class="btn btn-primary w-100 mt-4">Annuler</a>
    </div>
    <form>
        <button type="submit" class="btn btn-primary w-100 mt-4">Supprimer le matériel</button>
    </form>
</div>

<?php include('footer.php'); ?>

</body>

</html>

