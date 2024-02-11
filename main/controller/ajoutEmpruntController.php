<?php

require_once("../entity/Emprunt.php");

if (!isset($_SESSION))
    session_start();

$reference = $_SESSION['reference'];
$dateDebut = $_POST['inputDateDebut'];
$dateFin = $_POST['inputDateFin'];
$matricule = $_SESSION['matricule'];

try {
    $emprunt = new Emprunt($reference, $dateDebut, $dateFin, $matricule);
} catch (Exception $e) {
    $_SESSION['alert_message'] = $e->getMessage();
    header('Location: ../view/ajoutEmprunt.php');
    exit();
}

$_SESSION['alert_message'] = "Emprunt ajouté avec succès";

header("Location: ../view/ajoutEmprunt.php?ref=$reference");

?>
