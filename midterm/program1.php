<?php
function displayTable(){
    
    echo "Everything Is Valid";
    echo "<table border='1' style ='margin:0 auto' cellpadding=7>";
    $_GET['selectMonth'] = $month;
    $num_days = array();
    if($month == 'November'){
        $num_days = 30;
    }
    elseif($month =='December'){
        $num_days= 31;       
    }
    elseif($month =='January'){
        $num_days= 31;       
    }
    elseif($month =='February'){
        $num_days= 28;       
    }
    // for ($k=1; $k < $num_days; $k++){
    //     $num_days[] = $i;
    // }
    
    for ($i=0; $i < 5; $i++){
        echo"<tr>";
        for($j=0; $j < 7; $i++){
            echo"<td>". $num_day. "</td>";
        }
    }
}
function isFormValid(){
    if(isset($_GET['submitForm'])){
        
        if(empty($_GET['selectMonth'] )){
            echo"You must select a month!";
            return false;
        }
        if(empty($_GET['radioAnswer'])){
            echo"</br>";
            echo "You must specify the number of locations!";
            return false;
            
        }
        else{
        return true;
    }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
            <title> Winter Vacation Planner</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <style>
        	@import url("css/styles.css");
        </style>
    </head>
    <body>
        <div class="jumbotron">
            <h1> Winter Vacation Planner </h1>
        </div>
        <form method="GET">
        Select Month: <select name="selectMonth">
                <option value=""> Select</option>
                <option value="November">November</option>
                <option value="December">December</option>
                <option value="January">January</option>
                <option value="February">February</option>
        </select>
        
        </br>
        </br>
        Number of locations: <input type="radio" name="radioAnswer" value = "3"> <label>Three</label>
                            <input type="radio" name="radioAnswer" value = "4"> <label>Four</label>
                            <input type="radio" name="radioAnswer" value = "5"> <label>Five</label>
        </br>
        </br>
        
        Select Country: <select>
                        <option value="USA">USA</option>    
                        <option value="Mexico">Mexico</option>  
                        <option value="Norway">Norway</option> 
                        </select>
                        
        </br>
        </br>
        
        Visit locations in alphabetical order:
                    <input type ="radio" value="alpha"><label>A-Z</label>
                    <input type ="radio" value="alphaReverse"><label>Z-A</label>
       
        </br></br>
        <input type="submit" value="Create Itinerary" name="submitForm"/>
        </br></br>
        <?php 
        if(isFormValid()){
            displayTable();
        }
        ?>
        
        </form>
        <div id="wrapper"></div>
        

                       <hr>
               <h1> November Itinerary </h1>
               <h3> Visiting 3 places in USA               <a href="#" data-toggle="tooltip" 
               title="Header and subheaer displayed with info submitted.">
               <img src='info.png' width='15'></a></h3>

               <a href="#" data-toggle="tooltip" 
               title="Calendar created based on month (Feb=28 days, Nov=30, Jan and Dec=31).
               Random locations in random days.">
               <img src='info.png' width='20'></a><br />
               <table border='1'><tr><td>  1 <br /> </td><td>  2 <br /> </td><td>  3 <br /> <img src='img/USA/chicago.png' width='100'/><br />Chicago</td><td>  4 <br /> </td><td>  5 <br /> </td><td>  6 <br /> <img src='img/USA/hollywood.png' width='100'/><br />Hollywood</td><td>  7 <br /> </td></tr><tr><td>  8 <br /> </td><td>  9 <br /> </td><td>  10 <br /> </td><td>  11 <br /> </td><td>  12 <br /> </td><td>  13 <br /> </td><td>  14 <br /> </td></tr><tr><td>  15 <br /> </td><td>  16 <br /> </td><td>  17 <br /> </td><td>  18 <br /> </td><td>  19 <br /> </td><td>  20 <br /> </td><td>  21 <br /> </td></tr><tr><td>  22 <br /> </td><td>  23 <br /> </td><td>  24 <br /> </td><td>  25 <br /> <img src='img/USA/las_vegas.png' width='100'/><br />Las Vegas</td><td>  26 <br /> </td><td>  27 <br /> </td><td>  28 <br /> </td></tr><tr><td>  29 <br /> </td><td>  30 <br /> </td><td></td><td></td><td></td><td></td><td></td></tr></table>               <hr>
               <a href="#" data-toggle="tooltip" 
               title="List of the months submitted. Includes number of places and country. Uses session variables">
               <img src='info.png' width='20'></a>
               <h3>Monthly Itinerary</h3>Month: November, Visiting 3 places in USA <br />               
                <script src="js/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    
    <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>The page includes the form elements as the Program Sample: dropdown menu, radio buttons, etc.</td>
      <td width="20" align="center">3</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>2</td>
      <td>Errors are displayed if country or number of locations are not submitted.</td>
      <td width="20" align="center">5</td>
    </tr> 
    <tr style="background-color:#FFC0C0">
      <td>3</td>
      <td>Header and Subheader are displayed when submitting the form with all data. </td>
      <td align="center">5</td>
    </tr>    
	<tr style="background-color:#FFC0C0">
      <td>4</td>
      <td>A table with days and weeks is displayed when submitting the form</td>
      <td align="center">5</td>
    </tr> 
    <tr style="background-color:#FFC0C0">
      <td>5</td>
      <td>The number of days in the table correspond to the month selected</td>
      <td align="center">10</td>
    </tr>
    <tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>Random images are displayed in random days</td>
      <td align="center">5</td>
    </tr>       
    <tr style="background-color:#FFC0C0">
      <td>7</td>
      <td>The number of random images correspond to the number of locations and country submitted</td>
      <td align="center">10</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>8</td>
      <td>The proper name of the location is displayed below the image 
      		(e.g. "New York", "Las Vegas")</td>
      <td align="center">10</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>9</td>
      <td>The list of months submitted along with the country and number of locations is displayed below the table (using Sessions)</td>
      <td align="center">15</td>
    </tr>    
    <tr style="background-color:#FFC0C0">
      <td>10</td>
      <td>Random locations should be ordered alphabetically, if user checks corresponding radio button (A-Z or Z-A). </td>
      <td align="center">15</td>
    </tr>        
    <tr style="background-color:#99E999">
      <td>11</td>
      <td>The web page uses Bootstrap and has a nice look. </td>
      <td align="center">5</td>
    </tr>        
    <tr style="background-color:#99E999">
      <td>12</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b> 15</td>
    </tr> 
  </tbody></table>  
    

    </body>
</html>