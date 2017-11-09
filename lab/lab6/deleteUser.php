<?php


if (!isset($_SESSION["username"])) {  //Check whether the admin has logged in
    header("Location: login.html"); 
}

include 'inc/functions.php';

$dbConn = getDBConnection("tech_checkout");

$sql = "DELETE FROM user
        WHERE userId = " . $_GET['userId'];
$stmt = $dbConn->prepare($sql);
$stmt->execute();
header("Location: admin.php");


?>