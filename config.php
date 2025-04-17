<?php
class config {
    private static $pdo = null;

    public static function getConnexion() {
        if (self::$pdo === null) {
            try {
                $servername = "localhost";
                $dbname = "test";          // ✔ Le nom de ta base de données
                $username = "root";        // ✔ Nom d'utilisateur par défaut
                $password = "";            // ✔ Mot de passe par défaut vide sous XAMPP

                self::$pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erreur de connexion : ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>
