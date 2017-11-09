<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        
    </head>
    <body>
        
        
        <script type ="text/javascript">
            //Declare a variable
            var firstName;
            firstName = "Jason";
            
            //Initialize a variable
            var lastName = "Henderson";
            
            //Initialize a Date
            var now = new Date();
            
            //Initialize a Number
            
            var age = 45
            
            //Initialize a real
            
            var grade = 45.87
            
            //ARRAY
            
            var students = []
            var classes = new Array()
            
            //Add to array
            
            students.push("Edith")
            students.push("Matthew")
            //classes[] = "336"
            console.log("Students", students)
            //Delete from array
            //Start at 0, delete 1 from there
            students.splice(0, 1)
            console.log("Students: (After Delete)", students)
            //Insert into array
            //Start at 0, Delete 0, insert "Billy"
            students.splice(0,0, "Billy")
            console.log("Students: (After Insert)", students)
            
            //Functions
            
            print("Working", null)
            
            function print(arg1, arg2, arg3){
                console.log("Printing", arg1, arg2, arg3)
                
            }
            
            var printer = function() {
                console.log("print this!")
            }
            
            printer()
            
            //Declare an object
            var students = {
                "name" : "Edith",
                "seat" : "15",
                "year" : 1,
                "register" : function(c) {
                    console.log("registered!")
                }
            }
            
            students.register()
            
            console.log(students)
            
            //"Static functions", i.e prototype
            //Prototype: https://www
            
            //Fun Example
            
            var twister = function(thing) {
                return {
                    "food" : thing,
                    "eat" : function(what) {
                        console.log(uhoh(what))
                        return function(something){
                            console.log("something", something)
                        }(thing)
                    }
                    
                }
                //this function visible inside twister only
                    function uhoh(param1) {
                        console.log(param1)
                    }
            }
            //does not work
            //uhoh("test")
            var twisted = twister("banana")
            console.log(twister)
        
            
            twister(function()){
                return function() {
                    return "orange"
                }
            }())
        </script>
    </body>
</html>