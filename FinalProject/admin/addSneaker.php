<?php
session_start();

include '../../inc/dbConnection.php';
$dbConn = startConnection("sneaker_store");
include '../inc/functions.php';
validateSession();

if (isset($_GET['addSneaker'])) { //checks whether the form was submitted
    
    $sneakerName = $_GET['sneakerName'];
    $description =  $_GET['sneakerDesc'];
    $price =  $_GET['sneakerPrice'];
    $category = $_GET['sneakerBrand'];
    $Id =  $_GET['Id'];
    $color = $_GET['sneakerColor'];
    $image = $_GET['sneakerImage'];
    $release = $_GET['sneakerRelease'];
    
    
    $sql = "INSERT INTO `flowers`(`flowerPrice`, `flowerDesc`, `category`, `flower_img`, `flowerName`, `flowerColor`) 
    VALUES (:price, :flowerDescription, :category, :flowerImage, :flowerName, :color)";
    
    $sql = "INSERT INTO `sneakers`(`model`, `brand`, `price`, `description`, `colorway`, `releaseDate`, `image`) 
    VALUES (:sneakerName,:category,:price,:description,:color,:release,:image)";
    $np = array();
    $np[":sneakerName"] = $sneakerName;
    $np[":description"] = $description;
    $np[":image"] = $image;
    $np[":price"] = $price;
    $np[":category"] = $category;
    $np[":color"] = $color;
    $np["release"] = $release;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    
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
        
        <title> Admin Section: Add New Product </title>
    </head>
    <header>
        <div class="jumbotron">
            <h1> Adding New Product </h1>
        </div>
    </header>
    <body>


 
        <form>
        <div class="form-group mx-sm-3 mb-2">
           Sneaker Model: <input type="text"  name="sneakerName">
         </div>
         <div class="form-group mx-sm-3 mb-2">
           Description: <textarea name="sneakerDesc"  cols="50" rows="2"></textarea><br>
        </div>
        <div class="form-group mx-sm-3 mb-2">
           Price: <input type="text"  name="sneakerPrice"><br>
        </div>
        <div class="form-group mx-sm-3 mb-2">
           Color way: <input type="text" name="sneakerColor"><br>
        </div>
        <div class="form-group mx-sm-3 mb-2">
           Brand: <input type="text" name="sneakerBrand"><br>
        </div>
        <div class="form-group mx-sm-3 mb-2">
           Set Image Url: <input type="text" name="sneakerImage"><br>
        </div>
        <div class="form-group mx-sm-3 mb-2">
           Set Release Date: <input type="date" name="sneakerRelease"><br>
        </div>
        <div class="form-group mx-sm-3 mb-2">
           <input type="submit" name="addSneaker" value="Add Product">
        </div>
        </form>
        
        <footer>
            <form action="adminPage.php">
                  <input type="submit" value="Back">
             </form>
         </footer>

    </body>
</html>