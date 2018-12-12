<!DOCTYPE html>
<html>

<head>
    <title> "Sold Out" </title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <style>
        @import url('css/styles.css');
        body {
            text-align: center;
        }
        
    </style>
        
</head>

<body>
    
    <?php 
	    include 'inc/header.php';
	    
	  ?>
	  
	 <a class="btn btn-outline-dark" href="inventory.php" role="button">Shop Now</a>
    <br><br><br>
<center>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-50" src="https://stockx-360.imgix.net/Adidas-Yeezy-Boost-350-V2-Zebra/Images/Adidas-Yeezy-Boost-350-V2-Zebra/Lv2/img01.jpg?auto=format,compress&w=1117" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-50" src="https://stockx-360.imgix.net/air-jordan-1-retro-high-off-white-chicago_TruView/Images/air-jordan-1-retro-high-off-white-chicago_TruView/Lv2/img01.jpg?auto=format,compress&w=1117" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-50" src="https://stockx-360.imgix.net/adidas-ultra-boost-triple-black_TruView/Images/adidas-ultra-boost-triple-black_TruView/Lv2/img01.jpg?auto=format,compress&w=1117" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-50" src="https://stockx-360.imgix.net/Adidas-Yeezy-Wave-Runner-700-Solid-Grey/Images/Adidas-Yeezy-Wave-Runner-700-Solid-Grey/Lv2/img01.jpg?auto=format,compress&w=1117" alt="Fourthslide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-50" src="https://stockx-360.imgix.net/Adidas-Yeezy-Boost-750-Brown_TruView/Images/Adidas-Yeezy-Boost-750-Brown_TruView/Lv2/img01.jpg?auto=format,compress&w=1117" alt="Fifth slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-50" src="https://stockx-360.imgix.net/Adidas-Yeezy-Boost-350-Low-Turtledove_TruView/Images/Adidas-Yeezy-Boost-350-Low-Turtledove_TruView/Lv2/img01.jpg?auto=format,compress&w=1117" alt="Sixth slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-50" src="https://stockx-360.imgix.net/Air-Jordan-1-Retro-High-Off-White-University-Blue/Images/Air-Jordan-1-Retro-High-Off-White-University-Blue/Lv2/img01.jpg?auto=format,compress&w=1117" alt="Seventh slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
    </div>
    <a class="btn btn-outline-dark" href="street.php" role="button">Check out our growing street wear selection</a>
    <br><br><br>

</center>
    <br><br><br>
    <?php
        include 'inc/footer.php';
        
        ?>
</body>

</html>