<?php
include "../../config/autoload.php";
include "../../config/pdo.php";


if (isset($_POST['is_premium'])){

    $tourOperateurManager = new TourOperatorManager($pdo);
    $tourOperateur = new TourOperator(([
        'id'=>intval($_POST['id_tour_operator']),
        'name'=>$_POST['name'],
        'grade'=>$_POST['grade'],
        'link'=>$_POST['link'],
        'is_premium' => intval($_POST['is_premium']),
        'logo' => $_POST['logo'],
        ]));

    if ($tourOperateurManager-> operatorExist($tourOperateur) === true){
    $tourOperateurManager->updateTO($tourOperateur);

    header('Location:../list_TourOperator.php?message=L\'opérateur a bien été modifié.');

    }

}else{
    header('Location:../list_TourOperator.php?message=Remplissez les champs.');

}

?>