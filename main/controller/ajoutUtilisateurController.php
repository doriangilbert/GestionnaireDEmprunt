<?php

require_once("../entity/Utilisateur.php");

$nom = $_POST['inputNom'];
$prenom = $_POST['inputPrenom'];
$email = $_POST['inputEmail'];
$matricule = $_POST['inputMatricule'];
$numTel = $_POST['inputNumTel'];
$password = $_POST['inputMotDePasse'];
$admin = $_POST['inputAdministrateur'];
if ($admin == "on") {
    $admin = 1;
} else {
    $admin = 0;
}
$utilisateur = new Utilisateur($matricule, $nom, $prenom, $email, $password, $numTel, $admin);

$_SESSION['alert_message'] = "Utilisateur ajouté avec succès";

header('Location: ../view/ajoutUtilisateur.php');

?>
