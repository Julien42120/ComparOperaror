<?php
include __DIR__."/../../config/autoload.php";
include __DIR__."/../../config/pdo.php";

$reviewManager = new ReviewManager($pdo);
$operatorManager = new TourOperatorManager($pdo);
$dataOperator = $operatorManager->getOperatorById(intval($_POST['id_tour_operator']));
$operator = new TourOperator($dataOperator);

if (isset($_POST['author']) && isset($_POST['message'])){

    $review = new Review([
        'message'=> $_POST['message'], 
        'author' => $_POST['author'],
        'id_tour_operator'=> intval($_POST['id_tour_operator']),
        'grade_review'=> intval($_POST['grade_review'])
    ]);
    
    $reviewManager->createReview($review);

    $moyenneGrade = $reviewManager->getMoyGrade($_POST['id_tour_operator']);
    $operator->hydrate(["grade"=> floatval($moyenneGrade['grade_moyenne'])]);
    $operatorManager->updateGradeByOperator($operator);

    header('Location: /detail_operator.php?to='.$_POST['id_tour_operator']);
}

?>