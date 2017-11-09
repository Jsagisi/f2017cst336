<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
          
  <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>Name and country of birth of female actresses who were NOT born in the USA, ordered by last name</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>2</td>
      <td>Number of movies per category and their average duration</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>3</td>
      <td>All info about the top three longest movies released after 2000</td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#99E999">
       <td>4</td>
       <td>List of  actors and actresses who have not won an academy award, ordered by last name </td>
       <td align="center">15</td>
     </tr>
     <tr style="background-color:#99E999">
      <td>5</td>
      <td>List of celebrities who have won an oscar, ordered by "award_year". Include full name, movie title, oscar year, and award category.</td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#99E999">
      <td>6</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center">67<b></b></td>
    </tr> 
  </tbody></table>    

<?php
    
$dbHost = getenv('IP');
$dbname = "midterm";
$dbPort = 3306;
$username = getenv('C9_USER');
$password = "";

$dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbname", $username, $password);
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "</br> Report 1:Name and country of birth of female actresses who were NOT born in the USA, ordered by last name </br>";
$sql = "SELECT * FROM celebrity
        WHERE gender = 'F'
        AND country_of_birth != 'USA'
        ORDER BY lastName";
    

$stmt = $dbConn -> prepare ($sql);
$stmt -> execute ();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $record) {
	echo $record['firstName']." ". $record['lastName']. " - ". $record['country_of_birth']." - ". $record['gender']."</br>";
}

echo "</br>";
echo "Report 2: Number of movies per category and their average duration <br/ >";

$sql = "SELECT COUNT(movie_category) as total, AVG(duration) as durationAvg, movie_category
        FROM movie
        GROUP BY movie_category";

$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['movie_category']  . " - " . $record['total'] . " - ".$record['durationAvg'].  "<br />";
}


echo "<br />Report 3:All info about the top three longest movies released after 2000 <br/ >";
$sql = "SELECT *
		FROM movie
		WHERE release_year > 2000
		ORDER BY duration DESC
		LIMIT 0, 3";
		
		
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['movie_title']  ." -" . $record['movie_category']. " - " . $record['release_year'] ." - ". $record['company']. " - ".$record['duration'].  "<br />";
}

echo "<br />Report 4:List of actors and actresses who have not won an academy award, ordered by last name <br/ >";
$sql = "SELECT * FROM celebrity c
        LEFT JOIN oscar o ON c.celebrityId = o.celebrityId
        WHERE o.celebrityId IS NULL";
		
		
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['lastName']  .", " . $record['firstName']. "<br />";
}

echo "<br />Report 5:List of celebrities who have won an oscar, ordered by \"award_year\". Include full name, movie title, oscar year, and award category. <br/ >";
$sql = "SELECT * FROM celebrity c
        JOIN oscar o ON c.celebrityId = o.celebrityId
        JOIN award_category ac ON ac.award_cat_id = o.award_cat_id
        JOIN movie m ON o.movieId = m.movieId
        ORDER BY award_year";
		
		
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['firstName']  .", " . $record['lastName']." - " .$record['movie_title']." - ".$record['award_year']." - ".$record['award_category']. "<br />";
}

?>
    </body>
</html>