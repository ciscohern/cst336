<?php
session_start();

include '../../inc/dbConnection.php';
$dbConn = startConnection("sneaker_store");

include '../inc/functions.php';
validateSession();

if (isset($_GET['shoeID'])) {

  $shoeInfo = getProductInfo($_GET['shoeID']);    
  //print_r($productInfo);
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Shoe Info </title>
    </head>
    <body>
    <img src='<?="../".$shoeInfo['image']?>' height = 75px />
    <h3><?=$shoeInfo['model']?></h3>
     <?=$shoeInfo['description']?>
     
 
    </body>
</html>