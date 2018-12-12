<?php
include '../../inc/dbConnection.php';
$dbConn = startConnection("sneaker_store");
    
    $sql ="SELECT AVG(price) FROM sneakers";
        
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        foreach($records as $i) {
            echo $i['AVG(price)'];
        }
   
?>