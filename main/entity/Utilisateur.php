<?php

if (!isset($_SESSION))
    session_start();
require_once("../entity/BD_Link.php");
class Utilisateur
{
    private $matricule;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $numTel;
    private $admin;

    public function __construct()
    {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 7:
                self::__constructCreate($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6]);
                break;
            case 2:
                self::__constructGet($argv[0], $argv[1]);
                break;
        }
    }

    public function __constructCreate($matricule, $nom, $prenom, $email, $password, $numTel, $admin)
    {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->numTel = $numTel;
        $this->admin = $admin;

        $result = mysqli_query(BD_Link::connexion(), "SELECT * FROM utilisateur WHERE matricule = '$matricule' OR email = '$email'") or die("Erreur BD : Select utilisateur");
        $ligne_result = mysqli_fetch_assoc($result);
        if ($ligne_result != NULL) {
            throw new Exception("Matricule ou email déjà utilisé");
        }

        mysqli_query(BD_Link::connexion(), "INSERT INTO numero_telephone (indicatif, numero) VALUES ('+33', '$numTel')") or die("Erreur BD : Insert numéro de téléphone");
        $result = mysqli_query(BD_Link::connexion(), "SELECT id_numero_telephone FROM numero_telephone ORDER BY id_numero_telephone DESC LIMIT 1") or die("Erreur BD : Select numéro de téléphone");
        $ligne_result = mysqli_fetch_assoc($result);
        $idNumTel = $ligne_result['id_numero_telephone'];
        mysqli_query(BD_Link::connexion(), "INSERT INTO utilisateur (matricule, nom, prenom, email, password, id_numero_telephone, admin) VALUES ('$matricule', '$nom', '$prenom', '$email', '$password', '$idNumTel', '$admin')") or die ("Erreur BD : Insert utilisateur");
    }

    public function __constructGet($matricule, $password)
    {
        $this->matricule = $matricule;
        $this->password = $password;
        $result = mysqli_query(BD_Link::connexion(), "SELECT * FROM utilisateur WHERE matricule = '$matricule' AND password = '$password'") or die("Erreur BD : Select utilisateur");
        $ligne_result = mysqli_fetch_assoc($result);
        $this->nom = $ligne_result['nom'];
        $this->prenom = $ligne_result['prenom'];
        $this->email = $ligne_result['email'];
        $idNumTel = $ligne_result['id_numero_telephone'];
        $result = mysqli_query(BD_Link::connexion(), "SELECT numero FROM numero_telephone WHERE id_numero_telephone = '$idNumTel'") or die("Erreur BD : Select numéro de téléphone");
        $ligne_result = mysqli_fetch_assoc($result);
        $this->numTel = $ligne_result['numero'];
        $this->admin = $ligne_result['admin'];
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

    public function deconnexion()
    {
        session_destroy();
    }

}

?>
