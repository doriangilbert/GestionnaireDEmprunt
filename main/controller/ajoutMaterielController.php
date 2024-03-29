<?php

if (isset($_POST['inputNom']) && isset($_POST['inputVersion']) && isset($_POST['inputReference']) && isset($_POST['inputType'])) {
    require_once("../entity/Materiel.php");

    $Reference = $_POST['inputReference'];
    $Nom = $_POST['inputNom'];
    $Version = $_POST['inputVersion'];
    $Type = $_POST['inputType'];
    $Num = $_POST['inputNumTel'];

    try {
        $materiel = new Materiel($Reference, $Nom, $Version, NULL, $Type, $Num);
    } catch (Exception $e) {
        $_SESSION['alert_message'] = $e->getMessage();
        header('Location: ../view/ajoutMateriel.php');
        exit();
    }

    $_SESSION['validate_message'] = 1;

    header('Location: ../view/ajoutMateriel.php');
    exit;
}

?>