<?php

           foreach (glob("../../vendor/*.php") as $filename)
    {
        include $filename;
    }
    
    
    $dotenv = new Dotenv\Dotenv(__DIR__);
    $dotenv->load();
  
    
    $servername = getenv('DATABASE_HOST');
    $username = getenv('USER_NAME');
    $password = getenv('DATABASE_PASSWORD');
    $database = getenv('DATABASE_NAME');
    $dbport = getenv('DATABASE_PORT');
    
    $dbConn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT *, YEAR(CURDATE()) - yob age 
            FROM adoptees 
            WHERE id = :id";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute(array("id"=>$_GET['id']));
    $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($resultSet);
        
?>