<?php 

$Reference="";


if (isset($_GET["ref"]))
{

    $Reference=$_GET["ref"];
    include "bd_conn.php";
    global $conn;

    $sql= "DELETE FROM materiel WHERE Reference=$Reference";
    $conn->query($sql);



}

header("location: showHardware.php");
exit;