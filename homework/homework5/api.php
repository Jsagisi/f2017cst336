<!DOCTYPE html>
<html>
    <head>
        <title> Assignment 5 example </title>
        
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
        <script>
            
            function searchProducts(){
                $("#products").html(""); //clears data retrieved from API
                //http://api.walmartlabs.com/v1/search?apiKey=stnxdj4tfp7vp9nkkzxj3nda&query=xbox&categoryId=3944&sort=price&ord=asc
                
                $.ajax({
                type: "get",
                url: "https://api.walmartlabs.com/v1/search",
                dataType: "jsonp",
                data: { "apiKey":"stnxdj4tfp7vp9nkkzxj3nda",
                         "query":  $("#product").val(),
                         "sort" : "price"
                },
                success: function(data,status) {
                    //alert(data.totalResults);
                    for (var i=0; i<data.items.length; i++){
                        $("#products").append(data.items[i].name + "<br>");
                        $("#products").append("<img src="+data.items[i].mediumImage + "  width='200'><br><hr>");
                    }
                  },
                  complete: function(data,status) { //optional, used for debugging purposes
                      //alert(status);
                  }
           });//AJAX   
           
           
           
            $.ajax({
                type: "get",
                url: "update_api_stats.php",
                dataType: "jsonp",
                data: { "query":  $("#product").val(),
                        
                },
                success: function(data,status) {
                    //alert(data.totalResults);
                    for (var i=0; i<data.items.length; i++){
                       $("#products").append(data.items[i].name + "<br>");
                       $("#products").append("<img src="+data.items[i].mediumImage + "  width='200'><br><hr>");
                    }
                  },
                  complete: function(data,status) { //optional, used for debugging purposes
                      //alert(status);
                  }
           });//AJAX
                
            }
            
        </script>
        
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            
            <!-- Optional theme -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
            
            <!-- Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
    </head>
    <body>
        
        <h1> API Search</h1><span class="label label-default"></span>
        
        
            
            Product: <input type="text" id="product">
            <input type="button" onclick="searchProducts()" value="Search Products">
            <br>
            <br>
        

        <div id="products">
            
        </div>
    </body>
</html>