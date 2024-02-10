<?php

session_start();
require_once("../entity/BD_Link.php");
class Emprunt
{
    private $reference;
    private $dateDebut;
    private $dateFin;
    private $matricule;

    public function __construct($reference, $dateDebut, $dateFin, $matricule)
    {
        $this->reference = $reference;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->matricule = $matricule;
        mysqli_query(BD_Link::connexion(), "INSERT INTO emprunte (reference, date_debut, date_de_fin, matricule) VALUES ('$this->reference', '$this->dateDebut', '$this->dateFin', '$this->matricule')");
    }
}

?>