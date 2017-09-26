<?php
    session_start();
    $name = $_SESSION["userName"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <?php
        
            echo "Welcome ". $name .  "to your Dashboard!";
        ?>
    </body>
</html>