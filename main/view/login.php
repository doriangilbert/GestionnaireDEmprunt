<?php include('../view/navbar.php');

if (!isset($_SESSION))
    session_start();
if (isset($_SESSION["isAdmin"]))
    if ($_SESSION["isAdmin"] == 1) {
        header("Location: ../view/profilAdmin.php");
    } else {
        header("Location: ../view/profilEmprunteur.php");
    }

?>

<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - GestionnaireDEmprunt</title>
    <link rel="stylesheet" href="../../ressources/styles/style.css">
    <link href="../../ressources/styles/bootstrap.min.css" rel="stylesheet">
</head>

<body class="h-100 text-black">

<div class="d-flex justify-content-center align-items-center h-100 flex-column">
    <h1 class="mb-5">Connexion</h1>
    <form method="POST" action="../controller/loginController.php">
        <div class="mb-3">
            <label for="inputIdentifiant" class="form-label">Identifiant</label>
            <input type="text" class="form-control w-100" id="inputIdentifiant" name="inputIdentifiant" required>
        </div>
        <div class="mb-3">
            <label for="inputMotDePasse" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="inputMotDePasse" name="inputMotDePasse" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-4">Se connecter</button>
    </form>
    <?php
    if (isset($_SESSION["login_error"])){
        echo "<p style='color: red;'> Vos identifiants sont incorrects";
        unset($_SESSION["login_error"]);
    }

    ?>
</div>

<?php include('../view/footer.php') ?>

</body>

</html>
