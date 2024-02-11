<?php

class borrowingController
{
    public function getAllBorrowing()
    {
        require_once("../entity/BD_Link.php");

        $sql = "SELECT * FROM emprunte;";
        return BD_Link::connexion()->query($sql);
    }
}

?>