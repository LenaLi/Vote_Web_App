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

    public function create(benutzer $benutzer)
    {
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO benutzer
                (login, vorname, nachname, hash)
              VALUES
                (:login, :vorname , :nachname, :hash)
            ');
            $stmt->bindParam(':login', $benutzer->login);
            $stmt->bindParam(':vorname', $benutzer->vorname);
            $stmt->bindParam(':nachname', $benutzer->nachname);
            $stmt->bindParam(':hash', $benutzer->hash);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return $benutzer;
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