<!DOCTYPE html>
<html>

<head>
    <title> RPS </title>
    <style type="text/css">
        body {
            background-color: black;
            color: white;
            text-align: center;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .col {
            text-align: center;
            margin: 0 70px;
        }

        .matchWinner {
            background-color: yellow;
            margin: 0 70px;
        }

        #finalWinner {
            margin: 0 auto;
            width: 500px;
            text-align: center;
        }
        
        hr {
            width:33%;
        }        
    </style>
</head>

<body>

    <h1> Rock, Paper, Scissors </h1>

    <div class="row">
        <div class="col">
            <h2>Player 1</h2>
        </div>
        <div class="col">
            <h2>Player 2</h2>
        </div>
    </div>
    
    <div class="row">
        <?php
            play();
        ?>
    </div>
    <hr>

    <div class="row">
        <?php
            play();
        ?>
    </div>
    <hr>
    
    <div class="row">
        <?php
            play();
        ?>
       <!-- <div class='col, matchWinner'><img src='/cst336/practice/img/rps/paper.png' alt='paper' width='100'></div>
        <div class='col'><img src='img/rock.png' alt='rock' width='100'></div> -->
    </div>
    <hr>
    
    <?php
    
    function displaySymbol($randomValue,$pos){
        switch($randomValue){
            case 0:$symbol="paper";
            break;
            case 1:$symbol="rock";
            break;
            case 2:$symbol="scissors";
            break;
           
        }
         echo"<img id ='reel$pos' src='/cst336/practice/img/rps/$symbol.png' alt ='$symbol' title='".ucfirst($symbol)."' width='100'>";
         
    }
    
    function play(){
        for($i=1;$i<3;$i++){
            ${"randomValue" . $i}=rand(0,2);
             displaySymbol(${"randomValue" . $i},$i);
             
        }
        
        
                if($randomValue1==0&&$randomValue2==0){
            echo "<h2>You Tie</h2>";
        }
                 if($randomValue1==0&&$randomValue2==1){
            echo "<h2>Player 2 Wins</h2>";
        }
                if($randomValue1==1&&$randomValue2==0){
            echo "<h2>Player 2 Wins</h2>";
        }
                if($randomValue1==1&&$randomValue2==1){
            echo "<h2>You Tie<h2>";
        }
                if($randomValue1==1&&$randomValue2==2){
            echo "<h2>Player 1 Wins<h2>";
        }
                if($randomValue1==2&&$randomValue2==1){
            echo "<h2>Player 2 Wins<h2>";
        }
                if($randomValue1==2&&$randomValue2==2){
            echo "<h2>You Tie<h2>";
        }
             
                if($randomValue1==2&&$randomValue2==0){
            echo "<h2>Player 1 Wins <h2>";
                }
                if($randomValue1==0&&$randomValue2==2){
            echo "<h2>Player 2 Wins <h2>";
        }

    }
    
 
    ?>

    <div id="finalWinner">

        <!--<h1>The winner is Player 2</h1>-->
        
    </div>
    Images source: https://www.kisspng.com/png-rockpaperscissors-game-money-4410819/
</body>

</html>
