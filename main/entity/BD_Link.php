<?php

class BD_Link
{
    private static $conn;
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "root";
    private static $db_name= "db_gestemprunt";

    public static function connexion() {
        if(!self::$conn)
        {
            self::$conn=mysqli_connect(self::$servername , self::$username , self::$password, self::$db_name) or die("Erreur BD : Connexion");
        }
        return self::$conn;
    }
}

?>
