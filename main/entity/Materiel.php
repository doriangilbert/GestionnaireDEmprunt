<?php

session_start();
require_once("../entity/BD_Link.php");
class Materiel
{
    private $reference;
    private $nom;
    private $version;
    private $stockage;
    private $photo;
    private $cpu_nbr_coeur;
    private $cpu_frequence;
    private $ecran_frequence;
    private $ecran_taille;
    private $ram_frequence;
    private $ram_memoire;

    public function __construct()
    {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 11:
                self::__constructCreate($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7], $argv[8], $argv[9], $argv[10]);
                break;
            case 3:
                self::__constructGet($argv[0], $argv[1], $argv[2]);
                break;
        }
    }

    public function __constructCreate($reference, $nom, $version, $stockage, $photo, $cpu_nbr_coeur, $cpu_frequence, $ecran_frequence, $ecran_taille, $ram_frequence, $ram_memoire)
    {
        $this->reference = $reference;
        $this->nom = $nom;
        $this->version = $version;
        $this->stockage = $stockage;
        $this->photo = $photo;
        $this->cpu_nbr_coeur = $cpu_nbr_coeur;
        $this->cpu_frequence = $cpu_frequence;
        $this->ecran_frequence = $ecran_frequence;
        $this->ecran_taille = $ecran_taille;
        $this->ram_memoire = $ram_memoire;
        $this->ram_frequence = $ram_frequence;
        /*mysqli_query(BD_Link::connexion(), "INSERT INTO numero_telephone (indicatif, numero) VALUES ('+33', '$numTel')") or die("Erreur BD : Insert numéro de téléphone");
        $result = mysqli_query(BD_Link::connexion(), "SELECT id_numero_telephone FROM numero_telephone ORDER BY id_numero_telephone DESC LIMIT 1") or die("Erreur BD : Select numéro de téléphone");
        $ligne_result = mysqli_fetch_assoc($result);
        $idNumTel = $ligne_result['id_numero_telephone'];*/
        mysqli_query(BD_Link::connexion(), "INSERT INTO materiel(Reference, Nom, Photo, CPU_nombre_coeurs, CPU_frequence, Ecran_frequence, Ecran_taille, RAM_frequence, RAM_memoire, Stockage, `Version`) 
                        VALUES ('$reference','$nom','$photo','$cpu_nbr_coeur','$cpu_frequence','$ecran_frequence','$ecran_taille','$ram_frequence','$ram_memoire','$stockage','$version')") or die ("Erreur BD : Insert materiel");
    }

    public function __constructGet($reference)
    {
        $this->reference = $reference;
        $result = mysqli_query(BD_Link::connexion(), "SELECT * FROM materiel WHERE Reference = '$reference'") or die("Erreur BD : Select utilisateur");
        $ligne_result = mysqli_fetch_assoc($result);
        $this->nom = $ligne_result['Nom'];
        $this->version = $ligne_result['Version'];
        $this->stockage = $ligne_result['Stockage'];
        $this->ecran_frequence = $ligne_result['Ecran_frequence'];
        $this->ecran_taille = $ligne_result['Ecran_taille'];
        $this->cpu_frequence = $ligne_result['CPU_frequence'];
        $this->cpu_nbr_coeur = $ligne_result['CPU_nombre_coeurs'];
        $this->ram_frequence = $ligne_result['RAM_frequence'];
        $this->ram_memoire = $ligne_result['RAM_memoire'];
        $this->photo = $ligne_result['Photo'];
    }

    public function connexion()
    {
        $_SESSION['matricule'] = $this->matricule;
        $_SESSION['nom'] = $this->nom;
        $_SESSION['prenom'] = $this->prenom;
        $_SESSION['email'] = $this->email;
        $_SESSION['numTel'] = $this->numTel;
        $_SESSION['admin'] = $this->admin;
    }

}

?>