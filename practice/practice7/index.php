<head>
        <title> Quote Finder </title>
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <style>
            body {
                text-align: center;
                font-size: 2em;
            }
            #quotes{
                width:600px;
                margin:0 auto;
                text-align: left;
            }
        </style>
    </head>
    <body>

      <div class="jumbotron">
            <h1> Famous Quote Finder </h1>
      </div>
      
      <form>
         Enter Quote Keyword 
         <input name="keyword" value="" type="text"><br><br>
         Category:
                <select name="category">
                     <option value=""> Select One </option>
                     <option>Humor</option>
                     <option>Life</option>
                     <option>Motivation</option>
                     <option>Philosophy</option>
                     <option>Reflection</option> 
                </select>
                     <br><br>
          Order  <br>
              <input name="orderBy" value="az" type="radio"> A-Z <br>
              <input name="orderBy" value="za" type="radio"> Z-A <br>
              
            <br>
            
            <input value="Display Quotes" type="submit">

      </form>
      
      
      <hr>
    
</body>

<?php
$dbHost = getenv('IP');
$dbPort = 3306;
$dbName = "c9";
$username = getenv('C9_USER');
$password = "";
        
$dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

if(isset($_GET['keyword'])){
   $sql = "SELECT quote,author FROM `p1_quotes` WHERE quote LIKE "%$_GET['keyword']%""; 
}
    
function getCategory(){
    $dbHost = getenv('IP');
    $dbPort = 3306;
    $dbName = "c9";
    $username = getenv('C9_USER');
    $password = "";
            
    $dbConn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    echo "<select name='category'>"
    foreach
}



?>