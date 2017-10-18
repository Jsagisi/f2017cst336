<?php
session_start();
function getDBConnection($dbname) {
    $host = "localhost";
    //$dbname = "tech_checkout";
    $username = "root";
    $password = "";
    
    try {
        //Creating database connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Setting Errorhandling to Exception
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    catch (PDOException $e) {
        
        echo "<span class='errorMSG'>There was some problem connecting to the database! Error: $e</span>";
        exit();
        
    }
    
    return $dbConn;
    
}

$conn = getDBConnection("pet_store");
$dogSql = "SELECT * from dog WHERE 1";
$catSql = "SELECT * from cat WHERE 1";
$fishSql = "SELECT * from fish WHERE 1";


    if (!empty($_GET['name']))
    {
        $dogSql .= " AND name like '%" . $_GET['name'] . "%'";
        $catSql .= " AND name like '%" . $_GET['name'] . "%'";
        $fishSql .= " AND fishid like 0";
        echo $dogSql;
    }
    
    if (!empty($_GET['breed']))
    {
        $dogSql .= " AND breed like '%" . $_GET['breed'] . "%'";
        $catSql .= " AND breed like '%" . $_GET['breed'] . "%'";
        $fishSql .= " AND breed like '%" . $_GET['breed'] . "%'";
    }
    
    if (!empty($_GET['ageSearch']))
    {
        $dogSql .= " AND age like " . $_GET['ageSearch'];
        $catSql .= " AND age like " . $_GET['ageSearch'];
        $fishSql .= " AND fishid like 0";
    }


    if (isset($_GET['alpha']))
    {
        $dogSql = $dogSql . " ORDER BY ";
        $catSql = $catSql . " ORDER BY ";
        $fishSql = $fishSql . " ORDER BY ";
        if($_GET['alpha'] =='gender'){
            $dogSql.= "gender";
            $catSql.= "gender";
            $fishSql.= "gender";
        }
        else{
             $dogSql.="breed";
             $catSql.="breed";
             $fishSql.="breed";
        }
        if(isset($_GET['age']))
        {
            $dogSql.= ", age";
            $catSql.= ", age";
        }
    }
    else
    {

        if(isset($_GET['age']))
        {
            $dogSql.= " ORDER BY age";
            $catSql.= " ORDER BY age";
        }
        
    }
    
   
    //  else{
    //      $dogSql.="ORDER BY breed";
    //      $catSql.="ORDER BY breed";
    //      $fishSql.="ORDER BY breed";
    //  }



$statement = $conn->prepare($dogSql);
$statement->execute();
$dogs = $statement->fetchAll(PDO::FETCH_ASSOC); //dogs

$statement = $conn->prepare($catSql);
$statement->execute();
$cats = $statement->fetchAll(PDO::FETCH_ASSOC); // cats

$statement = $conn->prepare($fishSql);
$statement->execute();
$fishs = $statement->fetchAll(PDO::FETCH_ASSOC); // fish




//print_r($records);

function printOut($animal)
{
    global $dogs, $cats, $fishs, $conn;
    
   
 
     
    if ($animal == 'fish')
    {
        echo "<table class= 'speciesTable'>";
        echo "<tr>";
        echo "<th>Species</th>";
        echo "<th>Gender</th>";
        echo "</tr>";
        foreach($fishs as $record)
        {
            echo "<tr>";
            $petId = "fish_".$record['fishid'];
            
            echo "<form action='cart.php'>";
           
           echo "<td> <a href='description.php?fishid=" . $record['fishid'] . "'>". $record['breed']."</td><td>".$record['gender']."</td>"; 
           echo "<td>";
            echo "<input type='hidden' name='petId' value='".$petId."'>";                
            echo "<input type='submit' value='Add to Cart'>";
            echo "</form>";
            echo "</td>";
            
            echo "</tr>";
        }
        echo "</table>";
    }
    else if ($animal == 'dog')
        {
        echo "<table class= 'speciesTable'>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Breed</th>";
        echo "<th>Gender</th>";
        echo "<th>Age (Years)</th>";
        echo "</tr>";
        foreach($dogs as $record)
        {
            echo "<tr>";
            $petId = "dog_".$record['dogid'];
            
            echo "<form action='cart.php'>";
            
            echo "<td> <a href='description.php?dogid=" . $record['dogid'] . "'>" .$record['name']."</a></td><td>".$record['breed']."</td><td>".$record['gender']."</td><td>".$record['age']."</td>";
            
            echo "<td>";
            echo "<input type='hidden' name='petId' value='".$petId."'>";                
            echo "<input type='submit' value='Add to Cart'>";
            echo "</form>";
            echo "</td>";
            
            echo "</tr>";
        }
        echo "</table><hr></br>";
    }
    else if ($animal == 'cat')
        {
        echo "<table class= 'speciesTable'>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Breed</th>";
        echo "<th>Gender</th>";
        echo "<th>Age (Years)</th>";
        echo "</tr>";
        foreach($cats as $record)
        {
            echo "<tr>";
            $petId = "cat_".$record['catid'];
            
            echo "<form action='cart.php'>";

            echo "<td> <a href='description.php?catid=" . $record['catid'] . "'>".$record['name']."</td><td>".$record['breed']."</td><td>".$record['gender']."</td><td>".$record['age']."</td>";
            
            echo "<td>";
            echo "<input type='hidden' name='petId' value='".$petId."'>";                
            echo "<input type='submit' value='Add to Cart'>";
            echo "</form>";
            echo "</td>";
            
            echo "</tr>";
        }
        echo "</table><hr> </br>";
    }

}



?>
<!DOCTYPE html>
<html>
    <head>
        <title> Animal Shelter </title>
    </head>
    
         <!-- Latest compiled and minified CSS -->
   
    <style> @import url("styles.css"); </style>
    
    <body>
        <div id= "wrapper">
        <h1>
            Pet Adoption
        </h1>
        <hr>
        
        <form action="cart.php">
            <input type="submit" value="Adoption Cart" class= "cartButton">
        </form>
            
            </br>
        <form>
            <br><br>
            Search Name: <input type = "text" name="name"/>
            <br><br>
            Search Breed/Species: <input type = "text" name="breed"/>
            
            <br><br>
            Search Age: <input type = "text" name="ageSearch"/>
            <br><br>
            
            Sort: <input type = "radio" name="alpha" id="alpha" value="breed"/>
            <label for="alpha" > Alphabetical</label>
            <input type="radio" name="alpha" id="gender" value = "gender"/>
            <label for="gender"> Gender</label>
            <input type="checkbox" name="age" id="age"/>
            <label for="age"> Age </label>
            <input type ="submit" value="Search" class= "searchButton"/>
        </form>
        
        <h2>Dogs</h2>
        <?=printOut(dog)?>
        <h2>Cats</h2>
        <?=printOut(cat)?>
        <h2>Fish</h2>
        <?=printOut(fish)?>
        </br></br>
        </div>
    </body>
</html>