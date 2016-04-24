
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

    public function findByVorlesungsId($vorlesungsid)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM voting WHERE  vorlesungsid= :vorlesungsid');
            $stmt->bindParam(':vorlesungsid', $vorlesungsid);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'voting');
            $votings = $stmt->fetchAll();

            return $votings;

        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }

    public function findByVotingId($votingid)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM voting WHERE votingid = :votingid');
            $stmt->bindParam(':votingid', $votingid);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'voting');
            $voting = $stmt->fetchAll();

            return $voting;

        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }

    public function create ($vorlesungsid, $votingname, $frage, $antwort_1, $antwort_2, $antwort_3, $antwort_4, $startdatum, $enddatum)
    {

        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO voting
                (vorlesungsid, votingname, frage, antwort_1, antwort_2, antwort_3, antwort_4, startdatum, enddatum)
              VALUES
                (:vorlesungsid, :votingname,:frage, :antwort_1, :antwort_2, :antwort_3, :antwort_4, :startdatum, :enddatum)
            ');
            $stmt->bindParam(':vorlesungsid', $vorlesungsid);
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

    public function update($votingid, $vorlesungsid, $votingname, $frage, $antwort_1, $antwort_2 ,$antwort_3,$antwort_4, $startdatum, $enddatum)
    {
        try {
            $stmt = $this->pdo->prepare('
              UPDATE voting
              SET vorlesungsid = :vorlesungsid, votingname = :votingname, frage = :frage,  antwort_1 = :antwort_1,antwort_2 = :antwort_2,antwort_3 = :antwort_3, antwort_4 = :antwort_4,startdatum = :startdatum, enddatum = :enddatum 
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

    public function inputresult ($student_id, $ergebnis)
    {

        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO ergebnis
                (student_id, ergebnis)
              VALUES
                (:student_id, :ergebnis)
            ');
            $stmt->bindParam(':student_id', $student_id);
            $stmt->bindParam(':ergebnis', $ergebnis);


            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return true;
    }

    public function beziehungvotingstudent ($voting_id, $student_id)
    {

        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO voting_student
                (voting_id, student_id)
              VALUES
                (:voting_id, :student_id)
            ');
            $stmt->bindParam(':voting_id', $voting_id);
            $stmt->bindParam(':student_id', $student_id);



            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return true;
    }
}