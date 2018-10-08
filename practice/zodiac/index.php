<?php

function yearList($startYear, $endYear){
    $animals = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
    $count = 0;
    for ($i=$startYear; $i <= $endYear; $i+=4) {
       
       if($i == 1776){
           echo "<li> Year  $i USA INDEPENDENCE </li>";
       }else if($i%100 == 0){
           echo "<li>  Year  $i HAPPY NEW CENTURY </li>";
       }
       else{
           echo "<li>  Year  $i </li>";
           echo "<img src ='img/$animals[$counter].png> ";
           $count;
       }
       

       $temp = $temp +$i;
    }
    //echo "<strong> Year Sum: $temp </strong>";
    return "<strong>Year Sum: $temp</strong>";
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

        <h1> Chinese Zodiac Tasks</h1>
        
         <form method="GET">
              Start Year:<br>
              <input type="number" name="start"><br>
              End Year:<br>
              <input type="number" name="end">
        </form> 
        <ul>
          <?= yearList(,) ?>
        </ul>
        
    </body>
</html>