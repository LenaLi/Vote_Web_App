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

    public function findByVotingName($votingname)
    {
        // Lese Votingname eines Votings aus
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

    public function create($voting_id, $student_id)
    {
        // Füge ein Voting der Datenbank hinzu (Attribute siehe unten)
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO voting_student
                (votingid, student_id)
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

    public function findVotingsByStudent($student_id)
    {
        // Lese zur StudentId zu ein zugehöriges Voting des Studenten aus
        try {
            $stmt = $this->pdo->prepare('
              SELECT *
              FROM voting_student 
              WHERE student_id= :student_id
            ');
            $stmt->bindParam(':student_id', $student_id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'voting_student');
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return true;
    }


    public function delete($votingid)
    {
        // Löschen eines zu einer bestimmten VotingId gehörenden Votings
        try {
            $stmt = $this->pdo->prepare('
              DELETE FROM voting_student WHERE votingid= :votingid
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

?>