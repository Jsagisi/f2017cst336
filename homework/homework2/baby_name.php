<?php
$boy_names = array("Jackson", "Aiden","Lucas","Liam","Noah","Ethan","Mason",
"Caden","Oliver","Elijah","Grayson","Jacob","Michael","Benjamin","Carter","James",
"Jayden","Logan","Alexander","Caleb","Ryan","Luke","Daniel","Jack","William","Owen","Gabriel",
"Matthew","Connor","Jayce");

$girl_names = array("Sophia","Emma","Olivia","Ava","Mia","Isabella","Riley","Aria",
                    "Zoe","Charlotte","Lily","Layla","Amelia","Emily","Madelyn","Aubrey","Adalyn","Madison",
                    "Chloe","Harper","Abigail","Aalyiah","Avery","Evelyn","Kaylee","Ella","Ellie","Scarlett",
                    "Arianna","Hailey");
$maleorfemale = $_GET['gender'];

function getName()
{
    global $maleorfemale,$boy_names,$girl_names;
    
    if($maleorfemale == 'male'){
    $random = rand(0,29);
    echo "$boy_names[$random]";
        }
        
    elseif($maleorfemale == 'female'){
    $random = rand(0,29);
    echo "$girl_names[$random]";
        }
}
function getSize()
{
    global $girl_names, $boy_names;
    $combinedArray = array_merge($girl_names,$boy_names);
    $amount = count($combinedArray);
    echo "Total names in database ". $amount;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <link rel="stylesheet" href="https://workspace-jsagisi.c9users.io/homework/homework2/css/style.css"/>
    </head>
    <body>
        <div id="wrapper">
             <img src="img/babygirl.jpg">
        <h1>Baby Name Generator</h1>
        <form method="GET">
            
            <h2><?=getName()?></h2>
         
             <div id="forms">
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female"> Female<br>
            <input type="submit" value="Submit">
            <br>
            <br>
            <br>
            </div>
            
        </form>
        <img src="img/babyboy.jpg">
        <h3><?=getSize()?></h3>
        </div>
        <br>
        <br>
        <footer>

            2017 &copy; Jason Sagisi.

            <br/>
            <img src ="img/csumb-logo.png">
            </footer>
           
            
            
            
    </body>
</html>