<?php

include '../inc/dbConnection.php';
$dbConn = startConnection("sneaker_store");
$records;
function getSneakers() {
    global $dbConn;
    global $records;
    $sql ="SELECT model, brand, price FROM sneakers ORDER BY model ASC";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $records;
}

?>