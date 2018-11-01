<?php

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

function displayCategories() { 
    global $dbConn;
    
    $sql = "SELECT * FROM om_category ORDER BY catName";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    //echo "<hr>";
    //echo $records[2] . "<br>";
    //echo $records[1]['catDescription'] . "<br>";
    
    foreach ($records as $record) {
        echo "<option value='".$record['catId']."'>" . $record['catName'] . "</option>";
    }
}

function filterProducts() {
    global $dbConn;
    
    $namedParameters = array();
    $product = $_GET['productName'];
    
    //This SQL works but it doesn't prevent SQL INJECTION (due to the single quotes)
    //$sql = "SELECT * FROM om_product
    //        WHERE productName LIKE '%$product%'";
  
    $sql = "SELECT * FROM om_product WHERE 1"; //Gettting all records from database
    
    if (!empty($product)){
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND productName LIKE :product";
         $namedParameters[':product'] = "%$product%";
    }
    
    if (!empty($_GET['category'])){
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND catId =  :category";
          $namedParameters[':category'] = $_GET['category'] ;
    }
    
    //echo $sql;
    
    if (isset($_GET['orderBy'])) {
        
        if ($_GET['orderBy'] == "productPrice") {
            
            $sql .= " ORDER BY price";
        } else {
            
              $sql .= " ORDER BY productName";
        }
        
        
    }

    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  
    //print_r($records);
    
    
    foreach ($records as $record) {
        
        echo "<a href='productInfo.php?productId=".$record['productId']."'>";
        echo $record['productName'];
        echo "</a> ";
        echo $record['productDescription'] . " $" .  $record['price'] .   "<br>";   
        
    }


}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <title> Lab 6: Ottermart Product Search</title>
    </head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <body>
        
        <div class="jumbotron" id = "jumbo">
            <h1 class="display-2">Ottermart</h1>
                <p class="lead">Product Search</p>
          
        </div>
        <form>
            <div class="col-3">
            <div class="form-group">
                <label for="Product">Product</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="productName" placeholder="Product keyword">

            </div>
            
             <label for="exampleFormControlSelect1">Category</label>
                <select name="category" class="form-control" id="dropdown">
               <option value=""> Select one </option>  
               <?=displayCategories()?>
            </select>
            
            <label for="Price">Price</label>
            <br>
            <label for="priceFrom">From</label>
            
            <input type="text" class="form-inline" id="exampleInputEmail1" aria-describedby="emailHelp" name="priceFrom"/>
            To
            <input type="text" class="form-inline" id="exampleInputEmail1" aria-describedby="emailHelp" name="priceTo"/>
            
            <br>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="orderBy" id="exampleRadios1" value="productPrice">
                <label class="form-check-label" for="exampleRadios1">
                Price
                </label>
                <br>
            <input class="form-check-input" type="radio" name="orderBy" id="exampleRadios2" value="productName">
                <label class="form-check-label" for="exampleRadios2">
                Name
                </label>
            </div>
            
            <br>
            <input type="submit" name="submit" value="Search"/>
            </div>
        </form>
        <br>
        <hr>
        
        <?= filterProducts() ?>
        
    


    </body>
    
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>