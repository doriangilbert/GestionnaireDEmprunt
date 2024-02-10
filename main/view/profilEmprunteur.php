<?php include('../view/navbar.php');

if (!isset($_SESSION))
    session_start();

?>

<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Emprunteur - GestionnaireDEmprunt</title>
    <link rel="stylesheet" href="../../ressources/styles/style.css">
    <link href="../../ressources/styles/bootstrap.min.css" rel="stylesheet">
</head>

<body class="h-100 text-black">

<div class="d-flex justify-content-center align-items-center h-100 flex-column">
    <h1 class="mb-5">Profil emprunteur</h1>
    <h3 class="mb-5">Matricule : <?php echo $_SESSION['matricule']; ?> </h3>
    <a href="../view/consultationEmprunts.php" class="btn btn-primary m-5 p-4">Consulter vos emprunts en cours</a>
    <a href="../view/showHardware.php" class="btn btn-primary m-5 p-4">Faire un nouvel emprunt de matériel</a>
    <a href="../controller/logout.php" class="btn btn-primary m-5 p-4">Se déconnecter</a>
</div>

<?php include('../view/footer.php') ?>

</body>

</html>

<?php

if (isset($_SESSION['alert_message'])) {
    $alert_message = $_SESSION['alert_message'];
    echo "<script>alert('$alert_message')</script>";
    unset($_SESSION['alert_message']);
}

?>