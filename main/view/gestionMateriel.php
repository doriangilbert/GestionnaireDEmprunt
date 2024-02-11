<?php include('../view/navbar.php');

if (!isset($_SESSION))
    session_start();
require_once("../entity/BD_Link.php");

$Reference = "";
$Nom = "";
$Version = "";

$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["ref"])) {
        header("location: ../view/showHardware.php");
        exit;
    }

    $Reference = $_GET["ref"];


    $sql = "SELECT * FROM materiel WHERE Reference='$Reference'";
    $result = BD_Link::connexion()->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: ../view/showHardware.php");
        exit;
    }

    $Reference = $row["Reference"];
    $Nom = $row["Nom"];
    $Version = $row["Version"];
} else {

    $Reference = $_POST["Ref"];
    $Nom = $_POST["Nom"];
    $Version = $_POST["Ver"];


    $sql = "UPDATE materiel SET Nom='$Nom', `Version`='$Version' WHERE Reference= $Reference";

    $result = BD_Link::connexion()->query($sql);


    $successMessage = "Votre matériel a bien été modifié";
}
?>

<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Matériel - GestionnaireDEmprunt</title>
    <link rel="stylesheet" href="../../ressources/styles/style.css">
    <link href="../../ressources/styles/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body class="h-100 text-black">

<div class="d-flex justify-content-center align-items-center h-100 flex-column">
    <h1 class="mb-5">Gestion du matériel</h1>
    <h5 class="mb-5">Référence : <?php echo $Reference ?></h5>
    <form method="post">
        <input type="hidden" value="<?php echo $Reference ?>">
        <div class="row mb-3 align-items-center">
            <label for="inputNom" class="form-label col m-0">Nom :</label>
            <input type="text" class="form-control col" id="inputNom" name="Nom" value="<?php echo $Nom ?>" placeholder="Samsung S10" maxlength="30" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputVersion" class="form-label col m-0">Version :</label>
            <input type="text" class="form-control col" id="inputVersion" name="Ver" value="<?php echo $Version ?>" placeholder="8.0" minlength="3" maxlength="15" pattern="[0-9]+(\.[0-9]+)+" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputReference" class="form-label col m-0">Référence :</label>
            <input type="text" class="form-control col" id="inputReference" name="Ref" value="<?php echo $Reference ?>" placeholder="001" minlength="3" maxlength="5" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputNumTel" class="form-label col m-0">Numéro de téléphone :</label>
            <input type="text" class="form-control col" id="inputNumTel" name="Tel" placeholder="XXXXXXXXXX" minlength="10" maxlength="10" pattern="^0[1-9]([-. ]?[0-9]{2}){4}$">
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputPhoto" class="form-label col m-0">Photo :</label>
            <input type="file" class="form-control col" id="inputPhoto" name="Photo" accept=".png, .jpg, .jpeg, .svg">
        </div>
        <?php

        $sql = "SELECT * FROM emprunte WHERE Reference='$Reference'";
        $result = BD_Link::connexion()->query($sql);
        $row = $result->fetch_assoc();
        $Matricule = $row["Matricule"];

        $sql = "SELECT * FROM utilisateur";
        $result = BD_Link::connexion()->query($sql);
        echo "<div class='row mb-3 align-items-center'>
            <label for='inputEmprunteur' class='form-label col m-0'>Emprunteur :</label>
            <select class='form-select col' id='inputEmprunteur' name='inputEmprunteur'>";
        while ($row = $result->fetch_assoc()) {
            if ($row["Matricule"] == $Matricule)
                echo "<option value='" . $row["Matricule"] . "' selected>" . $row["Matricule"] . " - " . $row["Nom"] . " " . $row["Prenom"] . "</option>";
            else
                echo "<option value='" . $row["Matricule"] . "'>" . $row["Matricule"] . " - " . $row["Nom"] . " " . $row["Prenom"] . "</option>";
        }
        echo "</select>
        </div>";

        $sql = "SELECT * FROM emprunte WHERE Reference='$Reference'";
        $result = BD_Link::connexion()->query($sql);
        $row = $result->fetch_assoc();
        echo "<div class='row mb-3 align-items-center'>
            <label for='inputDateDebut' class='form-label col m-0'>Date de début de l'emprunt :</label>
            <input type='date' class='form-control col' id='inputDateDebut' name='inputDateDebut' value='" . $row["Date_debut"] . "'>
        </div>
        <div class='row mb-3 align-items-center'>
            <label for='inputDateFin' class='form-label col m-0'>Date de fin de l'emprunt :</label>
            <input type='date' class='form-control col' id='inputDateFin' name='inputDateFin' value='" . $row["Date_de_fin"] . "'>
        </div>";

        ?>

        <?php
        if (!empty($successMessage)) {
            echo "
            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'</button>
                    </div>
                </div>
            </div>
            ";
        }
        ?>
        <div class="row">
            <div class="col-4">
                <a class="btn btn-secondary w-100 mt-4" href="<?php echo $_SESSION['isAdmin'] == 1 ? "showHardware.php" : "profilEmprunteur.php" ?>">Retour</a>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary w-100 mt-4">Modifier</button>
            </div>
            <?php
            if ($_SESSION["isAdmin"] == 1 && $_SESSION["matricule"] != $_GET["matricule"])
                echo "
            <div class=\"col-4\">
                <a class=\"btn btn-danger w-100 mt-4\" href=\"../controller/deleteHardware.php?ref=".$Reference."\">Supprimer</a>
            </div>
                ";
            ?>
        </div>
    </form>
</div>

<?php include('../view/footer.php'); ?>

</body>

</html>

