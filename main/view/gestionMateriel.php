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
    <h3 class="mb-5">Référence : XXXXX</h3>
    <h3 class="mb-5">Type : XXXXXXX</h3>
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
            <input type="text" class="form-control col" id="inputReference" name="Ref" value="<?php echo $Reference ?>" placeholder="001" minlength="3" maxlength="3" pattern="[0-9]{3}" required>
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
        <button type="submit" class="btn btn-primary w-100 mt-4">Valider</button>
        <a href="<?php echo "../controller/deleteHardware.php?ref=$Reference" ?>" class="btn btn-primary w-100 mt-4">Supprimer le matériel</a>
    </form>
    <div>
        <a href="../view/profilAdmin.php" class="btn btn-primary w-100 mt-4">Annuler</a>
    </div>
</div>

<?php include('../view/footer.php'); ?>

</body>

</html>

