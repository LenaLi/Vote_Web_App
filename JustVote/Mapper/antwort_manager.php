
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
            $stmt->setFetchMode(PDO::FETCH_ASSOC); //alles in array, kommt in arry zurück nicht in objektform
            $result = $stmt->fetchAll();

            return $result;

        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }
}
?>