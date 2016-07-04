<?php
require_once("manager.php");
require_once("benutzer.php");

class benutzer_manager extends manager
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
        try {
            // Lese alle Benutzer aus der Datenbank aus
            $stmt = $this->pdo->prepare('SELECT * FROM benutzer');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'benutzer');
            return $stmt->fetchAll();


        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return null;
    }

    public function findByEmail($email)
    {
        // Lese einer zur Email zugehörigen Benutzer aus
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM benutzer WHERE  email= :email');
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'benutzer');
            $benutzer = $stmt->fetch();

            return $benutzer;

        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }

    public function findById($id)
    {
        // Lese einen zu einer bestimmten ID gehörigen Benutzer aus
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM benutzer WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'benutzer');
            $benutzer = $stmt->fetch();
            return $benutzer;
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }

    public function create($vorname, $nachname, $email, $role)
    {
        $success = true;

        // zufälligen Salt generieren (Salt= Zufallswert der das erraten des Passwort-Hashes erschweren soll)
        $salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
        $options = [
            'salt' => $salt
        ];
        // Funktion, die zufällige Passwörter erzeugt
        $password = $vorname;
        // Password wird mit salt gehasht
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $options);

        // Füge einen Benutzer der Datenbank hinzu (Attribute siehe unten)
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO benutzer
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
            $suffix = explode("@", $email)[1]; //zerlegt string $e-mail in einen string vor dem @ und nach dem @
            if ($suffix === "hdm-stuttgart.de") {
                echo "email ist hdm mail " . $suffix;
                $to = $email;
                $subject = "Neues Benutzerkonto bei Just Vote";
                $message = "Hallo " . $vorname . " " . $nachname . ",\n\n Es wurde ein Benutzerkonto für Sie bei JustVote angelegt.\n Ihre Anmeldedaten lauten:\n Benutzername: " . $email . "\n Passwort: " . $vorname . "\n\n MFG\n Ihr Just Vote Team";
                mail($to, $subject, $message);
            }


        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            $success = false;
        }
        return $success;
    }

    public function update(benutzer $benutzer)
    {
        try {
            // Updaten eines zu einer bestimmten ID gehörenden Benutzer (Attribute siehe unten)
            $stmt = $this->pdo->prepare('
              UPDATE benutzer
              SET vorname = :vorname,
                  nachname = :nachname,
                  email = :email,
                  role = :role
              WHERE id = :id
            ');
            $stmt->bindParam(':id', $benutzer->id);
            $stmt->bindParam(':vorname', $benutzer->vorname);
            $stmt->bindParam(':nachname', $benutzer->nachname);
            $stmt->bindParam(':email', $benutzer->email);
            $stmt->bindParam(':role', $benutzer->role);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $benutzer;
    }

    public function updatePassword(benutzer $benutzer)
    {
        // zufälligen Salt generieren (Salt= Zufallswert der das erraten des Passwort-Hashes erschweren soll)
        $salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
        $options = [
            'salt' => $salt
        ];
        // Funktion, die zufällige Passwörter erzeugt
        $password = $benutzer->password;
        // Password wird mit salt gehasht
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $options);


        try {
            // Updaten eines zu einer bestimmten ID gehörenden Passwortes eines Benutzers (Attribute siehe unten)
            $stmt = $this->pdo->prepare('
              UPDATE benutzer
              SET password = :password
              WHERE id = :id
            ');
            $stmt->bindParam(':id', $benutzer->id);
            $stmt->bindParam(':password', $password_hashed);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        //return $benutzer;
    }

    public function delete(benutzer $benutzer)
    {
        try {
            // Löschen eines zu einer bestimmten ID gehörenden Benutzer
            $stmt = $this->pdo->prepare('
              DELETE FROM benutzer WHERE id= :id
            ');
            $stmt->bindParam(':id', $benutzer->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return $benutzer;
        }
        return null;
    }
}

?>