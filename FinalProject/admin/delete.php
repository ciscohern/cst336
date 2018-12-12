<?php
session_start();

include '../../inc/dbConnection.php';
$dbConn = startConnection("sneaker_store");
include '../inc/functions.php';
validateSession();

$sql = "DELETE FROM sneakers WHERE shoeID = '" . $_GET['sneakerId']."'";
$stmt=$dbConn->prepare($sql);
$stmt->execute();

header("Location: adminPage.php");



?>