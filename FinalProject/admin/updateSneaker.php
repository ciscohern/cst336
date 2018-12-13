<?php
session_start();

include '../../inc/dbConnection.php';
$dbConn = startConnection("sneaker_store");
//include '../inc/functions.php';
//validateSession();

if (isset($_GET['updateProduct'])){  //user has submitted update form
    $sneakerName = $_GET['sneakerName'];
    $description =  $_GET['sneakerDesc'];
    $price =  $_GET['sneakerPrice'];
    $category = $_GET['sneakerBrand'];
    $Id =  $_GET['productId'];
    $color = $_GET['sneakerColor'];
    $image = $_GET['sneakerImage'];
    $release = $_GET['sneakerRelease'];
  
    
    $sql = "UPDATE sneakers SET model = :sneakerName, brand= :category, price = :price, description = :description, 
    colorway = :color, releaseDate = :release, image = :image WHERE shoeID = " . $Id;
    
    $np = array();
    $np[":sneakerName"] = $sneakerName;
    $np[":description"] = $description;
    $np[":image"] = $image;
    $np[":price"] = $price;
    $np[":category"] = $category;
    $np[":color"] = $color;
    $np[":release"] = $release;
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "<div id='message'>Updated</div>";
 
}


function getProductInfo($productId) {
     global $dbConn;
    
    $sql = "SELECT * FROM sneakers WHERE shoeID = $productId";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    return $record;
     
}


if (isset($_GET['productId'])) {

  $productInfo = getProductInfo($_GET['productId']);    
  
  print_r($productInfo);
    
}


?>
           


<!DOCTYPE html>
<html>
    <head>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <style>
        @import url('css/styles.css');
            header {
                text-align: center;
            }
            body{
                text-align: left;
            }
            footer{
                padding-left: 15px;
            }
        </style>
        
        <title> Update Product </title>
    </head>
    <body>
        <div class="jumbotron">
        <h1> Updating a Product </h1>
        </div>
        
        
       

        <form>
        
        <input type="hidden" name="productId" value="<?=$productInfo['shoeID']?>">
        
          <div class="form-group mx-sm-3 mb-2">
           Sneaker Model: <input type="text"  name="sneakerName" value="<?=$productInfo['model']?>">
         </div>
         <div class="form-group mx-sm-3 mb-2">
           Description: <textarea name="sneakerDesc"  cols="50" rows="2" ><?=$productInfo['description']?></textarea><br>
        </div>
        <div class="form-group mx-sm-3 mb-2">
           Price: <input type="text"  name="sneakerPrice" value="<?=$productInfo['price']?>"><br>
        </div>
        <div class="form-group mx-sm-3 mb-2">
           Color way: <input type="text" name="sneakerColor" value="<?=$productInfo['colorway']?>"><br>
        </div>
        <div class="form-group mx-sm-3 mb-2">
           Brand: <input type="text" name="sneakerBrand" value="<?=$productInfo['brand']?>"><br>
        </div>
        <div class="form-group mx-sm-3 mb-2">
           Set Image Url: <input type="text" name="sneakerImage" value="<?=$productInfo['image']?>"><br>
        </div>
        <div class="form-group mx-sm-3 mb-2">
           Set Release Date: <input type="date" name="sneakerRelease" value="<?=$productInfo['date']?>"><br>
        </div>
        <div class="form-group mx-sm-3 mb-2">
           <input type="submit" name="updateProduct" value="Update Product">
        </div>
        </form>
        
    </body>
    
            <footer>
            <form action="adminPage.php">
                  <input type="submit" value="Back">
             </form>
         </footer>
</html>