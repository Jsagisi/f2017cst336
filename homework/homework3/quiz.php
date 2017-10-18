<?php
$sum = 0;
function results(){
    if($_GET['radioAnswer']== '2x'){
        echo "Question 1 is Correct!";
        $sum+=1;
        echo "</br>";
     
    }
    if($_GET['boolean'] == 'True'){
        echo"Question 2 is Correct!";
        $sum+=1;
        echo "</br>";
      
    }
    if($_GET['checkboxMath']== '1' ){
        echo"Question 3 is Correct!";
        $sum+=1;
        echo "</br>";
        
    }
    if($_GET['boolean2'] == 'False'){
        echo"Question 4 is Correct!";
        $sum+=1;
        echo "</br>";
      
    }
    echo "</br>";
    echo "</br>";
    echo "Score = $sum /4";
    $percent = ($sum/4) * 100;
    echo "</br>";
    printf("%.2f", $percent);
    echo "%";
    
    echo "</br></br>";
    
}

function isFormValid(){
if (isset($_GET['submitForm'])){
    
        if (empty($_GET['name'])){
            echo "Please enter a name!";
            return false;
        }
        if (empty($_GET['radioAnswer'])){
            echo "Please choose a answer for question 2!";
            return false;
        }
        if (empty($_GET['checkboxMath'])){
            echo "Please select an answer for question 3!";
            return false;
        }
        return true;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Random Quiz</title>
    </head>
    <style>
    @import url("css/style.css");
    </style>
    <body>
        <h1>Quiz</h1>
        <h2>Random Questions </h2>
        
        <form method="GET">
            Enter Name: <input type="text" name="name" size="25" maxlength="25" placeholder="Enter name" value ="">
            <br /> <br />
            1. True or False:  200/10 = 20?
            <select name="boolean">
                <option>True</option>
                <option>False</option>
            </select>
            <br /> <br />
            2. Derivative of x^2?
            <br />  
            <input type="radio" name="radioAnswer" value="2x"><label>2x</label>
            <br />
            <input type="radio" name="radioAnswer" value="x^3/3"><label>x^3/3</label>
            <br />
            <input type="radio" name="radioAnswer" value="x"><label>x</label>
            <br />
            <input type="radio" name="radioAnswer" value="1"><label>1</label>
            <br /><br />
            3. Which of these answers are programming languages
            <br />
            Select the correct answer(s):
            <br />
             <input type="checkbox" name="checkboxMath" id="checkboxMath" value = "1"/><label>C++</label>
             <br />
             <input type="checkbox" name="checkboxMath" id="checkboxMath" value = "2"/><label>C--</label>
             <br />
             <input type="checkbox" name="checkboxMath" id="checkboxMath" value = "3"/><label>hph</label>
             <br />
             <input type="checkbox" name="checkboxMath" id="checkboxMath" value = "4"/><label>C*</label>
             <br /><br />
             
             4.True or False:  PHP is frontend and HTML is dealt on the backend.
             <select name="boolean2">
                <option>True</option>
                <option>False</option>
            </select>
             
             <input type="submit" value="Submit" name="submitForm"/> 
             
             
            </form>
            
            <?php
            if (isFormValid()){
                results();
            }
            ?>
            
             <footer>

            2017 &copy; Jason Sagisi.

            <br/>
            <img src ="img/csumb-logo.png">
            </footer>
            
    </body>
</html>