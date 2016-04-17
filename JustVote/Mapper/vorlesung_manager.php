<?php
require_once("manager.php");
require_once("vorlesung.php");

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

    public function findAll(){
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
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM benutzer WHERE  vorlesungsid= :vorlesungsid');
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
    public function findById($id) //????????
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM vorlesung WHERE vorlesungsid = :vorlesungsid');
            $stmt->bindParam(':vorlesungsid', $vorlesungsid);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'vorlesung');
            $benutzer = $stmt->fetch();
            return $vorlesung;
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }


    public function create($vorlesungsid,$benutzerid,$vorlesungsname)
    {

        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO vorlesung
                (vorlesungsid, benutzerid, vorlesungsname)
              VALUES
                (:vorlesungsid, :benutzerid, :vorlesungsname)
            ');
            $stmt->bindParam(':vorlesungsid', $vorlesungsid);
            $stmt->bindParam(':benutzerid', $benutzerid);
            $stmt->bindParam(':vorlesungsname', $vorlesungsname);

            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return true;
    }

    public function update(vorlesung $vorlesung)
    {
        try {
            $stmt = $this->pdo->prepare('
              UPDATE vorlesung
              SET benutzerid = :benutzerid,
                  vorlesungsname = :vorlesungsname,
              WHERE vorlesungsid = :vorlesungsid
            ');
            $stmt->bindParam(':vorlesungsid', $vorlesung->vorlesungsid);
            $stmt->bindParam(':benutzerid', $vorlesung->benutzerid);
            $stmt->bindParam(':vorlesungsname', $vorlesung->vorlesungsname);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $vorlesung;
    }

    public function delete(vorlesung $vorlesung)
    {
        try {
            $stmt = $this->pdo->prepare('
              DELETE FROM vorlesung WHERE vorlesungsid= :vorlesungsid
            ');
            $stmt->bindParam(':vorlesungsid', $vorlesung->vorlesungsid);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return $vorlesung;
        }
        return null;
    }
}