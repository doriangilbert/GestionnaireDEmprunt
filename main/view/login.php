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

<?php include('navbar.php') ?>

<div class="d-flex justify-content-center align-items-center h-100 flex-column">
    <h1 class="mb-5">Connexion</h1>
    <form action="loginform.php" method="post">
        <div class="mb-3">
            <label for="inputIdentifiant" class="form-label">Identifiant</label>
            <input type="text" class="form-control w-100" id="inputIdentifiant">
        </div>
        <div class="mb-3">
            <label for="inputMotDePasse" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="inputMotDePasse">
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-4">Se connecter</button>
    </form>
</div>

<?php include('footer.php') ?>

</body>

</html>
