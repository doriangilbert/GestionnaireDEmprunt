<?php

class userController
{
    public function getAllUser()
    {
        require_once("../entity/BD_Link.php");

        $sql = "SELECT * FROM utilisateur LEFT JOIN numero_telephone ON utilisateur.Id_Numero_Telephone = numero_telephone.Id_Numero_Telephone;";
        return BD_Link::connexion()->query($sql);
    }

    public function getById($matricule)
    {
        require_once("../entity/BD_Link.php");
        $sql = "SELECT * FROM utilisateur LEFT JOIN numero_telephone ON utilisateur.Id_Numero_Telephone = numero_telephone.Id_Numero_Telephone WHERE Matricule=" . $matricule . ";";
        return BD_Link::connexion()->query($sql);
    }

    public function updateUser($matriucle, $nom, $prenom, $email, $tel, $password, $admin)
    {
        require_once("../entity/BD_Link.php");
        $user = $this->getById($matriucle)->fetch_assoc();
        $tel = substr($tel, 1);
        var_dump($tel);
        if ($user["Numero"] != '') {
            if ($tel == '') {
                $sql = "UPDATE utilisateur SET Id_Numero_Telephone = null WHERE Matricule = '$matriucle'";
                BD_Link::connexion()->query($sql);
                $sql = "DELETE FROM numero_telephone WHERE Id_Numero_Telephone = " . $user["Id_Numero_Telephone"];
                BD_Link::connexion()->query($sql);
            }
            else if ($user["Numero"] != $tel) {
                $sql = "UPDATE numero_telephone SET Numero = " . $tel . " WHERE Id_Numero_Telephone = " . $user["Id_Numero_Telephone"];
                BD_Link::connexion()->query($sql);
            }
        }
        else {
            if ($tel != '') {
                mysqli_query(BD_Link::connexion(), "INSERT INTO numero_telephone (indicatif, numero) VALUES ('+33', '$tel')");
                $result = mysqli_query(BD_Link::connexion(), "SELECT id_numero_telephone FROM numero_telephone ORDER BY id_numero_telephone DESC LIMIT 1");
                $ligne_result = mysqli_fetch_assoc($result);
                $idNumTel = $ligne_result['id_numero_telephone'];

                $sql = "UPDATE utilisateur SET Id_Numero_Telephone = '$idNumTel' WHERE Matricule = '$matriucle'";
                BD_Link::connexion()->query($sql);
            }
        }
        if ($admin != null) {
            $admin = $admin == 'on' ? 1 : 0;
            $sql = "UPDATE utilisateur SET Admin = ".$admin." WHERE Matricule = '".$matriucle."'";
            BD_Link::connexion()->query($sql);
        }
        if (!empty($password)){
            $sql = "UPDATE utilisateur SET Password = ".$password." WHERE Matricule = ".$matriucle;
            BD_Link::connexion()->query($sql);
        }
        $sql = "UPDATE utilisateur SET Nom = '".$nom."', Prenom = '".$prenom."', Email = '".$email."' WHERE Matricule = '".$matriucle."'";
        BD_Link::connexion()->query($sql);
    }

    public function deleteUser($matricule)
    {
        require_once("../entity/BD_Link.php");
        $result = mysqli_query(BD_Link::connexion(), "SELECT * FROM emprunte WHERE matricule = '$matricule'");
        if (mysqli_num_rows($result) >= 1){
            $_SESSION['alert_message'] = "L’utilisateur en question n’a pas rendu tout le matériel informatique";
            return 1;
        }
        else{
            $sql = "DELETE FROM utilisateur WHERE Matricule=" . $matricule . ";";
            $_SESSION['alert_message'] = "L’utilisateur a bien été supprimé";
            return BD_Link::connexion()->query($sql);
        }

    }
}

?>