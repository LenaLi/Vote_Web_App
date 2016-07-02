
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


    public function findAll()
    {
        // Lese alle Votings aus der Datenbank aus
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
        // Lese einer zur VorlesungsId zugehörigen Votings aus
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
        // Lese zur VotingId zugehöriges Voting aus
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM voting WHERE votingid = :votingid');
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

    public function create ($vorlesungsid, $votingname, $startdatum, $enddatum)
    {
        // Füge ein Voting der Datenbank hinzu (Attribute siehe unten)
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO voting
                (vorlesungsid, votingname, startdatum, enddatum, benutzer_id)
              VALUES
                (:vorlesungsid, :votingname, :startdatum, :enddatum, :benutzer_id)
            ');
            $stmt->bindParam(':vorlesungsid', $vorlesungsid);
            $stmt->bindParam(':votingname', $votingname);
            $stmt->bindParam(':startdatum', $startdatum);
            $stmt->bindParam(':enddatum', $enddatum);
            $stmt->bindParam(':benutzer_id', $benutzer_id);

            $stmt->execute();
            //return $stmt->fetch(PDO::FETCH_NUM);
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
    }

    public function update($votingid, $vorlesungsid, $votingname, $startdatum, $enddatum)
    {
        // Updaten eines zu einer bestimmten VotingId gehörenden Voting (Attribute siehe unten)
        try {
            $stmt = $this->pdo->prepare('
              UPDATE voting
              SET vorlesungsid = :vorlesungsid, votingname = :votingname, startdatum = :startdatum, enddatum = :enddatum
              WHERE votingid = :votingid
            ');
            $stmt->bindParam(':vorlesungsid', $vorlesungsid);
            $stmt->bindParam(':votingid', $votingid);
            $stmt->bindParam(':votingname', $votingname);
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
        // Löschen eines zu einer bestimmten VotingId gehörenden Votings
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
    public function countvorlesungsid($vorlesungsid) //benutzer sind über vorlesungen mit votings verknüpft
    {
        try {
            $stmt = $this->pdo->prepare('SELECT COUNT(vorlesungsid) as Anzahl FROM voting WHERE vorlesungsid = :vorlesungsid');
            $stmt->bindParam(':vorlesungsid', $vorlesungsid);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'vorlesungsid');
            $ergebnis = $stmt->fetchAll();

            return $ergebnis;

        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }

}
?>