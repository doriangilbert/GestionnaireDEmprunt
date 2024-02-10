<?php include('../view/navbar.php');
if (!isset($_SESSION))
    session_start();
$_SESSION['reference'] = $_GET['ref'];
?>
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
    <h5 class="mb-3">Référence : <?php echo $_GET['ref']; ?></h5>
    <h5 class="mb-3">Nom : XXXXXXX</h5>
    <h5 class="mb-3">Version : XXXXXXX</h5>
    <h5 class="mb-3">Numéro de téléphone : XXXXXXXXXX</h5>
    <form method="post" action="../controller/ajoutEmpruntController.php" class="mt-3">
        <div class="row mb-3 align-items-center">
            <label for="inputDateDebut" class="form-label col m-0">Date de début de l'emprunt :</label>
            <input type="date" class="form-control col" id="inputDateDebut" name="inputDateDebut" required>
            <script>
                document.getElementById('inputDateDebut').valueAsDate = new Date();
                document.getElementById('inputDateDebut').min = new Date().toISOString().split('T')[0];
            </script>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputDateFin" class="form-label col m-0">Date de début de l'emprunt :</label>
            <input type="date" class="form-control col" id="inputDateFin" name="inputDateFin" required>
            <script>
                document.getElementById('inputDateFin').min = new Date().toISOString().split('T')[0];
            </script>
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-4">Valider</button>
    </form>
    <div>
        <a href="profilAdmin.php" class="btn btn-primary w-100 mt-4">Annuler</a>
    </div>
</div>

<?php include('../view/footer.php'); ?>

</body>

</html>

<?php

if(isset($_SESSION['alert_message'])){
    $alert_message = $_SESSION['alert_message'];
    echo "<script>alert('$alert_message')</script>";
    unset($_SESSION['alert_message']);
}

?>