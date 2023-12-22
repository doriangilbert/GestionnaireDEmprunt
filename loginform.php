<?php

if (isset($_POST['inputIdentifiant']) && isset($_POST['inputMotDePasse'])) {

        session_start();

        include "bd_conn.php";

        function validate($data){

            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;

        }

        $identifiant = validate($_POST['username']);
        $motdepasse = validate($_POST['password']);


        $sql = "SELECT email,password,Admin FROM users WHERE email='$identifiant' AND password='$motdepasse'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $identifiant && $row['password'] === $motdepasse) {

                echo "Logged in!";

                $_SESSION['email'] = $row['email'];

                $_SESSION['motdepasse'] = $row['password'];

                $_SESSION['isAdmin'] = $row['Admin'];

                if ($_SESSION['isAdmin'] === 1){
                    header("Location:profilAdmin.php");
                }
                else{
                    header("Location:profilEmprunteur.php");
                }

                exit();

            }
            else{
                    header("Location:login.php");
                    exit();
            }

        }
        else{
            header("Location:login.php");
            exit();
        }

}
    else {
        header("Location:login.php");
        exit();
    }