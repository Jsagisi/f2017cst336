<?php

include '../../functions/dbConnection.php';
$dbConn = getDBConnection("tech_checkout");

$sql = "SELECT username 
        FROM user
        WHERE username = :username";
        
        
        
        $statement = $dbConn->prepare($sql);
        $np = array();
        $np[":username"] = $_GET['username'];
        $statement->execute( $np );
        $record = $statement->fetchAll(PDO::FETCH_ASSOC);

        //print_r($record);
        json_encode($record);
?>