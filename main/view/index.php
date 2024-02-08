<?php include('navbar.php') ?>
<!-- GestionnaireDEmprunt -->
<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionnaireDEmprunt</title>
    <link rel="stylesheet" href="../../ressources/styles/style.css">
    <link href="../../ressources/styles/bootstrap.min.css" rel="stylesheet">
    <script src="../controller/main.js"></script>
</head>

<body class="h-100 text-black">



<div class="d-flex justify-content-center align-items-center h-100 flex-column">
    <h1>Gestionnaire d'emprunts</h1>
    <p class="text-center mb-5">Bienvenue sur le gestionnaire d'emprunts</p>
    <a href="index.php" class="btn btn-primary border-white p-4 fw-bold">Commencer</a>
    <div id="display_status" class="test rounded-circle"></div>
</div>

<?php include('footer.php') ?>

</body>

</html>