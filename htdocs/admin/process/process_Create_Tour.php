<?php
include "../../config/autoload.php";
include "../../config/pdo.php";


if (isset($_POST['name']) && isset($_POST['link'])){

    $tourOperateurManager = new TourOperatorManager($pdo);
    $tourOperateur = new TourOperator((['name' => $_POST['name'] , 'link' => $_POST['link'] , 'is_premium' => $_POST['is_premium'] , 'logo' => $_POST['logo']]));
    
    if ($tourOperateurManager-> operatorExist($tourOperateur) === true){
    $tourOperateurManager->createTourOperator($tourOperateur);

    header('Location:../list_TourOperator.php?message=L\'opérateur a été crée.');

    }else{

    header('Location:../create_Tour_Operator.php?message=L\'opérateur existe deja.');

    }
    
} else{

    header('Location:../create_Tour_Operator.php?message=Remplissez les champs.');

}

?>