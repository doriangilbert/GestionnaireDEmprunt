<?php

if (!isset($_SESSION))
    session_start();

$Reference = "";

if (isset($_GET["ref"])) {

    $Reference = $_GET["ref"];
    $Type = trim($Reference, "0123456789");
    require_once("../entity/BD_Link.php");

    switch ($Type) {
        case "XX":
            $sql = "DELETE FROM ordinateur WHERE Reference='$Reference'";
            BD_Link::connexion()->query($sql);
            break;
        case "AN":
            $sql = "DELETE FROM telephone WHERE Reference='$Reference'";
            BD_Link::connexion()->query($sql);
            $sql = "DELETE FROM tablette WHERE Reference='$Reference'";
            BD_Link::connexion()->query($sql);
            break;
        case "AP":
            $sql = "DELETE FROM telephone WHERE Reference='$Reference'";
            BD_Link::connexion()->query($sql);
            $sql = "DELETE FROM tablette WHERE Reference='$Reference'";
            BD_Link::connexion()->query($sql);
            break;
    }
    $sql = "DELETE FROM materiel WHERE Reference='$Reference'";
    BD_Link::connexion()->query($sql);

    $_SESSION['alert_message']="Le matériel a bien été supprimé";

}

header("location: ../view/showHardware.php");
exit;

?>