<?php
   session_start();
   
   if (!isset($_SESSION["username"])) {
    header("Location: login.html"); 
   }
   
    include 'inc/functions.php';
    $conn = getDBConnection("tech_checkout");

   
    
    function addUser(){
       global $conn;
       $sql = "INSERT INTO user (
                userId,
                firstName,
                lastName,
                email,
                phone,
                role,
                deptId
                )
                VALUES (
                :userId, :fName, :lName, :email, :phone, :role, :deptId
                )";
    $nameOfarray = array() ;
    $nameOfarray[':userId']= $_GET['userId'];
    $nameOfarray[':fName'] = $_GET['userFirstName'];
    $nameOfarray[':lName'] = $_GET['userLastName'];
    $nameOfarray[':email'] = $_GET['email'];    
    $nameOfarray[':phone'] = $_GET['phone'];
    $nameOfarray[':role'] = $_GET['role'];    
    $nameOfarray[':deptId'] = $_GET['department'];
    
    $stmt = $conn -> prepare ($sql);
    $stmt -> execute($nameOfarray);
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Add New User </title>
    </head>
    <body>
        
        <h1> Add New User</h1>
        
        <form>
            
            User Id: <input type="text" name="userId" />
            <br>
            First Name: <input type="text" name="userFirstName" />
            <br/>
            Last Name: <input type="text" name="userLastName" />
            <br/>
            Email: <input type="email" name="email"/>
            <br/>
            Phone: <input type="tel" name="phone"/>
            <br/>
            Role: <select name="role">
                <option value="Student">Student</option>
                <option value="Faculty">Faculty</option>
                <option value="Staff">Staff</option>
            </select>
            <br />
            Department:
                <select name="department">
                <?php 
                    $departments = getDepartments();
                    foreach($departments as $department){
                        echo "<option value='" . $department['departmentId']. "'>" . $department['deptName'] . "</option>";
                    }
                ?>
                
                </select>
                <input type="submit" name="Submit"> 
           
        </form>
    <?php
        if (isset($_GET['Submit'])){
            //echo "form was submitted";
            addUser();
            echo "The user was added sucessfully";
        }
    ?>
    </body>
</html>