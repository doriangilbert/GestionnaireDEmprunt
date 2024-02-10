<?php

if (!isset($_SESSION))
    session_start();

$Reference = "";

if (isset($_GET["ref"])) {

    $Reference = $_GET["ref"];
    require_once("../entity/BD_Link.php");

    $sql = "DELETE FROM materiel WHERE Reference=$Reference";
    BD_Link::connexion()->query($sql);

}

header("location: ../view/showHardware.php");
exit;

?>