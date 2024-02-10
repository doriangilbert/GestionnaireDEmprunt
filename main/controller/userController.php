<?php

class userController
{
    function getAllUser()
    {
        require_once("../entity/BD_Link.php");

        $sql = "SELECT * FROM utilisateur LEFT JOIN numero_telephone ON utilisateur.Id_Numero_Telephone = numero_telephone.Id_Numero_Telephone;";
        return BD_Link::connexion()->query($sql);
    }
}