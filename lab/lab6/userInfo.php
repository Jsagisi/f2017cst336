<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html><?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.html");
}


include 'inc/functions.php';
$conn = getDBConnection("tech_checkout");

if(isset($_GET['userId'])) {
    $info = getUserInfo($_GET['userId']);
    print_r($info);
}
function getDepartmentOfUser($dept)
    {
        global $conn;
        
        $sql = "SELECT DISTINCT deptName from department WHERE departmentId = " . $dept;
        $statement = $conn->prepare($sql);
        $statement->execute();
        $record = $statement->fetch(PDO::FETCH_ASSOC);
        //echo $record['deptName'];
        return $record['deptName'];
        
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <title> User Info </title>
    </head>
    <body>

        <h2> User Id: <?=$_GET['userId']?></h2>
        <h4> First Name: <?=$info['firstName']?></h4>
        <h4> Last Name: <?=$info['lastName']?></h4>
        <h4> Email: <?=$info['email']?></h4>
        <h4> Phone: <?=$info['phone']?></h4>
        <h4> Role: <?=$info['role']?></h4>
        <h4> Department: <?=getDepartmentOfUser($info['deptId'])?></h4>
        
        
         <form action="admin.php" >
            <input type="submit" value="Back" class= "backButton"/>
         </form>
        
    </body>
</html>