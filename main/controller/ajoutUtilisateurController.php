<?php

require_once("../entity/Utilisateur.php");

$nom = $_POST['inputNom'];
$prenom = $_POST['inputPrenom'];
$email = $_POST['inputEmail'];
$matricule = $_POST['inputMatricule'];
$numTel = substr($_POST['inputNumTel'], 1);
$password = $_POST['inputMotDePasse'];
$admin = $_POST['inputAdministrateur'];
if ($admin == "on") {
    $admin = 1;
} else {
    $admin = 0;
}

try {
    $utilisateur = new Utilisateur($matricule, $nom, $prenom, $email, $password, $numTel, $admin);
} catch (Exception $e) {
    $_SESSION['alert_message'] = $e->getMessage();
    header('Location: ../view/userAdd.php');
    exit();
}

$_SESSION['alert_message'] = "Utilisateur ajouté avec succès";

header('Location: ../view/showUser.php');

?>
