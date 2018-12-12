<?php
session_start();

include '../../inc/dbConnection.php';
$dbConn = startConnection("sneaker_store");

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM admin
                 WHERE adminUser = :user
                 AND  adminPassword = :password ";                 
$np = array();
$np[':user'] = $username;
$np[':password'] = $password;

$stmt = $dbConn->prepare($sql);
$stmt->execute($np);
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

//print_r($record);

if (empty($record)) {
    
    echo "Wrong username or password!!";
} else {
   
   $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
   header('Location: adminPage.php'); //redirects to another program
    
}


?>