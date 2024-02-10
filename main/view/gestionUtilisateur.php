<?php include('../view/navbar.php');

if (!isset($_SESSION))
    session_start();

?>

<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Utilisateur - GestionnaireDEmprunt</title>
    <link rel="stylesheet" href="../../ressources/styles/style.css">
    <link href="../../ressources/styles/bootstrap.min.css" rel="stylesheet">
</head>

<body class="h-100 text-black">

<div class="d-flex justify-content-center align-items-center h-100 flex-column">
    <h1 class="mb-5">Gestion de l'utilisateur</h1>
    <h3 class="mb-5">Matricule : XXXXXXX</h3>
    <form>
        <div class="row mb-3 align-items-center">
            <label for="inputNom" class="form-label col m-0">Nom :</label>
            <input type="text" class="form-control col" id="inputNom" name="inputNom" placeholder="Smith" maxlength="30" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputPrenom" class="form-label col m-0">Prenom :</label>
            <input type="text" class="form-control col" id="inputPrenom" name="inputPrenom" placeholder="John" maxlength="30" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputEmail" class="form-label col m-0">Adresse e-mail :</label>
            <input type="email" class="form-control col" id="inputEmail" name="inputEmail" placeholder="john.smith@gmail.com" pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputNumTel" class="form-label col m-0">Numéro de téléphone :</label>
            <input type="text" class="form-control col" id="inputNumTel" name="inputNumTel" placeholder="XXXXXXXXXX" minlength="10" maxlength="10" pattern="^0[1-9]([-. ]?[0-9]{2}){4}$">
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputMotDePasse" class="form-label col m-0">Mot de passe :</label>
            <input type="password" class="form-control col" id="inputMotDePasse" name="inputMotDePasse" placeholder="XXXXX" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputAdministrateur" class="form-label col m-0">Administrateur ?</label>
            <input type="checkbox" class="form-check col" id="inputAdministrateur" name="inputAdministrateur">
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-4">Valider</button>
    </form>
    <div>
        <a href="../view/profilAdmin.php" class="btn btn-primary w-100 mt-4">Annuler</a>
    </div>
    <form>
        <button type="submit" class="btn btn-primary w-100 mt-4">Supprimer l'utilisateur</button>
    </form>
</div>

<?php include('../view/footer.php'); ?>

</body>

</html>
