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
    <h1 class="mb-5">Ajouter un utilisateur</h1>
    <form>
        <div class="row mb-3 align-items-center">
            <label for="inputNom" class="form-label col m-0">Nom :</label>
            <input type="text" class="form-control col" id="inputNom" placeholder="Smith" maxlength="30" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputPrenom" class="form-label col m-0">Prenom :</label>
            <input type="text" class="form-control col" id="inputPrenom" placeholder="John" maxlength="30" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputEmail" class="form-label col m-0">Adresse e-mail :</label>
            <input type="email" class="form-control col" id="inputEmail" placeholder="john.smith@gmail.com" pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputMatricule" class="form-label col m-0">Matricule :</label>
            <input type="text" class="form-control col" id="inputMatricule" placeholder="XXXXXXX" minlength="7" maxlength="7" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputNumTel" class="form-label col m-0">Numéro de téléphone :</label>
            <input type="text" class="form-control col" id="inputNumTel" placeholder="XXXXXXXXXX">
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputMotDePasse" class="form-label col m-0">Mot de passe :</label>
            <input type="password" class="form-control col" id="inputMotDePasse" placeholder="XXXXX" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputAdministrateur" class="form-label col m-0">Administrateur ?</label>
            <input type="checkbox" class="form-check col" id="inputAdministrateur">
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-4">Valider</button>
    </form>
</div>

<?php include('footer.php'); ?>

</body>

</html>
