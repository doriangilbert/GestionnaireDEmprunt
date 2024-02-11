<?php include('../view/navbar.php');

if (!isset($_SESSION))
    session_start();
if ($_SESSION['isAdmin'] != 1)
    header("Location: ../view/index.php");
require_once("../controller/userController.php");
$controller = new userController();
$users = $controller->getAllUser();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs - GestionnaireDEmprunt</title>
    <link rel="stylesheet" href="../../ressources/styles/style.css">
    <link href="../../ressources/styles/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../ressources/styles/table.css">
</head>

<body>

<div class="container mt-5 pt-5">
    <h2 class="w-100 text-center mb-3">Consultation des utilisateurs</h2>
    <a class="btn btn-primary float-end mb-3" href="userAdd.php">Nouvel utilisateur</a>
    <table class="table table-hover table-responsive table-bordered border-black">
        <thead>
        <tr class="fw-bold">
            <td>Matricule</td>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Email</td>
            <td>Téléphone</td>
            <td>Administrateur</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($user = $users->fetch_assoc()) {
            $tel = "";
            if (isset($user["Numero"])) {
                $tel = "(" . $user["Indicatif"] . ") " . $user["Numero"];
            }
            $admin = "";
            if ($user["Admin"] == 1)
                $admin = "admin";
            $detailUser = "userDetail.php?matricule=" . $user["Matricule"];
            echo "
                    <tr>
                        <td>" . $user["Matricule"] . "</td>
                        <td>" . $user["Nom"] . "</td>
                        <td>" . $user["Prenom"] . "</td>
                        <td>" . $user["Email"] . "</td>
                        <td>" . $tel . "</td>
                        <td>" . $admin . "</td>
                        <td><a href='" . $detailUser . "'>Détail</a></td>
                    </tr>";
        }
        ?>
        </tbody>
    </table>
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
