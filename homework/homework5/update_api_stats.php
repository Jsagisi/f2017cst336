<?php
include '../../functions/dbConnection.php';
$conn = getDBConnection("api");
$sql = "SELECT api_stats
        FROM api
        WHERE EXISTS 
                (SELECT keyword
                FROM api_stats
                WHERE keyword = '".$_GET['query']."')
        IF EXISTS (UPDATE api_stats SET times = times + 1
        WHERE id = id)
        ELSE
        INSERT INTO api_stats (keyword, times)
        VALUES('".$_GET['query']."', 0)";
        // "IF NOT EXISTS(SELECT keyword
        // FROM api_stats WHERE keyword = '".$_GET['query']."')
        // BEGIN
        // INSERT INTO api_stats
        // VALUES('".$_GET['query']."', 0)
        // UPDATE api_stats SET times = times + 1
        // WHERE id = id";
echo $sql;
        
$stmt = $conn->prepare($sql);
$stmt->execute();


$keyword = "SELECT'" . $_GET['product']. "'FROM api_stats";
$stmt = $conn->prepare($keyword);
$stmt->execute();
$word = $stmt->fetch(PDO::FETCH_ASSOC);


$amount = "SELECT times FROM api_stats WHERE keyword = '" . $_GET['product']. "'";
$stmt = $conn->prepare($amount);
$stmt->execute();
$total_amount = $stmt->fetch(PDO::FETCH_ASSOC);


echo "User searched " .$word. " ".$total_amount. " times.";




?>