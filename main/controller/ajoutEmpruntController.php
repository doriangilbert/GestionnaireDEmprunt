<?php

require_once("../entity/Emprunt.php");

if (!isset($_SESSION))
    session_start();

$reference = $_SESSION['reference'];
$dateDebut = $_POST['inputDateDebut'];
$dateFin = $_POST['inputDateFin'];
$matricule = $_SESSION['matricule'];

$emprunt = new Emprunt($reference, $dateDebut, $dateFin, $matricule);

$_SESSION['alert_message'] = "Emprunt ajouté avec succès";

header('Location: ../view/ajoutEmprunt.php');

?>
