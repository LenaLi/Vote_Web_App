<?php
/**
Hier kommen die Funktionen der Klasse Student rein.
 */

<?php
require_once("manager.php");
require_once("student.php");

class student_manager extends student
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
            $stmt = $this->pdo->prepare('SELECT * FROM student');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'student');
            return $stmt->fetchAll();


        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return null;
    }

    public function findByEmail($email)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM student WHERE  email= :email');
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'student');
            $student = $stmt->fetch();

            return $student;

        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }
    public function findById($student_id)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM student WHERE student_id = :student_id');
            $stmt->bindParam(':student_id', $student_id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'student');
            $student = $stmt->fetch();
            return $student;
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }


    public function create($vorname,$nachname,$email,$role)
    {
        $salt=""; // benötigt für Hashfunktion
        $password="Standardpassword/Hash"; // TODO: hier muss Funktion der Passworterzeugung und Hash


        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO student
                (vorname, nachname, email, role, password, salt)
              VALUES
                (:vorname, :nachname, :email , :role, :password, :salt)
            ');
            $stmt->bindParam(':vorname', $vorname);
            $stmt->bindParam(':nachname', $nachname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(":salt", $salt);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return true;
    }

    public function update(student $student)
    {
        try {
            $stmt = $this->pdo->prepare('
              UPDATE student
              SET vorname = :vorname,
                  nachname = :nachname,
                  email = :email,
                  role = :role
              WHERE student_id = :student_id
            ');
            $stmt->bindParam(':student_id', $student->student_id);
            $stmt->bindParam(':vorname', $student->vorname);
            $stmt->bindParam(':nachname', $student->nachname);
            $stmt->bindParam(':email', $student->email);
            $stmt->bindParam(':role', $student->role);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $student;
    }

    public function delete(student $student)
    {
        try {
            $stmt = $this->pdo->prepare('
              DELETE FROM student WHERE student_id= :student_id
            ');
            $stmt->bindParam(':student_id', $student->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return $student;
        }
        return null;
    }
}