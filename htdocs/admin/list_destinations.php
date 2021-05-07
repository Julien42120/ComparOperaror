<?php

include '../config/autoload.php';
include '../config/pdo.php';
include '../partials/header.php';


$destinationManager = new DestinationManager($pdo);
$toManager = new TourOperatorManager($pdo);

?>

<h2>Liste des destinations</h2>
<?php
 $allDestination = $destinationManager->getAllDestination();
 foreach ($allDestination as $destination) {

    $operator = new TourOperator($toManager->getOperatorById($destination->getIdTourOperator()));
 ?>
     <br>
     <div class="title">
        <h2><?= $destination->getLocation()?> - <?=$operator->getName()?><br><?= $destination->getPrice()?></h2>
        <img src="<?= $destination->getImage()?>">
     </div><br>


<form method="post" action="process/process_Delete_destination.php">
        <input type="hidden" name="id" value="<?=$destination->getId()?>">
        <button type="submit" name="" value="">Suppr</button>
</form>

<?php } ?>