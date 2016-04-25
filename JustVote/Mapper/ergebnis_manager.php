<?php
require_once("manager.php");
require_once("ergebnis.php");

class ergebnis_manager extends manager
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

    public function inputresult ($voting_id, $ergebnis)
    {

        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO ergebnis
                (voting_id, ergebnis)
              VALUES
                (:voting_id, :ergebnis)
            ');
            $stmt->bindParam(':voting_id', $voting_id);
            $stmt->bindParam(':ergebnis', $ergebnis);


            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return true;
    }



    public function findByErgebnis($votingid, $ergebnis)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM ergebnis WHERE voting_id = :votingid');
            $stmt->bindParam(':votingid', $votingid);
            $stmt->bindParam(':ergebnis', $ergebnis);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'ergebnis');
            $ergebnisse = $stmt->fetchAll();

            return $ergebnisse;

        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }

}
    ?>