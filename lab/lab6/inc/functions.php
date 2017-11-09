<?php
function generateBase62String($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        // Using rand for simplicity, but use random_int as described in flowerbox
        // for more secure implementation

        $randomInt;
        if (version_compare(PHP_VERSION, '7.0.0', '<') ) {
            $randomInt = mt_rand(0, $max);
        }
        else {
            $randomInt = random_int(0, $max);
        }
        $str .= $keyspace[$randomInt];
    }
    return $str;
}
function getDepartments()
    {
        global $conn;
        $sql = "SELECT departmentId, deptName FROM department ORDER BY deptName";
        $stmt = $conn -> prepare ($sql);
        $stmt -> execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($records);
        return $records;
    }
function getUserInfo($userId){
        global $conn;
        $sql = "SELECT * FROM user WHERE userId = $userId";
        $stmt = $conn -> prepare ($sql);
        $stmt -> execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record;
    }
?>