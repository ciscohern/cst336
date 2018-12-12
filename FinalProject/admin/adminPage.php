<?php
session_start();



include '../../inc/dbConnection.php';
$dbConn = startConnection("sneaker_store");

include '../inc/functions.php';
validateSession();

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <style>
            form {
                display: inline-block;
            }
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        
        <script>
        
            function confirmDelete() {
                
                //alert();
                //prompt();
                return confirm("Are you sure you want to delete?");
                
            }
            function openModal(){
                $('#myModal').modal("show");
            }
            
            
        </script>
         <script>

            
            function AjaxCount() {
	            $.ajax({
                    type: "GET",
                    url: "../api/countAPI.php",
                    // dataType: "json",
                    data: { "productId": $(this).attr('productId') },
                    success: function(msg) {
                        // $("#result").html(msg + " records");
                        alert( "Total Records:" + msg );
                        //return message("Total: " + msg );
                       
                    },
	            }); 
            }
            
            function AjaxAvg() {
	            $.ajax({
                    type: "GET",
                    url: "../api/avgAPI.php",
                    // dataType: "json",
                    data: { "price": $(this).attr('price') },
                    success: function(msg) {
                        // $("#result").html(msg + " records");
                        alert( "Average Price:" + msg);
                        //return message("Total: " + msg );
                       
                    },
	            }); 
            }
            
            function AjaxMax() {
	            $.ajax({
                    type: "GET",
                    url: "../api/maxAPI.php",
                    // dataType: "json",
                    data: { "price": $(this).attr('price') },
                    success: function(msg) {
                        // $("#result").html(msg + " records");
                        alert( "Max Price:" + msg);
                        //return message("Total: " + msg );
                       
                    },
	            }); 
            }
            
	          
	        $(document).ready(AjaxCount);
            $(document).ready(AjaxAvg);
            $(document).ready(AjaxMax);
        </script>
    
    </head>
    <body>
        
        <h1 class="jumbotron"> ADMIN SECTION - "Sold Out" </h1>
        
         <form action="logout.php">
              <input class="btn btn-info" type="submit" value="Logout">
          </form>
          
          <br><br>
           <div class="btn-group" >
           <button onclick="AjaxCount();" class="btn btn-secondary"><span>Total Records </span></button>
           
            <button onclick="AjaxAvg();" class="btn btn-dark"><span>Average Price </span></button>
          
            <button onclick="AjaxMax();" class="btn btn-secondary"><span>Max Price</span></button>
           
           </div>
           <br><br>
        <?php  
            echo "<form action='addSneaker.php'>";
            echo "<input type='hidden' name='sneakerId' value='".$record['id']."'>";
            echo "<button type='submit' class='btn btn-primary'>Add</button>";
            echo "</form>";
        ?>

           <br><br>
        
        <?= displayAllProducts(); ?>
        

        
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Product Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <iframe name = "productModal" width = "450" height = "250"></iframe>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
              </div>
            </div>
          </div>
        </div>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
    </body>
</html>