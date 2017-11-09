<?php
session_start();

if (!isset($_SESSION["username"])) {  //Check whether the admin has logged in
    header("Location: login.html"); 
}

include 'inc/functions.php';

$dbConn = getDBConnection("tech_checkout");


function getAllUsers() {
    global $dbConn;
    $sql = "SELECT * FROM user ORDER BY lastName";
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    return $records;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <script>

            function confirmDelete(firstName) {
                
                return confirm("Are you sure you want to delete " + firstName + "?");
                
            }            
            
        </script>
        
    
     <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        </head>
    <body>
    <h1>Welcome <?=$_SESSION['adminName']?></h1>
    
        <hr>
        
        <form action="addUser.php">
          <input type="submit" value="Add New User" />
        </form>
        
        <form action="logout.php" >
            <input type="submit" value="Logout" />
        </form>
        
        <?php 
        $users = getAllUsers();
        
            foreach ($users as $user){
              echo "<a href='userInfo.php?userId=".$user['userId']."' target='userInfoFrame'>" . $user['firstName'] . "</a> ";
                echo "<a href='' onclick='window.open(\"userInfo.php?userId=".$user['userId']." \", \"userWindow\", \"width=200, height=200\" )'>" . $user['lastName'] . " </a> ";
                echo $user['email'];
                
             echo "<a href='updateUser.php?userId=".$user['userId']."'>
                     <button type=\"button\" class=\"btn btn-default btn-lg\">
                     <span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span> Update
                     </button></a>";
                
                echo "<form action='deleteUser.php' style='display:inline' onsubmit='return confirmDelete(\"".$user['firstName']."\")'>
                     <input type='hidden' name='userId' value='".$user['userId']."' />
                     <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span>
                     <input type='submit' value='Delete'>
                  </form>
                ";
            //   echo "<a onclick=confirmDelete(\" " . $user['firstName'] . " \")  href='deleteUser.php?userId=".$user['userId']."'>
            //          <button type=\"button\" class=\"btn btn-danger btn-lg\">
            //          <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span> Delete
            //          </button></a>";               
                     
                echo "</br>";
            }
            
        
        ?>

    </body>
</html>