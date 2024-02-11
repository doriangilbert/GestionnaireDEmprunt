<?php include('../view/navbar.php');

if (!isset($_SESSION))
    session_start();
require_once("../controller/borrowingController.php");
$controller = new borrowingController();

if ($_SESSION['isAdmin'] != 1) {
    $borrowings = $controller->getAllBorrowingById($_SESSION['matricule']);
} else {
    $borrowings = $controller->getAllBorrowing();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprunts - GestionnaireDEmprunt</title>
    <link rel="stylesheet" href="../../ressources/styles/style.css">
    <link href="../../ressources/styles/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../ressources/styles/table.css">
</head>

<body>

<div class="container mt-5 pt-5">
    <h2 class="w-100 text-center mb-3">Consultation des emprunts</h2>
    <table class="table table-hover table-responsive table-bordered border-black">
        <thead>
        <tr class="fw-bold">
            <td>Référence</td>
            <td>Date de début</td>
            <td>Date de fin</td>
            <td>Matricule</td>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($borrowing = $borrowings->fetch_assoc()) {
            echo "
                    <tr>
                        <td>" . $borrowing["Reference"] . "</td>
                        <td>" . $borrowing["Date_debut"] . "</td>
                        <td>" . $borrowing["Date_de_fin"] . "</td>
                        <td>" . $borrowing["Matricule"] . "</td>
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
