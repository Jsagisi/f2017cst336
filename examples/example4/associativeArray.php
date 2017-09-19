<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <?php
        
        $cards = array();
        
        $card1["suit"] = "Hearts";
        $card1["value"] = "10";
        $cards[] = $card1;
        
        $card2["suit"] = "Hearts";
        $card2["value"] = "9";
        
        $card3["suit"] = 
        array_push($cards, $card2);
        
        
        foreach($cards as $card) {
            foreach($card as $key=> $value) {
                echo "$key = $value<br />";
            }
        }
        
        for ($i=0; $i < 1000; $i++){
            echo "<br /> this is the first key: " . $cards[0][0];
        }
        
        
        ?>

    </body>
</html>