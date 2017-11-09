<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <style>
            .col {
                text-align: center;
            }
        </style>
    </head>
    <body>
        
        <?php
        
        // INNER JOIN EXAMPLE
        $sql = "SELECT  ch.`charge_id`, 
                        ch.`name` AS  'charge_name', 
                        c.`case_id` ,  
                        c.name AS  'case_name', 
                        ct.`id` AS 'charge_type_id', 
                        ct.`name` AS 'charge_type_name', 
                        cs.id AS 'charge_severity_id', 
                        cs.`name` AS 'charge_severity_name',
                        v.`name` AS 'victim_name',
                        a.`name` AS 'accused_name'
                FROM `charge` AS ch
                INNER JOIN `case` AS c ON ch.case_id = c.case_id
                INNER JOIN `charge_type` AS ct ON ct.id = ch.charge_type_id
                INNER JOIN `charge_severity` AS cs ON ct.charge_severity_id = cs.id
                INNER JOIN `victim` AS v ON ch.victim_id = v.victim_id
                INNER JOIN `accused` AS a ON ch.accused_id = a.accused_id
                ";
        
        $headers = ["Case", "Charge", "Severity", "Type", "Victim", "Accused"];
        $columns = ["case_name", "charge_name", "charge_type_name", "charge_severity_name", "victim_name", "accused_name"];

        // Closures: example 2 in http://php.net/manual/en/language.types.callable.php
        connectAndSelect($sql, $headers, $columns, function($stmt) {
            $count = $stmt->rowCount();
            echo "<h1>";
            echo "Charges Filed and Completed ($count records)"; 
            echo "</h1>";
        });


        // LEFT OUTER JOIN EXAMPLE
        $sql = "SELECT  ch.`charge_id`, 
                        ch.`name` AS  'charge_name', 
                        c.`case_id` ,  
                        c.name AS  'case_name', 
                        ct.`id` AS 'charge_type_id', 
                        ct.`name` AS 'charge_type_name', 
                        cs.id AS 'charge_severity_id', 
                        cs.`name` AS 'charge_severity_name',
                        v.`name` AS 'victim_name',
                        a.`name` AS 'accused_name'
                FROM `charge` AS ch
                INNER JOIN `case` AS c ON ch.case_id = c.case_id
                LEFT JOIN `charge_type` AS ct ON ct.id = ch.charge_type_id
                INNER JOIN `charge_severity` AS cs ON ct.charge_severity_id = cs.id
                INNER JOIN `victim` AS v ON ch.victim_id = v.victim_id
                LEFT JOIN `accused` AS a ON ch.accused_id = a.accused_id
                ";
        
        $headers = ["Case", "Charge", "Severity", "Type", "Victim", "Accused"];
        $columns = ["case_name", "charge_name", "charge_type_name", "charge_severity_name", "victim_name", "accused_name"];

        // Closures: example 2 in http://php.net/manual/en/language.types.callable.php
        connectAndSelect($sql, $headers, $columns, function($stmt) {
            $count = $stmt->rowCount();
            echo "<h2>";
            echo "Charges Filed and Incomplete ($count records)"; 
            echo "</h2>";
        });

        // LEFT OUTER JOIN EXAMPLE
        $sql = "SELECT 
                    COUNT(*) AS 'CountOfAll', 
                    COUNT(c.case_id) AS 'CountOfCases', 
                    COUNT(ct.charge_severity_id) AS 'CountOfSeverity', 
                    COUNT(ch.accused_id) AS 'CountOfAccused', 
                    ct.name AS 'TypeName'
                FROM `charge` AS ch
                INNER JOIN `case` AS c ON ch.case_id = c.case_id
                LEFT JOIN `charge_type` AS ct ON ct.id = ch.charge_type_id
                GROUP BY ct.name
                ORDER BY ct.name
                ";
        
        $headers = ["Type", "Total Charges", "on # Cases", "# w/ Severity", "# w/ Accused"];
        $columns = ["TypeName", "CountOfAll", "CountOfCases", "CountOfSeverity", "CountOfAccused"];

        // Closures: example 2 in http://php.net/manual/en/language.types.callable.php
        connectAndSelect($sql, $headers, $columns, function($stmt) {
            $count = $stmt->rowCount();
            echo "<h3>";
            echo "Counts of Filings By Severity Name ($count records)"; 
            echo "</h3>";
        });

    ?>
    

    </body>
</html>

<?php

function connectAndSelect($sql, $headers, $columns, $echoTitle) {
    $dbHost = getenv('IP');
    $dbPort = 3306;
    $dbName = "crime_tips";
    $username = getenv('C9_USER');
    $password = "";
    
    $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    $stmt = $dbConn -> prepare ($sql);
    //$stmt -> execute (  array ( ':id' => '1')  );
    $stmt -> execute ();

    $echoTitle($stmt);

    echo "<table><thead>";
    foreach ($headers as $header) {
        echo "<th>$header</th>";
    }
    echo "</thead><tbody>";
    
    while ($row = $stmt -> fetch())  {
        echo "<tr>";
        foreach ($columns as $column) {
            $value = $row[$column];
            echo "<td class='col'>$value</td>";
        }
        echo "</tr>";
    }
    echo "</tbody></table>";
}
?>