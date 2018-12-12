<?php
include '../../inc/dbConnection.php';
$dbConn = startConnection("sneaker_store");

$sql ="SELECT * FROM `sneakers` WHERE shoeID = ".$_GET['sneakerId'];
//$sql = "SELECT model, brand, price, image, shoeID FROM sneakers ORDER BY model WHERE shoeID = ".$_GET['shoeId'];
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

//print_r($record);
echo json_encode($record);
?>