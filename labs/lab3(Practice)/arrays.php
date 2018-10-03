<!DOCTYPE html>
<html>
    <head>
        <div>
        <tittle>Review Arrays</tittle>
        </div>
    </head>
</html>

<?php

    function displayArray(){
        global $symbols;
        
        echo "<hr>";
       // print_r($symbols);
        
        for($i=0;$i<sizeof($symbols);$i++){
            echo $symbols[$i] . ", ";
            
        }
    }

    $symbols = array("seven");
    //print_r($symbols); //displays array content
    
    $points = array("orange"=>250,"cherry"=>500);
    
    //echo $points["orange"]; displays 250
    
    $points["seven"] = 1000;
    
    array_push($symbols,"orange", "grapes"); //add elements to the end if the array
   // print_r($symbols); //displays array content
    
    $symbols[] = "cherry";//add elements to the end if the array
    print_r($symbols); //displays array content
    
    sort($symbols);//sort an indexed array
    displayArray();
    rsort($symbols);//sort an indexed array in desc
    displayArray();
    
    unset($symbols[2]);//remove element (does not compress array anything after will not be printed)
    displayArray();
    
    $symbols = array_values($symbols); //re-indexes elements in an array
    displayArray();
    
    shuffle($symbols);
    displayArray();
    
    echo "<hr>";
    echo "Random Item: ";
    echo "<br />";
    //$random = rand(0,sizeof($symbols)-1);
    //echo $symbols[$random];
    
    //echo $symbols[array_rand($symbols)];
    
    $indexes = array();
    
    for($i=0;$i < 3;$i++){
        $indexes[] = $symbols[array_rand($symbols)];
    
        echo "<img src = '../lab2/img/" . $indexes[$i] . ".png '>";
    }
    
    echo "<hr>";
    //print_r($indexes);
    
    if($indexes[0] == $indexes[1] && $indexes[1] == $indexes[2]){
        echo "You Win, You won " . $points[ $symbols[ $indexes[0] ] ] . "points";
    }
?>

    