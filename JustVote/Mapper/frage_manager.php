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
            $stmt->setFetchMode(PDO::FETCH_ASSOC); //alles in array, kommt in array zurück nicht in objektform
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
                $stmt->setFetchMode(PDO::FETCH_ASSOC); //alles in array, kommt in arry zurück nicht in objektform
                $result = $stmt->fetch();

                return $result;

            } catch (PDOException $e) {
                echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
                die();
            }

        }*/
    }
}
?>