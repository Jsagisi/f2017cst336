<?php


    $host = "localhost";
    //$dbname = "tech_checkout";
    $username = "root";
    $password = "";
    $dotenv = new Dotenv\Dotenv(__DIR__);
    $dotenv->load();
    try {
        //Creating database connection
        $dbConn = new PDO("mysql:host=$host;dbname=tech_checkout", $username, $password);
        // Setting Errorhandling to Exception
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    catch (PDOException $e) {
        
        echo "There was some problem connecting to the database! Error: $e";
        exit();
        
    }
    
    $servername = getenv('DATABASE_HOST');
    $username = getenv('USER_NAME');
    $password = getenv('DATABASE_PASSWORD');
    $database = getenv('DATABASE_NAME');
    $dbport = getenv('DATABASE_PORT');
    
    $dbConn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function getDevices() {
    global $dbConn;
    
    $sql = "SELECT * FROM device";
    
    //Following line doesn't prevent SQL injection!
    //$sql .=" WHERE deviceName LIKE '%".$_GET['deviceName']. "%'  ";
    
    $sql .=" WHERE deviceName LIKE :deviceName ";
    
    $namedParameters[':deviceName'] = '%' . $_GET['deviceName'] . '%';
    
    if (isset($_GET['status'])){ //"status checkbox was checked"
        $sql .= " AND status = :status";
        $namedParameters[':status'] = 'Available';
    }
    if(!empty($_GET['deviceType'])){
                    //type has been selected
                    
                    $sql = $sql . " AND deviceType = :deviceType ";
                    
                    $namedParameters[':deviceType'] = $_GET['deviceType'];
    }
    if(isset($_GET['alpha'])){
        $sql = $sql . " ORDER BY ";
        if($_GET['alpha'] == 'price'){
            $sql.= "price";
            
        }
        else{
            $sql.="deviceName";
        }
        
    }
    else{
        $sql .= " ORDER BY deviceName";
        
    }
    
    
   
   
    
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $records;
    
}

function getDeviceTypes() {
    global $dbConn;
    
    $sql = "SELECT DISTINCT deviceType FROM device ORDER BY deviceType";
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute( );
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    return $records;
    
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Lab 5: Checkout Devices </title>
    </head>
     <style> @import url("style.css"); </style>
    <body>
        <div id="wrapper">
        <h1>Technology Center: Checkout System</h1>
        
        <form>
            
            Device: <input type="text" name="deviceName"/>
            Type:    <select name="deviceType">
                       <option value="">Select One</option>
                     
                       <?php
                          $deviceTypes = getDeviceTypes();
                          foreach ($deviceTypes as $deviceType) {
                              echo "<option>" . $deviceType['deviceType']    ." </option>";
                          }
                        ?>
                     </select>
                     <input type="checkbox" name ="status" id="status" /> 
                     <label for="status"> Available</label>
                     
                     <input type="submit" value="Search" />
                    Sort:  <input type="radio" name="alpha" id="alpha" value = "deviceName"/> 
                    <label for="alpha" > Alphabetical</label>
                    <input type="radio" name="alpha" id="price" value = "price"/> 
                    <label for="price" > Price</label>
 
            
            
        </form>
        
        <br />
        <hr>
        <br />
        <div id="devices">
        <?php
        
            $devices = getDevices();
            foreach($devices as $device) {
                
                echo $device['deviceName'] . " " . $device['price']  . " " . $device['status'] . "<br />";
            }
            
        
        ?>
        </div>

    </body>
    </div>
</html>