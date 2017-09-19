
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <table>
                <?php 
                    $message = "this is a message";
                    $is_even = $number % 2 == 0;
                    $is_odd = $number %2 == 1;
                    $sum = 0;
                    $average = 0;
                    for ($i=0; $i<9; $i++){
                        $number = rand(1,10000);
                        echo "<td>" . $number . "</td>";
                        $sum += $number;
                        if($is_even == true){
                            echo "Even";
                        }
                        if($is_odd == true){
                            echo "Odd";
                        }
                        
                        if($i==9){
                            $average = $sum/9;
                            echo "Sum = ".$sum;
                            echo "<br>";
                            echo "Average = " . $average;
                        }
                    }
                    
                    function isEven($number){
                        return ($number % 2 ==0) ? "even" : "odd";
                    }
                ?>
        </table>

    </body>
</html>