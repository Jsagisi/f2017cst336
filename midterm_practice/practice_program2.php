<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
          
  <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#FFC0C0">
      <td>1</td>
      <td>The report shows all cities/towns that have a population between 50,000 and 80,000</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>2</td>
      <td>The report shows all towns along with their county name ordered by population (from biggest to smallest)</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>3</td>
      <td>The report lists the total population per county</td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#FFC0C0">
       <td>4</td>
       <td>The report lists the total population per state</td>
       <td align="center">15</td>
     </tr>
     <tr style="background-color:#FFC0C0">
      <td>5</td>
      <td>The report lists the three least populated towns</td>
      <td width="20" align="center">10</td>
    </tr>     
    <tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>List the counties that do not have a town in the "town" table</td>
      <td width="20" align="center">10</td>
    </tr>
     <tr style="background-color:#99E999">
      <td>7</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>    
    <?php

$dbHost = getenv('IP');
$dbname = "midterm_practice";
$dbPort = 3306;
$username = getenv('C9_USER');
$password = "";

$dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbname", $username, $password);
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM mp_town WHERE population BETWEEN 50000 AND 80000";


$stmt = $dbConn -> prepare ($sql);
$stmt -> execute ();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $record) {
	echo $record['town_name']. " ". $record['population']. "</br>";
}


    echo "Report 2: The report shows all towns along with 
        their county name ordered by population (from biggest
        to smallest) <br/ >";
$sql = "SELECT town_name, county_name
		FROM mp_town t
		JOIN mp_county c ON t.county_id = c.county_id
		ORDER BY population DESC ";
		
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['town_name']  . " - " . $record['county_name'] . $record['population']. "<br />";
}	

echo "Report 3: The report lists the total population per county: <br/ >";
$sql = "SELECT mp_county.county_id, mp_town.county_id, county_name,SUM(population) AS county_pop
        FROM mp_county
        INNER JOIN mp_town ON mp_county.county_id = mp_town.county_id
        GROUP BY county_name";
		
$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['county_name']  . " - " . $record['county_pop'] . $record['population']. "<br />";
}	

echo "Report 3: The report lists the total population per state <br/ >";
$sql = "SELECT state_name, SUM( population ) total
        FROM mp_town t
        JOIN mp_county c ON t.county_id = c.county_id
        JOIN mp_state s ON c.state_id = s.state_id
        GROUP BY state_name";



$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['state_name']  . " - " . $record['total'] ."<br />";
}	

echo "Report :4 Three least populated cities: <br/ >";
$sql = "SELECT town_name, population
        FROM mp_town
        ORDER BY population ASC
        LIMIT 0, 3";



$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['town_name']  . " - " . $record['population'] ."<br />";
}	

echo "<br />Report 6:Counties without a town: <br/ >";
$sql = "SELECT town_name, population
        FROM mp_town
        ORDER BY population ASC
        LIMIT 0, 3";



$stmt = $dbConn->query($sql);	
$results = $stmt->fetchAll();
foreach ($results as $record) {
	echo $record['town_name']  . " - " . $record['population'] ."<br />";
}	
?>
    

    </body>
</html>