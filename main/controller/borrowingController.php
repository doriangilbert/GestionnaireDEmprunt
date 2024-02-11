<?php

class borrowingController
{
    public function getAllBorrowing()
    {
        require_once("../entity/BD_Link.php");

        $sql = "SELECT * FROM emprunte;";
        return BD_Link::connexion()->query($sql);
    }

    public function getAllBorrowingById($matricule)
    {
        require_once("../entity/BD_Link.php");

        $sql = "SELECT * FROM emprunte WHERE Matricule=" . $matricule . ";";
        return BD_Link::connexion()->query($sql);
    }
}

?>