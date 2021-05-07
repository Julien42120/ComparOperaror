<?php
    include "../../config/autoload.php";
    include "../../config/pdo.php";


    if (isset($_POST['id'])){

        $destinationManager = new DestinationManager($pdo);
        $destination = new Destination(['id'=>$_POST['id']]);

        $destinationManager->deleteDestination($destination);

        header('Location:../list_Destination.php?message=La destination a été supprimé.'); 

    }else{
        header('Location:../list_Destination.php?message=Remplissez les champs.');

    }

?>