<?php require_once("manager.php");?>
<?php require_once("benutzer.php");?>

<?php
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

    public function findAll(){
        try {
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

    public function create($vorname,$nachname,$email,$role)
    {
        // ZUFÄLLIGEN Salt generieren
        $salt=mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
        $options = [
            'salt' => $salt
        ];
        // Funktion, die zufällige Passwörter erzeugt
        $password="password"; //TODO: Funktion, die zufällige Passwörter erzeugt statt "Passwort"
        // password mit salt hashen
        $password_hashed=password_hash($password, PASSWORD_BCRYPT, $options);

        // SQL Statement auf der Datenbank wird vorbereitet und ausgeführt
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
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return true;
    }

    public function update(benutzer $benutzer)
    {
        try {
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

    public function delete(benutzer $benutzer)
    {
        try {
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