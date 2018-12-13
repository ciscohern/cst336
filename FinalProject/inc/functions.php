<?php 
function validateSession(){
    if (!isset($_SESSION['adminFullName'])) {
        header("Location: index.php");  //redirects users who haven't logged in 
        exit;
    }
}
function displayAllProducts(){
    global $dbConn;
    
    $sql = "SELECT * FROM sneakers ORDER BY brand";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records



    foreach ($records as $record) {

        //echo "[<a href='deleteProduct.php?productId=".$record['productId']."'>Delete</a>]";
        echo "<a class='btn btn-primary' role='button' href='updateSneaker.php?productId=".$record['shoeID']."'>Update</a>";
        
        echo "<form action='../admin/delete.php' onsubmit='return confirmDelete()'>";
        echo "<input type='hidden' name='sneakerId' value='".$record['shoeID']."'>";
        echo "<button type='submit' class='btn btn-warning'>Delete</button>";
        echo "</form>";
        echo "<a><img src=" . $record['image']. "width= 100 height= 100></a>";
        echo "<a 
        href='#?sneakerId=".$record['id']."'>".$record['model']."</a>  ";
        echo " $" . $record['price']   . "<br><br>";
        
    }
}

function getProductInfo($productId) {
    global $dbConn;
    
    $sql = "SELECT * FROM sneakers WHERE shoeID = $productId";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    return $record;
     
    
}
?>