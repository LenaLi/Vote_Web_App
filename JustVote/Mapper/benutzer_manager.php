<?php
require_once("manager.php");
require_once("user.php");

class benutzer_manager extends manager
{
    protected $pdo;

    public function __construct($connection = null)
    {
        parent::__construct($connection);
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    public function findByLogin($login, $password)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM USER WHERE login = :login');
            $stmt->bindParam(':login', $login);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'benutzer');
            $benutzer = $stmt->fetch();

            if (password_verify($password, $benutzer->hash)) {
                return $benutzer;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return null;
    }

    public function create($name,$email,$role)
    {
        $salt=""; // benötigt für Hashfunktion
        $password="Standardpassword/Hash"; // TODO: hier muss Funktion der Passworterzeugung und Hash


        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO benutzer
                (name, email, role, password, salt)
              VALUES
                (:name, :email , :role, :password, :salt)
            ');
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(":salt", $salt);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
           // return null;
        }
    }

    private function update(benutzer $benutzer)
    {
        try {
            $stmt = $this->pdo->prepare('
              UPDATE benutzer
              SET vorname = :vorname,
                  nachname = :nachname,
                  hash = :hash
              WHERE login = :login
            ');
            $stmt->bindParam(':vorname', $benutzer->vorname);
            $stmt->bindParam(':nachname', $benutzer->nachname);
            $stmt->bindParam(':hash', $benutzer->hash);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $benutzer;
    }

    public function delete(benutzer $benutzer)
    {
        try {
            $stmt = $this->pdo->prepare('
              DELETE FROM benutzer WHERE login= :login
            ');
            $stmt->bindParam(':login', $benutzer->login);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return $benutzer;
        }
        return null;
    }
}