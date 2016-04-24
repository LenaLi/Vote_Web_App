<?php include("inc/session_check.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/navigation.php"); ?>


<!DOCTYPE html>
<html>
<body>
<?php
$votingmanager =new voting_manager();
$votings = $votingmanager->findByVotingId(7);

if($votings==null)
{
    //kein Datensatz gefunden
    echo '<h2>Kein Datensatz wurde gefunden</h2>';
}

?>


<form action="vote_student_do.php" method="post">
    <table>
        <tr>
            <td>
                <h1>
                    <?php
                    $votings->frage;
                    ?>
                </h1>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="voting" value="A1"/>Antwort 1
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="voting" value="A2"/>
                Antwort 2
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="Abschicken" value="Abschicken">
            </td>
        </tr>
    </table>
    </form>

</body>
</html>