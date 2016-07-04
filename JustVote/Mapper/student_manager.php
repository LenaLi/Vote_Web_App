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

    public function findAll()
    {
        // Lese alle Studenten aus der Datenbank aus
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
        // Lese einer zur Email zugehörigen Studenten aus
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
        // Lese einen zu einer bestimmten ID Studenten aus
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

    public function create($vorname, $nachname, $email, $password)
    {
        // zufälligen Salt generieren (Salt= Zufallswert der das erraten des Passwort-Hashes erschweren soll)
        $salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
        $options = [
            'salt' => $salt
        ];
        // Password wird mit salt gehasht
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $options);
        if ($password == null) {
            $password_hashed = null;
        }
        // Füge einen Benutzer der Datenbank hinzu (Attribute siehe unten)
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO student
                (vorname, nachname, email, password)
              VALUES
                (:vorname, :nachname, :email , :password)
            ');
            $stmt->bindParam(':vorname', $vorname);
            $stmt->bindParam(':nachname', $nachname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password_hashed);
            $stmt->execute();

            // Benachrichtigung per Mail, dass ein Studentkonto angelegt wurde

            // check if hdm email adress
            $suffix = explode("@", $email)[1]; //zerlegt string $e-mail in einen string vor dem @ und nach dem @
            if ($suffix === "hdm-stuttgart.de" && $password_hashed != null ) {
                echo "email ist hdm mail " . $suffix;
                $to = $email;
                $subject = "Neues Konto bei Just Vote";
                $message = "Hallo " . $vorname . " " . $nachname . ",\n\n Es wurde ein Konto für Sie bei JustVote angelegt.\n Ihre Anmeldedaten lauten:\n Benutzername: " . $email . "\n Das Passwort haben Sie selbst eingegeben.\n\n MFG\n Ihr Just Vote Team";
                mail($to, $subject, $message);
            }


        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            //return false;
        }
        return true;
    }


    public function update(student $student)
    {
        // Updaten eines zu einer bestimmten ID gehörenden Studenten (Attribute siehe unten)
        try {

            $stmt = $this->pdo->prepare('
              UPDATE student
              SET vorname = :vorname,
                  nachname = :nachname,
                  email = :email,
                  password = :password
              WHERE student_id = :student_id
            ');
            $stmt->bindParam(':student_id', $student->student_id);
            $stmt->bindParam(':vorname', $student->vorname);
            $stmt->bindParam(':nachname', $student->nachname);
            $stmt->bindParam(':email', $student->email);
            $stmt->bindParam(':password', $student->password);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $student;
    }

    public function updatePassword(student $student)
    {
        // zufälligen Salt generieren (Salt= Zufallswert der das erraten des Passwort-Hashes erschweren soll)
        $salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
        $options = [
            'salt' => $salt
        ];
        // Funktion, die zufällige Passwörter erzeugt
        $password = $student->password;
        // Password wird mit salt gehasht
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $options);

        // Updaten eines zu einer bestimmten ID gehörenden Passwortes eines Studenten (Attribute siehe unten)
        try {
            $stmt = $this->pdo->prepare('
              UPDATE student
              SET password = :password
              WHERE student_id = :student_id
            ');
            $stmt->bindParam(':student_id', $student->student_id);
            $stmt->bindParam(':password', $password_hashed);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        //return $student;
    }

    public function delete(student $student)
    {
        // Löschen eines zu einer bestimmten Student_ID gehörenden Studenten
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