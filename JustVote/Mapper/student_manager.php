<?php
require_once("manager.php");
require_once("student.php");

class student_manager extends manager
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

    public function create($vorname,$nachname,$email,$password)
    {
        // zufälligen Salt generieren (Salt= Zufallswert der das erraten des Passwort-Hashes erschweren soll)
        $salt=mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
        $options = [
            'salt' => $salt
        ];
        // Password wird mit salt gehasht
        $password_hashed=password_hash($password, PASSWORD_BCRYPT, $options);

        // Füge einen Benutzer der Datenbank hinzu (Attribute siehe unten)
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO student
                (vorname, nachname, email, password, salt)
              VALUES
                (:vorname, :nachname, :email , :password, :salt)
            ');
            $stmt->bindParam(':vorname', $vorname);
            $stmt->bindParam(':nachname', $nachname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':salt', $salt);
            $stmt->bindParam(':password', $password_hashed);
            $stmt->execute();


        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return false;
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
              WHERE student_id = :student_id
            ');
            $stmt->bindParam(':student_id', $student->student_id);
            $stmt->bindParam(':vorname', $student->vorname);
            $stmt->bindParam(':nachname', $student->nachname);
            $stmt->bindParam(':email', $student->email);
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