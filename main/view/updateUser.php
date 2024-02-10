<?php
if (!isset($_SESSION))
    session_start();

require_once("../controller/userController.php");
$controller = new userController();
if (isset($_POST["inputAdministrateur"]))
    $controller->updateUser($_POST["inputMatricule"], $_POST["inputNom"], $_POST["inputPrenom"], $_POST["inputEmail"], $_POST["inputNumTel"], $_POST["inputMotDePasse"], $_POST["inputAdministrateur"]);

else
    $controller->updateUser($_POST["inputMatricule"], $_POST["inputNom"], $_POST["inputPrenom"], $_POST["inputEmail"], $_POST["inputNumTel"], $_POST["inputMotDePasse"], null);
if ($_SESSION['isAdmin'] == 1)
    header("Location:showUser.php");
else
    header("Location:profilEmprunteur.php");