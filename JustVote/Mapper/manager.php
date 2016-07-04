<?php

require_once("Userdata.php");

// Verbindung zur Datenbank wird hergestellt

class manager
{
    protected $pdo;

    public function __construct($connection = null)
    {
        try {
            $this->pdo = $connection;
            if ($this->pdo === null) {
                $this->pdo = new PDO(
                    UserData::$dsn,
                    UserData::$dbuser,
                    UserData::$dbpass
                );

            }
            // Bei SQL Fehler Exception Handling (Fehlerbehandlung) aktivieren
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }

    public function __destruct()
    {
        $this->pdo = null;
    }
}

?>