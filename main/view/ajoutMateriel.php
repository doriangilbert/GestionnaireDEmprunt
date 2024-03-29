<?php include('../view/navbar.php');

if (!isset($_SESSION))
    session_start();

?>

<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Matériel - GestionnaireDEmprunt</title>
    <link rel="stylesheet" href="../../ressources/styles/style.css">
    <link href="../../ressources/styles/bootstrap.min.css" rel="stylesheet">
</head>

<body class="h-100 text-black">

<div class="d-flex justify-content-center align-items-center h-100 flex-column">
    <h1 class="mb-5">Ajouter un matériel</h1>
    <form method="post" action="../controller/ajoutMaterielController.php">
        <div class="row mb-3 align-items-center">
            <label for="inputNom" class="form-label col m-0">Nom :</label>
            <input type="text" class="form-control col" id="inputNom" name="inputNom" placeholder="Samsung S10" maxlength="30" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputVersion" class="form-label col m-0">Version :</label>
            <input type="text" class="form-control col" id="inputVersion" name="inputVersion" placeholder="8.0" minlength="3" maxlength="15" pattern="[0-9]+(\.[0-9]+)+" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputType" class="form-label col m-0">Type :</label>
            <select class="form-select col" id="inputType" name="inputType" required>
                <option value="1">Ordinateur</option>
                <option value="2">Téléphone Android</option>
                <option value="3">Téléphone Apple</option>
                <option value="4">Tablette Android</option>
                <option value="5">Tablette Apple</option>
            </select>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputReference" class="form-label col m-0">Référence :</label>
            <input type="text" class="form-control col" id="inputReference" name="inputReference" placeholder="001" minlength="3" maxlength="3" pattern="[0-9]{3}" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputNumTel" class="form-label col m-0">Numéro de téléphone :</label>
            <input type="tel" class="form-control col" id="inputNumTel" name="inputNumTel" placeholder="XXXXXXXXXX" minlength="10" maxlength="10" pattern="^0[1-9]([0-9]{2}){4}$" disabled>
            <script>
                document.getElementById('inputType').addEventListener('change', function() {
                    if (this.value != 2 && this.value != 3) {
                        document.getElementById('inputNumTel').disabled = true;
                    } else {
                        document.getElementById('inputNumTel').disabled = false;
                    }
                });
            </script>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputPhoto" class="form-label col m-0">Photo :</label>
            <input type="file" class="form-control col" id="inputPhoto" name="inputPhoto" accept=".png, .jpg, .jpeg, .svg">
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-4">Valider</button>
    </form>
    <?php
    if (isset($_SESSION["validate_message"])){
        echo "<p style='color: blue;'> Materiel ajouté avec succès ";
        unset($_SESSION["validate_message"]);
    }

    ?>
</div>

<?php include('../view/footer.php'); ?>

</body>

</html>

<?php

if (isset($_SESSION['alert_message'])) {
    $alert_message = $_SESSION['alert_message'];
    echo "<script>alert('$alert_message')</script>";
    unset($_SESSION['alert_message']);
}

?>