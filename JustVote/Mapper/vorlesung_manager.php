<?php require_once("manager.php"); ?>
<?php require_once("vorlesung.php"); ?>

<?php

class vorlesung_manager extends manager
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
        // Lese alle Vorlesungen aus der Datenbank aus
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM vorlesung');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'vorlesung');
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return null;
    }

    public function findByVorlesungsId($vorlesungsid)
    {
        // Lese zu einer VorlesungsId zugehörige Vorlesung aus
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM vorlesung WHERE  vorlesungsid= :vorlesungsid');
            $stmt->bindParam(':vorlesungsid', $vorlesungsid);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'vorlesung');
            $vorlesung = $stmt->fetch();
            return $vorlesung;

        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }


    public function findByBenutzerID($benutzerid)
    {
        // Lese einen zu einer bestimmten BenutzerId gehörigen Vorlesungen aus
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM vorlesung WHERE benutzerid = :benutzerid');
            $stmt->bindParam(':benutzerid', $benutzerid);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'vorlesung');
            $vorlesungen = $stmt->fetchAll();
            return $vorlesungen;
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }


    public function create($benutzerid, $vorlesungsname, $vorlesungsnummer)
    {
        // Füge eine Vorlesung der Datenbank hinzu (Attribute siehe unten)
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO vorlesung
                (benutzerid, vorlesungsname, vorlesungsnummer)
              VALUES
                (:benutzerid, :vorlesungsname, :vorlesungsnummer)
            ');
            $stmt->bindParam(':benutzerid', $benutzerid);
            $stmt->bindParam(':vorlesungsname', $vorlesungsname);
            $stmt->bindParam(':vorlesungsnummer', $vorlesungsnummer);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return true;
    }

    public function update($vorlesungsid, $vorlesungsname, $vorlesungsnummer)
    {
        // Updaten eines zu einer bestimmten VorlesungsId gehörenden Vorlesung (Attribute siehe unten)
        try {
            $stmt = $this->pdo->prepare('
              UPDATE vorlesung
              SET vorlesungsname = :vorlesungsname,
                  vorlesungsnummer = :vorlesungsnummer
              WHERE vorlesungsid = :vorlesungsid
            ');
            $stmt->bindParam(':vorlesungsid', $vorlesungsid);
            $stmt->bindParam(':vorlesungsname', $vorlesungsname);
            $stmt->bindParam(':vorlesungsnummer', $vorlesungsnummer);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }

    public function delete($vorlesungsid)
    {
        // Löschen einer zu einer bestimmten VorlesungsId gehörenden Vorlesung
        try {
            $stmt = $this->pdo->prepare('
              DELETE FROM vorlesung WHERE vorlesungsid= :vorlesungsid
            ');
            $stmt->bindParam(':vorlesungsid', $vorlesungsid);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return null;
    }
}

?>