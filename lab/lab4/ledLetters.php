<?php
function drawLetter($letter, $color) {
	$letter = strtoupper($letter);
	echo "<table border = 1>";
	for ($i = 0; $i < 8; $i++) {//Controls rows
		echo "<tr>";
		for ($j = 0; $j < 8; $j++) {//Controls columns
            $colorToDisplay = "yellow";
		    $letterToDisplay = "";
			switch($letter) {
				case "A" :
					if ($j == 0 || $j == 7 || $i == 0 || $i == 3) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "B" :
					if (1) 
					{
						if($i==1||$i==3||$i==4||$i==6||$j==0||$j==1||$j==6||$i==0&&$j==2||$i==0&&$j==3||$i==0&&$j==4||$i==0&&$j==5||$i==0&&$j==6
						||$i==1&&$j==7||$i==2&&$j==7||$i==3&&$j==7||$i==4&&$j==7||$i==5&&$j==7||$i==6&&$j==7||$i==7&&$j==2||$i==7&&$j==3||$i==7&&$j==4
						||$i==7&&$j==5)
						{
							$colorToDisplay = $color;
							$letterToDisplay = $letter;
						}
					}
				
					break;
				case "C" :
					if (($i == 0 && $j > 1)||($i == 1 && $j == 1)||($i > 1 && $i < 6 && $j == 0)||($i == 6 && $j == 1)||($i == 7 && $j > 1)) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}					
					break;
				case "D" :
					if ((($i==0 || $i==7) && $j < 7) || ($j==0) || (($j==7) && (($i<7) && ($i>0)))) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "E" :
					if ($i == 0 || $i == 3 || $i == 7 || $j == 0) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}					
					break;
				case "F" :
					if (1) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}	
					break;
				case "G" :
					if (($j >= 3 && $j <= 6 && $i == 0)
						|| ($j == 2 && $i == 1)
						|| ($j == 1 && $i == 2)
						|| ($j == 0 && $i == 3)
						|| ((($j == 0) || ($j >= 4 && $j <= 7)) && $i == 4)
						|| (($j == 1 || $j == 6) && $i == 5)
						|| (($j == 2 || $j == 5) && $i == 6)
						|| ($j >= 3 && $j <= 4 && $i == 7)) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "H" :
					if ($j==0||$j==1||$j==6||$j==7||$i==3) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "I" :
					if ($j == 3 || $j == 4) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "J" :
					if (($i == 0 && $j < 4) || ($i == 6 && $j == 8) || ($i == 6 && $j == 1) || ($i == 5 && $j == 0) || ($i == 7 && $j == 2) || ($i == 7 && $j == 4) || ($j == 4) || ($i == 7 && $j == 3)) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}					
					break;
				case "K" :							      //$i rows   $j col
					if( ($j == 0) ||				      //col0
						($j == 1) ||					  //col1
						($i == $j)&&($i > 2)&&($j > 3) || //bottom leg, top diagonal 
					    ($i-1  == $j) ||			      //bottom leg, bottom diagonal 
						(7-$i  == $j+1 ) || 		      //top leg, to diagonal
						(7-$i  == $j)&&($i < 4)           //top leg, bottom diagonal
						){
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "L" :
					if (($i == 7 || $j == 0) || ($i == 6 || $j == 1)) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "M" :
					if (($j == 0 || $j == 1) || ($j == 6 || $j ==7)) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					if(($j == 2 && $i == 2) || ($j == 5 && $i == 2)) {
							$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					if(($j == 2 && $i == 3) || ($j == 5 && $i == 3)) {
							$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					if(($j == 3 || $j == 4))
					{
						if($i == 3 || $i == 4 || $i == 5)
						{
							$colorToDisplay = $color;
							$letterToDisplay = $letter;
						}
					}
					break;
				case "N" :
					if ($j==0||$j==7||$i==$j) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "O" :
					if ($i <= 1 || $i >= 6 || $j <= 1 || $j >= 6) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "P" :
					if (($j == 0 || $j == 1 || $i == 0 || $i==3) || (($i == 1 && $j == 7) || ($i == 2 && $j == 7))) {
						if(!($i == 0 && $j == 7 ) && !($i == 3 && $j == 7 )){
							$colorToDisplay = $color;
							$letterToDisplay = $letter;
						}
					}					
					break;
				case "Q" :
					if ($i <= 1 || $i >= 6 || $j <= 1 || $j >= 6) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "R" :
					if (($i==0 || $i==1) || ($j==0 || $j==1) || (($j==6 || $j==7) && $i<4) || (($i==4)&&$j<6) || ($i>4 && ($j == 5 || $j == 6))) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "S" :
					if ($i == 0 || $i == 3 || $i == 4 || $i == 7 || 
						($i == 1 && $j == 0) || ($i == 2 && $j == 0) || 
						($i == 5 && $j == 7) || ($i == 6 && $j == 7)) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "T" :
					if ($i == 0 || $j == 3 || $i == 1 || $j == 4) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "U" :
					if (1) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
				case "V" :
					if($j == floor($i/2) || $j == 7-floor($i/2)) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "W" :
					if (($i < 6 && $j == 0) || ($i < 6 && $j == 7) || ($i <= 6 && $j == 1) || ($i <= 6 && $j == 6) || ($i >= 6 && $j == 2) || ($i >= 6 && $j == 5) || ($i > 2 && $i != 7 && $j == 3) || ($i > 2 && $i != 7 && $j == 4)) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "X" :
					if (($i == $j)&&($i > 2)&&($j > 3) || //top right diagonal 
						(7-$i  == $j)&&($i < 4)||
						($i == $j) ||
						(7-$i == $j)){
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "Y" :
					if ($j == 3  || $j == 4)
					{
						if($i != 0 && $i != 1 && $i != 2 && $i != 3)
						{
							$colorToDisplay = $color;
							$letterToDisplay = $letter;
						}
					}
					if(($i == $j || $i == $j + 1) && $i < 5)
					{
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					if(($i + $j == 7 || $i + $j == 8) && $i < 5)
					{
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "Z" :
					if ($i==0 || $i==7 || $j==7-$i) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;					
				case "!" :
					if (($j == 3 || $j == 4) && ($i != 6)) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "?" :
					
					if (
						($i == 0 && ($j > 0 && $j < 7)) ||
						(($i == 1 || $i == 2) && ($j < 2 || $j > 5)) ||
						($i == 3 && ($j > 4 && $j < 7)) ||
						($i == 4 && ($j > 3 && $j < 6)) ||
						($i == 5 && ($j > 2 && $j < 5)) ||
						($i == 7) && ($j > 2 && $j < 5)
						
					){
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
 				case "0" :
					if ($i == 1 && $j == 6 || $i == 2 && $j == 5 || $i == 3 && $j == 4 || $i == 4 && $j == 3 || $i == 5 && $j == 2 || $i == 6 && $j == 1) {

						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					
					}
					else if(  $i == 0 && $j == 2 ||  $i == 0 && $j == 3 ||  $i == 0 && $j == 4 ||  $i == 0 && $j == 5  || $i == 7 && $j == 2 ||  $i == 7 && $j == 3 ||  $i == 7 && $j == 4 ||  $i == 7 && $j == 5 )
					{
						
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					
					}
					else if(  $i == 0 && $j == 2 ||  $i == 0 && $j == 3 ||  $i == 0 && $j == 4 ||  $i == 0 && $j == 5  || $i == 7 && $j == 2 ||  $i == 7 && $j == 3 ||  $i == 7 && $j == 4 ||  $i == 7 && $j == 5 )
					{
						
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					else if($i == 1 && $j == 1 || $i == 2 && $j == 1 || $i == 3 && $j == 1 || $i == 4 && $j == 1 || $i == 5 && $j == 1 || 
					$i == 6 && $j == 6 || $i == 5 && $j == 6 || $i == 4 && $j == 6 || $i == 3 && $j == 6 || $i == 2 && $j == 6 )
					{
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
						
					}
					else if($i == 1 && $j == 1 || $i == 2 && $j == 1 || $i == 3 && $j == 1 || $i == 4 && $j == 1 || $i == 5 && $j == 1 || 
					$i == 6 && $j == 6 || $i == 5 && $j == 6 || $i == 4 && $j == 6 || $i == 3 && $j == 6 || $i == 2 && $j == 6 )
					{
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
						
					}
					break;					
				case "1" :
					if ( ($i == 1 && ($j < 3 && $j > 0 )) || ($i == 2 && $j < 2) || ($i == 0 && $j == 2) || ($j>2 && $j < 5) || ($i>6) ) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "2" :
				//if ($i == 0 || $i == 1 || $j > 5 && $i <5 || $i ==3 || $i == 4 || $j < 2 && i >3 || $i == 7 || $i == 6 || $i== 5 && $j <2)
					if(!($i==2  && $j<6) && !($i ==5 && $j > 1)){
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}					
					break;
				case "3" :
					if (($i != 1 && $i != 2 && $i != 5 && $i !=6) || ($j == 7) ){//top row
						//decreased by one condition
						//colors and nums Jose Sainz
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
						
						
						
					}
					
					break;
				case "4" :
					if (1) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
					case "5" :
					
						if ($i==0||$i==7) 
						{
							$colorToDisplay = $color;
							$letterToDisplay = $letter;
						}
						if($j==0 && $i<4)
						{
							$colorToDisplay = $color;
							$letterToDisplay = $letter;
						}
						if($j==7 && $i>4)
						{
							$colorToDisplay = $color;
							$letterToDisplay = $letter;
						}
						if($i==4)
						{
							$colorToDisplay = $color;
							$letterToDisplay = $letter;
						}
						
					break;

				case "6" :
					if (($j== 0 || $j == 1) ||
					   ($i == 0 || $i == 1 || $i == 3 || $i == 4 || $i == 6 || $i == 7) || 
						(($i == 5 || $i ==4 ) && ($j==7 || $j == 6))) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "7" :
					if ($i == 0 || (($i + $j) == 8)) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}					
					break;
				case "8" :
					if (($j == 0 || $j==1) || ($i ==0 || $i ==1)) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					elseif(($j ==7 ||$j ==6) || ($i == 6 || $i ==7)){
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					} 
					
					elseif($i == 3 || $i ==4){
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case "9" :
					if ($j == 7 ||$i == 0 || ($j == 0 && $i <= 4 ) || $i == 4) {
						$colorToDisplay = $color;
						$letterToDisplay = $letter;
					}
					break;
				case ":" :
					if(($j == 3 && $i == 0) || ($j == 4 && $i == 0) || ($j == 3 && $i == 1) || ($j == 4 && $i == 1) || ($j == 3 && $i == 7) || ($j == 4 && $i == 7) || ($j == 3 && $i == 6) || ($j == 4 && $i == 6)){
					$colorToDisplay = $color;
					$letterToDisplay = $letter;
					} else {
					$colorToDisplay = "#FFF";
					$letterToDisplay = $letter;
				}
			}  //endSwitch
			
			if ($colorToDisplay == "rainbow") {
				
			   $colorToDisplay = "rgb(" . rand(0,255) . ", " . rand(0,255) . ", " . rand(0,255) .")";	
				
			}
			
			
			echo "<td style = 'background-color:$colorToDisplay'>";
			echo $letterToDisplay;
			echo "</td>";
			
		} //endFor columns
		echo "</tr>";
	} //endFor rows
	echo "</table>";
}
?>