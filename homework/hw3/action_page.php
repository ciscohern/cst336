<?php
if ( isset( $_GET['submit'] ) ) { 
$firstname = $_GET['firstname']; 
$lastname = $_GET['lastname']; 
$gender= $_GET['gender'];
$sport=$_GET['sport'];
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    <body id="body">
    <main>
        <div id="info">
            <center>
        <?php
        $team=$_GET['team'];
        echo '<h3>Your Information</h3>'; 
        echo 'Your name is: ' .$firstname  . ' ' . $lastname; 
        echo '<br></br>';
        echo 'your gender is: ' . $gender; 
        echo '<br></br>';
        echo 'Your favorite sport is: '.$sport;
        }
        ?>
        </center>
        </div>
    </main>
    </body>
</html>
