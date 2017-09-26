<?php 
    session_start();
    $isPostback = $_SERVER['REQUEST_METHOD'] == 'POST';
    $_POST["userName"] = $name;
    $password = "123456";
    if($name == $password){
        
        $_SESSION["userName"]= $username;
        include "processLogin.php";
    }
    else if($name != $password){
        echo "Login Failed";
    }
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <form method = "POST">
    Username:
    <input type = text id="Login" name=userName>
    <br/>
    Password:
    <input type = password id="Password" name=password>
    <br/>
    <input type = submit value = Submit>
    
    </form>
    </body>
</html>