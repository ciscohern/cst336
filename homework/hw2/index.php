<html>
    <head>
      <meta charset="utf-8"/>
        <title>
           Maze Generator 
        </title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    <body background="white.jpg">
     <br>
     </br>
     <header>
          <div id="wrapper">
            <h1 class="maze">Maze Generator</h1>
         
     </header>
     <main>
          <center>
          <button id="reload" onclick="myFunction()">New Maze
          <img src="reload .png" width="30" height="30" alt="submit" />
          </button>
          <script>
               function myFunction() {
               location.reload();
               }
          </script>
          </center>
          </div>
     </main>
    </body>
    <center id="maze"> 
<?php
$maze_width = 30;
$maze_height = 30;
$maze = array();
$moves = array();
$width = 2*$maze_width+1;
$height = 2*$maze_height+1;
for($x=0;$x<$height;$x++){
     for($y=0;$y<$width;$y++){
          $maze[$x][$y]=1;
     }
}
$x_pos = 1;
$y_pos = 1;
$maze[$x_pos][$y_pos]=0;
array_push($moves,$y_pos+($x_pos*$width));
while(count($moves)){
     $possible_directions = "";
     if($maze[$x_pos+2][$y_pos]==1 and $x_pos+2!=0 and $x_pos+2!=$height-1){
          $possible_directions .= "S";
     }
     if($maze[$x_pos-2][$y_pos]==1 and $x_pos-2!=0 and $x_pos-2!=$height-1){
          $possible_directions .= "N";
     }
     if($maze[$x_pos][$y_pos-2]==1 and $y_pos-2!=0 and $y_pos-2!=$width-1){
          $possible_directions .= "W";
     }
     if($maze[$x_pos][$y_pos+2]==1 and $y_pos+2!=0 and $y_pos+2!=$width-1){
          $possible_directions .= "E";
     }
     if($possible_directions){
          $move = rand(0,strlen($possible_directions)-1);
          switch ($possible_directions[$move]){
               case "N": $maze[$x_pos-2][$y_pos]=0;
                         $maze[$x_pos-1][$y_pos]=0;
                         $x_pos -=2;
                         break;
               case "S": $maze[$x_pos+2][$y_pos]=0;
                         $maze[$x_pos+1][$y_pos]=0;
                         $x_pos +=2;
                         break;
               case "W": $maze[$x_pos][$y_pos-2]=0;
                         $maze[$x_pos][$y_pos-1]=0;
                         $y_pos -=2;
                         break;
               case "E": $maze[$x_pos][$y_pos+2]=0;
                         $maze[$x_pos][$y_pos+1]=0;
                         $y_pos +=2;
                         break;        
          }
          array_push($moves,$y_pos+($x_pos*$width));
     }
     else{
          $back = array_pop($moves);
          $x_pos = floor($back/$width);
          $y_pos = $back%$width;
     }
}
echo "<code style = \"font-size:13px;line-height:8px\">";
for($x=0;$x<$height;$x++){
     for($y=0;$y<$width;$y++){
          if($maze[$x][$y]==1){
               echo "■︎︎";
          }
          else{
               echo "&nbsp;";
          }
     }
     echo "<br>";
}
echo "</code>";
?>
</center>
</html>