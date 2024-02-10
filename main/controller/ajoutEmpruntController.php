<?php

require_once("../entity/Emprunt.php");

session_start();

$reference = $_SESSION['reference'];
$dateDebut = $_POST['dateDebut'];
$dateFin = $_POST['dateFin'];
$matricule = $_SESSION['matricule'];

$dateDebut = date('Y-m-d', strtotime($dateDebut));
$dateFin = date('Y-m-d', strtotime($dateFin));

$emprunt = new Emprunt($reference, $dateDebut, $dateFin, $matricule);

$_SESSION['alert_message'] = "Emprunt ajouté avec succès";

header('Location: ../view/ajoutEmprunt.php');

?>
