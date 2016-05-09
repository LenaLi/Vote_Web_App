<!-- Hier kommen die Funktionen der Klasse Student rein -->

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


/*  //public function create($vorname,$nachname,$email,$role)
    {
        $salt=""; // ben�tigt f�r Hashfunktion
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
    } */

    /* public function create($vorname,$nachname,$email,$role,$hash)
    {
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO student
                (nachname, vorname, email, hash)
              VALUES
                (:nachname, :vorname , :email, :hash)
            ');
            $stmt->bindParam(':nachname', $student->nachname);
            $stmt->bindParam(':vorname', $student->vorname);
            $stmt->bindParam(':email', $student->email);
            $stmt->bindParam(':hash', $student->hash);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return $student; */

    public function create($vorname,$nachname,$email,$role)
    {
        // zufälligen Salt generieren (Salt= Zufallswert der das erraten des Passwort-Hashes erschweren soll)
        $salt=mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
        $options = [
            'salt' => $salt
        ];
        // Funktion, die zufällige Passwörter erzeugt
        // Password wird mit salt gehasht
        $password_hashed=password_hash($password, PASSWORD_BCRYPT, $options);

        // Füge einen Benutzer der Datenbank hinzu (Attribute siehe unten)
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
            $stmt->bindParam(':password', $password_hashed);
            $stmt->bindParam(":salt", $salt);
            $stmt->execute();

            // Anmeldedaten  mit email versenden

            // check if hdm email adress
            $suffix = explode("@",$email)[1]; //zerlegt string $e-mail in einen string vor dem @ und nach dem @
            if($suffix === "hdm-stuttgart.de"){
                echo "email ist hdm mail ".$suffix;
                $to = $email;
                $subject = "Neues Benutzerkonto bei Just Vote";
                $message = "Hallo ".$vorname." ".$nachname.",\n\n Es wurde ein Benutzerkonto für Sie bei JustVote angelegt.\n Ihre Anmeldedaten lauten:\n Benutzername: ".$email."\n Passwort: ".$vorname."\n\n MFG\n Ihr Just Vote Team";
                //mail($to,$subject,$message);
            }



        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            //die();
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