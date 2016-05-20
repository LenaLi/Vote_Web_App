
<?php
require_once("manager.php");


class antwort_manager extends manager
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


    public function getbyFrageID ($frageID)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM antwort WHERE frageID = :frageID');
            $stmt->bindParam(':frageID', $frageID);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();

            return $result;

        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }

    public function create ($frageID, $text)
    {
        // Füge neue Antwort in Tabelle Antwort der Datenbank hinzu (Attribute siehe unten)
        try {
            $stmt = $this->pdo->prepare('
                  INSERT INTO antwort
                    (frageID, text)
                  VALUES
                    (:frageID, :text)
                ');
            $stmt->bindParam(':frageID', $frageID);
            $stmt->bindParam(':text', $text);

            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return true;
    }

    public function update($ID, $frageID, $text)
    {
        // Updaten eines zu einer bestimmten FrageId gehörenden Antwort (Attribute siehe unten)
        try {
            $stmt = $this->pdo->prepare('
                  UPDATE antwort
                  SET frageid = :frageid, text = :text
                  WHERE ID = :ID
                ');
            $stmt->bindParam(':ID', $ID);
            $stmt->bindParam(':frageID', $frageID);
            $stmt->bindParam(':text', $text);

            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }




}
?>