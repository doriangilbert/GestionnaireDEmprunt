<?php

if (!isset($_SESSION))
    session_start();

if (isset($_POST['inputIdentifiant']) && isset($_POST['inputMotDePasse'])) {

    require_once("../entity/BD_Link.php");
    function validate($data)
    {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }

    $identifiant = validate($_POST['inputIdentifiant']);
    $motdepasse = validate($_POST['inputMotDePasse']);


    $sql = "SELECT matricule,email,password,Admin FROM utilisateur WHERE (matricule='$identifiant' OR email='$identifiant') AND password='$motdepasse'";
    $result = mysqli_query(BD_Link::connexion(), $sql);

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        if (($row['email'] === $identifiant || $row['matricule'] === $identifiant) && $row['password'] === $motdepasse) {

            $_SESSION['matricule'] = $row['matricule'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['motdepasse'] = $row['password'];
            $_SESSION['isAdmin'] = $row['Admin'];
            $_SESSION['alert_message'] = "Bienvenue sur notre site. La connexion a bien été établie";

            if ($_SESSION['isAdmin'] == 1) {

                header("Location: ../view/profilAdmin.php");
            } else {
                header("Location: ../view/profilEmprunteur.php");
            }

        } else {
            $_SESSION["login_error"] = 1;
            header("Location: ../view/login.php");
            exit();
        }

    } else {
        $_SESSION["login_error"] = 1;
        header("Location: ../view/login.php");
        exit();
    }

} else {
    header("Location: ../view/login.php");
    exit();
}

?>