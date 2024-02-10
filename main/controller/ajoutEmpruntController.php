<?php

require_once("../entity/Emprunt.php");

session_start();

$reference = $_POST['reference'];
$dateDebut = $_POST['dateDebut'];
$dateFin = $_POST['dateFin'];
$matricule = $_SESSION['matricule'];

$emprunt = new Emprunt($reference, $dateDebut, $dateFin, $matricule);

$_SESSION['alert_message'] = "Emprunt ajouté avec succès";

header('Location: ../view/ajoutEmprunt.php');

?>
