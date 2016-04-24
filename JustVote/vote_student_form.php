<?php include("inc/session_check.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/navigation.php"); ?>



<!DOCTYPE html>
<html>
<body>
<?php
require_once("Mapper/voting_manager.php");

$votingmanager =new voting_manager();
$votings = $votingmanager->findByVotingId(7);

?>


<form action="vote_student_do.php" method="post">
    <table>
        <?php
            echo '<h4>'.$votings.'</h4>';
            if($votings==null)
            {
                //kein Datensatz gefunden
                echo '<h2>Kein Datensatz wurde gefunden</h2>';
            }
            foreach($votings as $voting)
            {
                ?>

                <tr>
                    <td>
                        <h1>
                            Achtung
                            <?php
                            $voting->frage;
                            ?>
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" name="voting" value="A1"/>Antwort 1
                    </td>
                </tr>

        <?php
            }
        ?>
        <tr>
            <td>
                <input type="submit" name="Abschicken" value="Abschicken">
            </td>
        </tr>
    </table>
    </form>

</body>
</html>