<?php include("inc/session_check.php"); ?>
<?php include("inc/header.php"); ?>
<?php include("inc/navigation.php"); ?>

<!DOCTYPE html>
<html>
<body>
    <form action="vote_student_do.php" method="post">
    <table>
        <tr>
            <td>
                <input type="radio" name="voting" value="A1"/>
                Antwort 1
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" name="voting" value="A2"/>
                Antwort 2
            </td>
        </tr>
    </table>
    </form>
</body>
</html>