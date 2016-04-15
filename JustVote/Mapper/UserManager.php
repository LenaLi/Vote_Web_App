<?php

require_once("Manager.php");
require_once("User.php");

class UserManager extends Manager
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
            $stmt = $this->pdo->prepare('SELECT * FROM user WHERE login = :login');
            $stmt->bindParam(':login', $login);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();

            if (password_verify($password, $user->hash)) {
                return $user;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return null;
    }

    public function create(User $user)
    {
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO user
                (login, vorname, nachname, hash)
              VALUES
                (:login, :vorname , :nachname, :hash)
            ');
            $stmt->bindParam(':login', $user->login);
            $stmt->bindParam(':vorname', $user->vorname);
            $stmt->bindParam(':nachname', $user->nachname);
            $stmt->bindParam(':hash', $user->hash);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return $user;
    }

    private function update(User $user)
    {
        try {
            $stmt = $this->pdo->prepare('
              UPDATE user
              SET vorname = :vorname,
                  nachname = :nachname,
                  hash = :hash
              WHERE login = :login
            ');
            $stmt->bindParam(':vorname', $user->vorname);
            $stmt->bindParam(':nachname', $user->nachname);
            $stmt->bindParam(':hash', $user->hash);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $user;
    }

    public function delete(User $user)
    {
        try {
            $stmt = $this->pdo->prepare('
              DELETE FROM user WHERE login= :login
            ');
            $stmt->bindParam(':login', $user->login);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return $user;
        }
        return null;
    }
}