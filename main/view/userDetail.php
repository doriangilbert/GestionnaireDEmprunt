<?php

include('../view/navbar.php');

if (!isset($_SESSION))
    session_start();
if ($_SESSION["matricule"] != $_GET["matricule"])
    if ($_SESSION["isAdmin"] != 1)
        header("Location: ../view/index.php");

require_once("../controller/userController.php");
$controller = new userController();
$user = $controller->getById($_GET["matricule"])->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail Utilisateur - GestionnaireDEmprunt</title>
    <link rel="stylesheet" href="../../ressources/styles/style.css">
    <link href="../../ressources/styles/bootstrap.min.css" rel="stylesheet">
</head>

<body class="h-100 text-black">

<div class="d-flex justify-content-center align-items-center h-100 flex-column">
    <h1 class="mb-5">Consultation de l'utilisateur</h1>
    <form method="post" action="updateUser.php">
        <div class="row mb-3 align-items-center">
            <label for="inputMatricule" class="form-label col m-0">Matricule :</label>
            <input type="text" class="form-control col" id="inputMatricule" name="inputMatricule" maxlength="30" readonly value="<?php echo $user["Matricule"] ?>">
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputNom" class="form-label col m-0">Nom :</label>
            <input type="text" class="form-control col" id="inputNom" name="inputNom" placeholder="Smith" maxlength="30" required value="<?php echo $user["Nom"] ?>">
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputPrenom" class="form-label col m-0">Prenom :</label>
            <input type="text" class="form-control col" id="inputPrenom" name="inputPrenom" placeholder="John" maxlength="30" required value="<?php echo $user["Prenom"] ?>">
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputEmail" class="form-label col m-0">Adresse e-mail :</label>
            <input type="email" class="form-control col" id="inputEmail" name="inputEmail" placeholder="john.smith@gmail.com" pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$" required value="<?php echo $user["Email"] ?>">
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputNumTel" class="form-label col m-0">Numéro de téléphone :</label>
            <input type="text" class="form-control col" id="inputNumTel" name="inputNumTel" placeholder="XXXXXXXXXX" minlength="10" maxlength="10" pattern="^0[1-9]([-. ]?[0-9]{2}){4}$" value="<?php echo $user["Numero"] ?>">
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputMotDePasse" class="form-label col m-0">Nouveau mot de passe :</label>
            <input type="password" class="form-control col" id="inputMotDePasse" name="inputMotDePasse" placeholder="XXXXX">
        </div>
        <?php
        if ($_SESSION["isAdmin"] == 1 && $_SESSION["matricule"] != $_GET["matricule"]) {
            $checked = $user["Admin"] == 1 ? "checked" : "";
            echo "
        <div class=\"row mb-3 align-items-center\">
            <label for=\"inputAdministrateur\" class=\"form-label col m-0\">Administrateur ?</label>
            <input type=\"hidden\" value='off' name=\"inputAdministrateur\">
            <input type=\"checkbox\" class=\"form-check col\" id=\"inputAdministrateur\" name=\"inputAdministrateur\" ".$checked.">
        </div>
            ";
        }
        ?>
        <div class="row">
            <div class="col-4">
                <a class="btn btn-secondary w-100 mt-4" href="<?php echo $_SESSION['isAdmin'] == 1 ? "showUser.php" : "profilEmprunteur.php" ?>">Retour</a>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary w-100 mt-4">Modifier</button>
            </div>
            <?php
            if ($_SESSION["isAdmin"] == 1 && $_SESSION["matricule"] != $_GET["matricule"])
                echo "
            <div class=\"col-4\">
                <a class=\"btn btn-danger w-100 mt-4\" href=\"userDelete.php?matricule=".$_GET["matricule"]."\">Supprimer</a>
            </div>
                ";
            ?>
        </div>
    </form>

</div>

<?php include('../view/footer.php'); ?>

</body>

</html>
