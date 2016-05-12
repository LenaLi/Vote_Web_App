<?php
require_once("manager.php");
require_once("auswertung.php");

class auswertung_manager extends manager
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


    //einen neuen Eintrag in die Tabelle auswertung schreiben
    public function create ($frageID, $antwortID, $voting_id){
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO auswertung
                (frageID, antwortID, voting_id)
              VALUES
                (:frageID, :antwortID, :voting_id)
            ');
            $stmt->bindParam(':frageID', $frageID);
            $stmt->bindParam(':antwortID', $antwortID);
            $stmt->bindParam(':voting_id', $voting_id);
            $stmt->execute();


        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
            return false;
        }
        return true;
    }

    public function countTeilnehmer($votingid)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT COUNT(*) as Anzahl FROM ergebnis WHERE voting_id = :votingid');
            $stmt->bindParam(':votingid', $votingid);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'ergebnis');
            $ergebnis = $stmt->fetchAll();

            return $ergebnis;

        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }
}