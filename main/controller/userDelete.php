<?php

if (!isset($_SESSION))
    session_start();
if ($_SESSION['isAdmin'] != 1)
    header("Location: ../view/index.php");

$matricule = $_GET["matricule"];

require_once("../controller/userController.php");
$controller = new userController();
$controller->deleteUser($matricule);

header("Location: ../view/showUser.php");

?>