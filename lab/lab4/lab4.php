<?php

include 'ledLetters.php';

 function led($word, $color) {
     global $colorPerCell, $colorPerWord;
     $result = array();
     $seperate_word = strtok($word,' ');
     while ( $seperate_word !== false){
         $result[] = $seperate_word;
         $seperate_word = strtok(' ');
     }
     
      if ($colorPerCell == "y") {
          
          $color = "rainbow";
          
      }
      
      
      for ($j = 0; $j < count($result); $j++){
             $final_word = $result[$j];
          
          if ($colorPerWord == true){
              
             $color = $colorPerWord[$j];
          
            }
            
          for ($i = 0; $i < strlen($final_word); $i++ ) {
              {
            
              drawLetter($final_word[$i],$color);
              
              }
              
          }
          echo '<br>';
      }
      
}

$message = $_GET['message'];
$color = $_GET['color'];
$colorPerCell = $_GET['colorPerCell'];
$colorPerWord = $_GET['colorPerWord'];




function displayOrHideForm() {

     //  isset() checks whether a form element is part of the URL
    
   if (isset($_GET['submitForm'])) { //checks whether the form has been submitted
       
        if (isset($_GET['displayForm'])) {
            
            return "block";
            
        }
        
        return "none";
   }
    
}


function isFormValid() {
    
   if (isset($_GET['submitForm'])) { //checks whether the form has been submitted
    
        if (empty($_GET['message'])) {
            
            echo "Name shouldn't be blank!";
            return false;
            
        }
        elseif(empty($_GET['colorPerCell'])){
            echo "Please select option for Different Color per Cell";
            return false;
        }
        elseif(strlen($_GET['message']) > 15){
            echo "Please enter something less than 16 characters long.";
            return false;
        }
        
        
        return true;
 
  }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4: Custom LED Board</title>
        <style>
            @import url("css/style.css");
            
            table {
                border: 0px !important;
            }
            
            form {
                
                display: none; /* Hides form */  
                display: block; /* Shows form */                  
                
                display: <?=displayOrHideForm()?>;
                
            }
        </style>
    </head>
    <body>
    <div id="wrapper"> 
    <h1>Custom LED Board</h1>

        <form method="GET">
          Message: <input type="text" name="message" size="25" maxlength="25" placeholder="Type message" value="">
          <br /><br />
          Select a color: 
          
          <select name="color">
              <option value="#F8FAB9"> Yellow </option>    
              <option value="#B9FACA" selected> Green </option>    
              <option> Blue </option>    
              <option> Red  </option>    
          </select>
          
          <br /> <br />
          
          Display Different Color per Cell: 
          <input type="radio" name="colorPerCell" value="y" id="cpcYes"><label for="cpcYes"> Yes </label>
          <input type="radio" name="colorPerCell" value="n" id="cpcNo"> <label for="cpcNo">  No </label>
          
          <br /> <br />
          
          <input type="checkbox" name="displayForm" id="displayForm" checked/><label for="displayForm"> Display Form Again </label>
          
           <br /> <br />
          
          Display custom colors per word:
          (Enter colors names or hexadecimal values)
           <br /> <br />
           
           <input type="text" name="colorPerWord[]"/>
           <input type="text" name="colorPerWord[]"/>
           <input type="text" name="colorPerWord[]"/>
          
          <input type="submit" value="Display LED!" name="submitForm"/> 
          
          </form>
          
          <br />
          
          <?php
          
           if (isFormValid()) {
               
               led($message, $color);
          
           }
          ?>
          
          <footer>

            2017 &copy; Jason Sagisi.

            <br/>
            <img src ="img/csumb-logo.png">
            </footer>
        </div>
    </body>
   
</html>