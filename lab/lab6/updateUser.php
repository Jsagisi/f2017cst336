<?php

session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.html");
}
    include 'inc/functions.php';
    $conn = getDBConnection("tech_checkout");
    
    
if(isset($_GET['Submit'])){
    $sql = "UPDATE user
            SET firstName = :fName,
                lastName = :lName,
                email = :email,
                phone = :phone,
                role = :role,
                deptId = :deptId
            WHERE userId = :id";    
    $np = array();
    $np[':id'] = $_GET['userId'];
    $np[':fName'] = $_GET['userFirstName'];
    $np[':lName'] = $_GET['userLastName'];
    $np[':email'] = $_GET['email'];
    $np[':phone'] = $_GET['phone'];
    $np[':role'] = $_GET['role'];
    $np[':deptId'] = $_GET['deptId'];
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    
    echo "Successfully updated!";
    header("Location: admin.php");
}

if(isset($_GET['userId'])) {
    global $userInfo;
   $userInfo = getUserInfo($_GET['userId']);
  
   
   
}

    function selectRole($role){
        global $userInfo;
        if (strtoupper($userInfo['role']) == strtoupper($role)) {
            return "selected";
        }
        
    }
    function selectDepartment($deptId){
        global $userInfo;
        if ($userInfo['deptId'] == $deptId) {
            return "selected";
        }
        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <fieldset>
            <legend> Update User Form </legend>
            <form method="GET">
            User Id: <input type="text" name="userId" value="<?=$userInfo['userId']   ?>"/>
                <br>
                First Name: <input type="text" name="userFirstName" value="<?=$userInfo['firstName']?>"/>
                <br/>
                Last Name: <input type="text" name="userLastName" value="<?=$userInfo['lastName']?>"/>
                <br/>
                Email: <input type="email" name="email" value="<?=$userInfo['email']?>"/>
                <br/>
                Phone: <input type="tel" name="phone" value="<?=$userInfo['phone']?>"/>
                <br/>
                Role: <select name="role">
                    <option value="Student" <?=($userInfo['role']=="student")?' selected':'' ?> >Student</option>
                    <option value="Faculty" <?= selectRole('Faculty')?> >Faculty</option>
                    <option value="Staff"   <?= selectRole('Staff')?>>Staff</option>
                </select>
                <br/>
                Department:
                <select name="department">
                           <option value="">Select One</option>
                           <?php
                              $departments = getDepartments();
                              foreach ($departments as $department) {
                                  echo "<option selectDepartment('department['departmentId']) value ='" . $department['departmentId']. "'>" . $department['deptName']    ." </option>";
                              }
                              
                            ?>
                         </select>
                         
                <br/>
                <input type="submit" name="Submit" value="Submit">
                
                
                
            </form>
        </fieldset>

    </body>
</html>