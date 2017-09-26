<?php
    session_start();
    $isPostback = $_SERVER['REQUEST_METHOD'] == 'POST';
    if($isPostback){
        $report = "Full Name: " .$_POST["fullName"] . "<br />" . "Subject: " 
        . $_POST["subject"] . "<br />" . "Complaint: " . $_POST["description"];
        $_SESSION["report"] = $report;
    }
    else {
        $_SESSION["report"] = "";
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <?php
            if($isPostback){
                include "inc.report.php";
            }
            else{
            include "inc.form.php";
            }
        ?>
        <div>
            <a href="logout.php"> Logout</a>
        </div>
    </body>
</html>