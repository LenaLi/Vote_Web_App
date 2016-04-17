

<?php
require_once("manager.php");
require_once("voting.php");

class voting_manager extends manager
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

    public function findAll(){
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM voting');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'voting');
            return $stmt->fetchAll();


        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return null;
    }

    public function findByVorlesungsId($votingid)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM voting WHERE  votingid= :votingid');
            $stmt->bindParam(':votingid', $votingid);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'voting');
            $voting = $stmt->fetch();

            return $voting;

        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }
    public function findByBenutzerID($votingid)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM voting WHERE votingid = :votingid');
            $stmt->bindParam(':votingid', $votingid);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'voting');
            $votings = $stmt->fetchAll();
            return $votings;
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }


    public function create ($votingid, $vorlesungsid, $votingname, $frage, $antwort_1, $antwort_2, $antwort_3, $antwort_4, $startdatum, $enddatum)
    {

        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO voting
                (vorlesungsid, votingid, votingname, frage, antwort_1, antwort_2, antwort_3, antwort_4, startdatum, enddatum)
              VALUES
                (:vorlesungsid, :votingid, :votingname,:frage, :antwort_1, :antwort_2, :antwort_3, :antwort_4, :startdatum, :enddatum)
            ');
            $stmt->bindParam(':vorlesungsid', $vorlesungsid);
            $stmt->bindParam(':votingid', $votingid);
            $stmt->bindParam(':votingname', $votingname);
            $stmt->bindParam(':frage', $frage);
            $stmt->bindParam(':antwort_1', $antwort_1);
            $stmt->bindParam(':antwort_2', $antwort_2);
            $stmt->bindParam(':antwort_3', $antwort_3);
            $stmt->bindParam(':antwort_4', $antwort_4);
            $stmt->bindParam(':startdatum', $startdatum);
            $stmt->bindParam(':enddatum', $enddatum);

            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return true;
    }

    /*public function update($votingid,)
    {
        try {
            $stmt = $this->pdo->prepare('
              UPDATE voting
              SET vorlesungsname = :vorlesungsname
              WHERE votingid = :votingid
            ');
            $stmt->bindParam(':vorlesungsid', $vorlesungsid);
            $stmt->bindParam(':votingid', $votingid);
            $stmt->bindParam(':votingname', $votingname);
            $stmt->bindParam(':frage', $frage);
            $stmt->bindParam(':antwort_1', $antwort_1);
            $stmt->bindParam(':antwort_2', $antwort_2);
            $stmt->bindParam(':antwort_3', $antwort_3);
            $stmt->bindParam(':antwort_4', $antwort_4);
            $stmt->bindParam(':startdatum', $startdatum);
            $stmt->bindParam(':enddatum', $enddatum);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }
*/

    public function delete($votingid)
    {
        try {
            $stmt = $this->pdo->prepare('
              DELETE FROM voting WHERE votingid= :votingid
            ');
            $stmt->bindParam(':votingid', $votingid);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return null;
    }
}