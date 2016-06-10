<?php
require_once("manager.php");
require_once("voting_student.php");

class voting_student_manager extends manager
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

    public function findByVotingName ($votingname)
    {
        // Lese Votingname aus
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM voting WHERE  votingname= :votingname');
            $stmt->bindParam(':votingname', $votingname);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'voting');
            $name = $stmt->fetchAll();

            return $name;

        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }


    public function create ($voting_id, $student_id)
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

    public function findVotingsByStudent($voting_id, $student_id)
    {
        try {
            $stmt = $this->pdo->prepare('
              SELECT voting.votingid, voting.vorlesungsid, voting.startdatum, voting.enddatum, voting.votingname 
              FROM voting, voting_student
              WHERE voting_student.student_id = :student_id 
            ');

            //$stmt = $this->pdo->prepare('
              //SELECT voting.votingid, voting.vorlesungsid, voting.startdatum, voting.enddatum, voting.votingname
              //FROM voting, voting_student
              //WHERE voting.votingid = :voting_id and (voting_student.student_id = :student_id and voting_student.votingid=:voting_id)
            //');

            $stmt->bindParam(':voting_id', $voting_id);
            $stmt->bindParam(':student_id', $student_id);

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'voting');
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return true;
    }



}
?>