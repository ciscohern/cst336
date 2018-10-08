<!DOCTYPE html>
<?php
    include "functions.php";
    if (isset($_GET["passwords"]) && isset($_GET["length"])) {
        $passwords = $_GET["passwords"];
        $pwSize = $_GET["length"];
    }
    $passArray = array();
?>
<html>

<head>
    <title>Practice 5</title>
    
    <style>
        .body{
            background-color: lightblue;
        }
        
    </style>

</head>

<body>
    <center class="body">

        <h1>Custom Password Generator</h1>

        <form method="GET">
            How many passwords? <input type="text" name="passwords" size="1"> (No more than 8)
            <?php
                if($passwords > 8){
                    echo "  Passwords can not be greater than 8 ";
            }
            
               
            ?>
            <br>

            <h3><b>Password Length</b></h3> <br>
            <input type="radio" name="length" value="6"> 6 character
            <input type="radio" name="length" value="7"> 7 character
            <input type="radio" name="length" value="8"> 8 character
          
            <br><br>
            
             <input type="checkbox" name="digits" value="true"> Include Digits (Up to 3 will be part of the password)<br>
             <br>
             
              <?php
              
              if (isset($_GET['digits'])) {

                // Checkbox is selected
                for($i=0;$i<$passwords;$i++){
                    
                    array_push($passArray, random_password($pwSize,$passwords)+ random_numbers(3));
                    echo $passArray[$i];
                    echo "<br>";
                }
                
            } else {

                // Alternate code
                 for($i=0;$i<$passwords;$i++){
                    array_push($passArray, random_password($pwSize,$passwords));
                    echo $passArray[$i];
                    echo "<br>";
                }
            }


            ?>

            <input type="submit" name="submitBtn" value="Create Passwords" />
            <br>
            <br>
            <input type="submit" name="displayBTN" value="Display Password History" />

        </form>
    </center>
</body>

</html>