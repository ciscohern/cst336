<?php
include '../inc/dbConnection.php';
$dbConn = startConnection("sneaker_store");

function getAllStreet(){
    global $dbConn;
    
    $sql = "SELECT * FROM streetwear ORDER BY brand";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
    return $records;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> "Sold Out" </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <style>
        @import url('css/styles.css');
            body {
                text-align: center;
            }
        </style>
   
    </head>
    <body>
	  <?php 
	    include 'inc/header.php';
	    
	  ?>

	  <?php
	    $inventory = getAllStreet();
	    foreach($inventory as $inventory) {
	        echo "<div>";
        	echo "<h3><a onclick=\"MoreInfo(" . $inventory['id'] .")\">". $inventory['brand'] ." " . $inventory['model']." </a></h3><br />";
	        // echo "<ul>" ."<h3 href='#' class = 'inventoryLink' name = 'sneakerId' id = 'sneakerId'>". $inventory['brand'] ." " . $inventory['model']." </h3>" ." ";
	        // echo "<input style='display:none' value='". $inventory['shoeID'] ."' id='sID' readonly></input>";
	        echo "<a><img class = 'inventoryLink' src = " . $inventory['image'] . "width = 200 height = 200></a><br />";
	        echo "<h4 class = 'inventoryLink'> Price $".$inventory['price']."</h4>";
	        echo "</div>";
	        echo"<br />";
	    }
	  ?>
		  <!-- Button trigger modal -->
	  <script>
	    
	      $('document').ready(function() {
	      }); // doc end
      	function MoreInfo(id){
            $.ajax({
                type: "GET",
                url: "api/getStreetInfo.php",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: { "streetId": id },
                success: function(data) {
                    $("#sneakername").text(data.model);
                    $("#description").text(data.description);
                    $("#sneakerPrice").text('Price: $' + data.price);
                    $("#sneakerColor").text('Colorway: ' + data.colorway);
                },
                fail: function(msg)
                {
                    alert('fail');
                },
                complete: function(msg)
                {
                    //alert(msg.responseText+"complete");
                }
	          }); // ajax closing
	          $('#sneakerModal').modal("show");
          };
	  </script>

<!-- Modal -->
<div class="modal fade" id="sneakerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sneakername"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="container"></div>
        <div>
	      <h5><div>Description: </div></h5>
	      <h6><div id="description"></div></h6>
	      <h9><div id = "sneakerColor"></div></h9>
	      <h8><div id = "sneakerPrice"></div></h8>
	  
	      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        <?php
        include 'inc/footer.php';
        ?>
        </body>
</html>