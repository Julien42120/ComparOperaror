<?php
include "../../config/autoload.php";
include "../../config/pdo.php";
$destinationManager = new DestinationManager($pdo);


if (isset($_POST['location']) && isset($_POST['price'])){
    
    $destination = new Destination(['location'=> $_POST['location'] , 'price' => intval($_POST['price']) , 'id_tour_operator'=> intval($_POST['id_tour_operator']),'image'=> $_POST['image']]);
    $destinationManager->createDestination($destination);
  

  header('Location: ../../index.php?message=La Destination a été crée.');
}

?>