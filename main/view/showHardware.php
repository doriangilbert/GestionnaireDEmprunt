<?php include('../view/navbar.php');

if (!isset($_SESSION))
    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matériels - GestionnaireDEmprunt</title>
    <link rel="stylesheet" href="../../ressources/styles/style.css">
    <link href="../../ressources/styles/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../ressources/styles/table.css">
</head>

<body>

<div class="container mt-5 pt-5">
    <h2 class="w-100 text-center mb-3">Consultation des matériels informatique</h2>
    <?php if  ($_SESSION['isAdmin']==1){
    echo "<a class='btn btn-primary float-end mb-3' href='ajoutMateriel.php'> Nouveau matériel</a>";
    }
    ?>
    <br>
    <table class="table table-hover table-responsive table-bordered border-black">
        <thead>
        <tr>
            <?php 
            if ($_SESSION['isAdmin']==1)
            {
                echo "
                <th scope='col'>Référence</th>
                <th scope='col'>Nom</th>
                <th scope='col'>Version</th>
                <th scope='col'>Emprunt</th>
                <th scope='col'>Edition</th>
                ";
            }
            else
            {
                echo "
                <th scope='col'>Référence</th>
                <th scope='col'>Nom</th>
                <th scope='col'>Version</th>
                <th scope='col'>Emprunt</th>
                ";
            }
            ?>
            
        </tr>
        </thead>
        <tbody>
            <?php 
            require_once("../entity/BD_Link.php");
            
            $req = "SELECT * FROM materiel";
            $resultat = BD_Link::connexion()->query($req);

            while($row= $resultat->fetch_assoc())
            {
            
                if ($_SESSION['isAdmin']==1)
                {
                    echo"<tr>
                        <th scope='row'>$row[Reference]</th>
                        <td>$row[Nom]</td>
                        <td>$row[Version]</td>
                        <td>
                            <a class='btn btn-info btn-sm' href='ajoutEmprunt.php?ref=$row[Reference]'>Emprunter</a>
                        </td>
                        <td>
                            <a class='btn btn-info btn-sm' href='gestionMateriel.php?ref=$row[Reference]'>Edit</a>
                        </td>
                        </tr>";
                }
                else
                {
                    echo"<tr>
                        <th scope='row'>$row[Reference]</th>
                        <td>$row[Nom]</td>
                        <td>$row[Version]</td>
                        <td>
                            <a class='btn btn-info btn-sm' href='ajoutEmprunt.php?ref=$row[Reference]'>Emprunter</a>
                        </td>
                        </tr>";
                }
            }
        
            ?>
        </tbody>
    </table>
    <!--
    <div class="custom-table">
        <div class="row custom-table-head">
            <div class="col-3 ps-3 h-100"><h3 class="h5 mb-0 fw-bold">Référence</h3></div>
            <div class="col-3 ps-3"><h3 class="h5 mb-0 fw-bold">Nom</h3></div>
            <div class="col-3 ps-3"><h3 class="h5 mb-0 fw-bold">Version</h3></div>
            <div class="col-3 ps-3"><h3 class="h5 mb-0 fw-bold">Statut</h3></div>
        </div>
        <a class="row">
            <div class="col-3 ps-3"><p class="mb-0 fw-bold">XX000</p></div>
            <div class="col-3 ps-3"><p class="mb-0">ordkuheyfozieofgjraegpi</p></div>
            <div class="col-3 ps-3"><p class="mb-0">euuuuh</p></div>
            <div class="col-3 ps-3"><p class="mb-0">Statut</p></div>
        </a>
        <a class="row">
            <div class="col-3 ps-3"><p class="mb-0 fw-bold">XX000</p></div>
            <div class="col-3 ps-3"><p class="mb-0">ordi</p></div>
            <div class="col-3 ps-3"><p class="mb-0">euuuuh</p></div>
            <div class="col-3 ps-3"><p class="mb-0">Statut</p></div>
        </a>
    </div>-->
</div>

<?php

if (isset($_SESSION['alert_message'])) {
    $alert_message = $_SESSION['alert_message'];
    echo "<script>alert('$alert_message')</script>";
    unset($_SESSION['alert_message']);
}
?>

<?php include('../view/footer.php') ?>

</body>

</html>
