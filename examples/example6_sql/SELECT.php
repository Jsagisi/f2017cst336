<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <?php
        $dbHost = getenv('IP');
        $dbPort = 3306;
        $dbName = "my_first_db";
        $username = getenv('C9_USER');
        $password = "";
        
        $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        // BASIC SELECT
        echo  "BASIC SELECT<br />";
        $sql = "SELECT studentId, name, departmentId FROM student";
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute ();

        while ($row = $stmt -> fetch())  {
            echo  $row['studentId'] . ", " . $row['name'] . ", " . $row['departmentId'] . "<br />";
        }

        // BASIC JOIN SELECT
        echo  "<br />BASIC SELECT<br />";
        $sql = "SELECT studentId, s.name AS 'studentName', 
                        s.departmentId, d.name AS 'departmentName' 
                FROM student s INNER JOIN 
                     department d ON s.departmentId = d.departmentId";
        $stmt = $dbConn -> prepare ($sql);
        //$stmt -> execute (  array ( ':id' => '1')  );
        $stmt -> execute ();

        while ($row = $stmt -> fetch())  {
            echo  $row['studentId'] . ", " . $row['studentName'] . ", " . $row['departmentId'] . ", " . $row['departmentName'] . "<br />";
        }

        // BASIC PARAMETER SELECT
        echo  "<br />BASIC SELECT<br />";
        //$sql = " SELECT * FROM table_name WHERE id = :id ";
        $sql = "SELECT studentId, s.name AS 'studentName', 
                        s.departmentId, d.name AS 'departmentName' 
                FROM student s INNER JOIN 
                     department d ON s.departmentId = d.departmentId
                WHERE s.studentId = :id";
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute (array(':id' => 4));

        while ($row = $stmt -> fetch())  {
            echo  $row['studentId'] . ", " . $row['studentName'] . ", " . $row['departmentId'] . ", " . $row['departmentName'] . "<br />";
        }

        // WHERE IN SELECT
        echo  "<br />WHERE IN SELECT<br />";
        
        $params = array(1, 4, 7, 9);
        $placeholders = implode(',', array_fill(0, count($params), '?'));
        
        //$sql = " SELECT * FROM table_name WHERE id = :id ";
        $sql = "SELECT studentId, s.name AS 'studentName', 
                        s.departmentId, d.name AS 'departmentName' 
                FROM student s INNER JOIN 
                     department d ON s.departmentId = d.departmentId
                WHERE s.studentId IN ($placeholders)";
                // WHERE s.studentId IN (1, 4, 7, 9)";
                // WHERE s.studentId IN (:id1, :id2, :id3, :id4)";
                // WHERE s.studentId IN (?, ?, ?, ?)";
                
        //var_dump($sql);
                
        $stmt = $dbConn -> prepare ($sql);
        $stmt -> execute ($params);
        
        printRow($stmt);
        // while ($row = $stmt -> fetch())  {
        //     echo  $row['studentId'] . ", " . $row['studentName'] . ", " . $row['departmentId'] . ", " . $row['departmentName'] . "<br />";
        // }
        
        function printRow($sqlStmt) {
            while ($row = $sqlStmt -> fetch())  {
                var_dump($row);
                $text = "";
                foreach($row as $key => $value) {
                    if (!empty($text)) {
                        $text .= ",";
                    }
                    $text .= $value; // or $row[$key]
                }
                $text .= "<br />";
                
                echo $text;
            }
        }

        ?>
    </body>
</html>