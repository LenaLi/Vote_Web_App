<?php
require_once("manager.php");


class frage_manager extends manager
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


    /*public function getbyFrageID($frageID)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM frage WHERE frageID = :frageID');
            $stmt->bindParam(':frageID', $frageID);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'voting');
            $frage = $stmt->fetch();

            return $frage;

        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }*/


    //DB-Abfrage: holt die zur votingid dazugehoerige Frage aus der DB
    public function getFragebyVotingid($voting_id)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM frage WHERE voting_id = :voting_id');
            $stmt->bindParam(':voting_id', $voting_id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC); //alles in array, kommt in array zur�ck nicht in objektform
            $result = $stmt->fetch();

            return $result;

        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

      /*  public function getFragefromFrageTabelle($text)
        {
            try {
                $stmt = $this->pdo->prepare('SELECT * FROM frage WHERE text = :text');
                $stmt->bindParam(':text', $text);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC); //alles in array, kommt in arry zur�ck nicht in objektform
                $result = $stmt->fetch();

                return $result;

            } catch (PDOException $e) {
                echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
                die();
            }

        }*/
    }
    public function create ($voting_id, $text)
    {
        // Füge neue Antwort in Tabelle Antwort der Datenbank hinzu (Attribute siehe unten)
        try {
            $stmt = $this->pdo->prepare('
                  INSERT INTO frage
                    (voting_id, text)
                  VALUES
                    (:voting_id, :text)
                ');
            $stmt->bindParam(':voting_id', $voting_id);
            $stmt->bindParam(':text', $text);

            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return true;
    }

    public function update($ID, $voting_id, $text)
    {
        // Updaten eines zu einer bestimmten FrageId gehörenden Antwort (Attribute siehe unten)
        try {
            $stmt = $this->pdo->prepare('
                  UPDATE frage
                  SET voting_id = :voting_id, text = :text
                  WHERE ID = :ID
                ');
            $stmt->bindParam(':ID', $ID);
            $stmt->bindParam(':voting_id', $voting_id);
            $stmt->bindParam(':text', $text);

            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }

}
?>