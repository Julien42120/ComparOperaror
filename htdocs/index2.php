<?php

include 'config/autoload.php';
include 'config/pdo.php';
include "partials/header.php";

$manager = new TourOperatorManager($pdo);
$destinationManager = new DestinationManager($pdo);
?>

      <div class="Index2">
            <?php $allDestination = $destinationManager->getDestinationByName($_GET['location']);?>
            <div class="title">
                  <h1><?=$_GET['location']?></h1>
                  <h2>A partir de <?= $allDestination[0]->getPrice()?> Euros</h2> 
                  <h4>Liste des Operateurs proposant ce voyage</h4>
                  <img src="asset/pngwing.com.png"> 
                  <?php foreach ($allDestination as $destination){
                        $operator = $manager->getOperatorByDestination($destination->getIdTourOperator()); ?>
                        <a href="detail_operator.php?to=<?=$operator->getId()?>">
                        <h3><?= $operator->getName()?></h3> </a>
                  
                  <?php } ?> 
            </div>   
      </div>

     <?php

include 'partials/footer.php'?>
<br>


