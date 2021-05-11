<?php

include 'config/autoload.php';
include 'config/pdo.php';
include 'partials/header.php'; 

$destinationManager = new DestinationManager($pdo);

?>


<div class="Acceuil">
    <div class="carousel">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <video playsinline autoplay muted loop> <source src="asset/Free Footage - 33871.mp4" type="video/mp4"></video>
                </div>
                <div class="carousel-item">
                <video playsinline autoplay muted loop> <source src="asset/Harbor - 6119.mp4" type="video/mp4"></video>
                </div>
                <div class="carousel-item">
                <video playsinline autoplay muted loop> <source src="asset/Mountains - 7418.mp4" type="video/mp4"></video>
                </div>
            </div>
            <button class="carousel-control-prev" type="button"             data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="main">
        <h1 class="main-heading">
            <span class="main-heading-primary">Intense Travel</span>
            <span class="main-heading-secondary">L'agence qui vous fait monter au ciel </span>
            
        </h1>
    </div>

    <div class="Cards" id="listDestinations">
        <div class="divObscur">
            <div class="listDestinations" >
                <h2>Listes des Destinations</h2>
            </div>
        </div>
        <?php
        $allDestination = $destinationManager->getAllDestination();
        foreach ($allDestination as $destination) {
            ?>

        <div class="container ">
            <img src="<?=$destination->getImage()?>" alt="" />
            <h1><?=$destination->getLocation()?></h1>
            <p class="title">A partir de <?=$destination->getPrice()?> Euros</p>
            <div class="overlay"></div>
            <div class="button" type="submit"> <a href="index2.php?location=<?=$destination->getLocation()?>"> En savoir plus</a></div>
        </div>
       
        <?php }?>
    </div>
</div>
<?php
include "partials/footer.php";

?>