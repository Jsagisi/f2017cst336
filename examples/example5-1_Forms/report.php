<?php
    session_start();
    $report = $_SESSION["report"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <?php
        include "inc.report.php";
        ?>
        
        <div>
            <a href="complaintBox.php">Back</a>
        </div>

    </body>
</html>