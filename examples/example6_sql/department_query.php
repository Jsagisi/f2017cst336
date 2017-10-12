<?php

$dbHost = getenv('IP');
$dbname = "sql_example";
$dbPort = 3306;
$username = getenv('C9_USER');
$password = "";

$dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbname", $username, $password);
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM employee";


$stmt = $dbConn -> prepare ($sql);
$stmt -> execute ();

while ($row = $stmt -> fetch()){
    echo $row['employee_name'];
    echo "</br>";
}

?>