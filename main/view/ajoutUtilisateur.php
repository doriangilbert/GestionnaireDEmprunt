<?php include('navbar.php'); ?>
<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionnaireDEmprunt</title>
    <link rel="stylesheet" href="../../ressources/styles/style.css">
    <link href="../../ressources/styles/bootstrap.min.css" rel="stylesheet">
</head>

<body class="h-100 text-black">



<div class="d-flex justify-content-center align-items-center h-100 flex-column">
    <h1 class="mb-5">Ajouter un utilisateur</h1>
    <form method="post" action="">
        <div class="row mb-3 align-items-center">
            <label for="inputNom" class="form-label col m-0">Nom :</label>
            <input type="text" class="form-control col" id="inputNom" name="inputNom" placeholder="Smith" maxlength="30" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputPrenom" class="form-label col m-0">Prenom :</label>
            <input type="text" class="form-control col" id="inputPrenom" name="inputPrenom" placeholder="John" maxlength="30" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputEmail" class="form-label col m-0">Adresse e-mail :</label>
            <input type="email" class="form-control col" id="inputEmail" name="inputEmail" placeholder="john.smith@gmail.com" pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputMatricule" class="form-label col m-0">Matricule :</label>
            <input type="text" class="form-control col" id="inputMatricule" name="inputMatricule" placeholder="XXXXXXX" minlength="7" maxlength="7" pattern="[0-9]{7}" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputNumTel" class="form-label col m-0">Numéro de téléphone :</label>
            <input type="text" class="form-control col" id="inputNumTel" name="inputNumTel" placeholder="XXXXXXXXXX" minlength="10" maxlength="10" pattern="^0[1-9]([-. ]?[0-9]{2}){4}$" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputMotDePasse" class="form-label col m-0">Mot de passe :</label>
            <input type="password" class="form-control col" id="inputMotDePasse" name="inputMotDePasse" placeholder="XXXXX" required>
        </div>
        <div class="row mb-3 align-items-center">
            <label for="inputAdministrateur" class="form-label col m-0">Administrateur ?</label>
            <input type="checkbox" class="form-check col" id="inputAdministrateur">
        </div>
        <h3 style="color=blue;">
<?php
if(isset($_POST['inputNom'])){
include("bd_conn.php");
$Nom = $_POST['inputNom'];
$Prenom = $_POST['inputPrenom'];
$Email = $_POST['inputEmail'];
$Matricule = $_POST['inputMatricule'];
$Telephone = $_POST['inputNumTel'];
$MDP = $_POST['inputMotDePasse'];
$Admin = $_POST['inputAdministrateur'];

$sqlTel = "INSERT INTO numero_telephone(Indicatif,Numero) VALUES ('+33','$Telephone')";
mysqli_query($conn,$sqlTel);
$sqlTelId = "SELECT Id_Numero_Telephone FROM numero_telephone WHERE Numero = '$Telephone' ";
$result = mysqli_query($conn,$sqlTelId);
$row = mysqli_fetch_assoc($result);
$IdTel =$row['Id_Numero_Telephone'];

$sqlUti = "INSERT INTO utilisateur(Matricule,Nom,Prenom,Admin,Email,Password,Id_Numero_Telephone) VALUES ('$Matricule','$Nom','$Prenom',0,'$Email',$MDP,$IdTel)";
mysqli_query($conn,$sqlUti);
echo "Votre Utilistateur est ajouté";
}
?> </h3>

        <button type="submit" class="btn btn-primary w-100 mt-4">Valider</button>
    </form>

</div>

<php? include('footer.php'); ?>

</body>

</html>
