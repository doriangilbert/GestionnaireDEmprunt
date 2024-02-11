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

        if ($dateDebut > $dateFin) {
            throw new Exception("La date de fin doit être postérieure à la date de début");
        }

        $result = mysqli_query(BD_Link::connexion(), "SELECT * FROM emprunte WHERE reference = '$reference'") or die("Erreur BD : Select emprunt");
        while ($ligne_result = mysqli_fetch_assoc($result)) {
            if (($dateDebut >= $ligne_result['Date_debut'] && $dateDebut <= $ligne_result['Date_de_fin']) || ($dateFin >= $ligne_result['Date_debut'] && $dateFin <= $ligne_result['Date_de_fin'])) {
                throw new Exception("Un emprunt est déjà en cours pour ce matériel");
            }
        }

        mysqli_query(BD_Link::connexion(), "INSERT INTO emprunte (reference, date_debut, date_de_fin, matricule) VALUES ('$this->reference', '$this->dateDebut', '$this->dateFin', '$this->matricule')") or die("Erreur BD : Insert emprunt");
    }
}

?>