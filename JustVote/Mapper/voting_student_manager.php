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


    public function GetVotingName ()
    {



    }




    /*public function beziehungvotingstudent ($voting_id, $student_id)
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
    }*/



}
?>