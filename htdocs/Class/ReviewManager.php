<?php


class ReviewManager {

private $bdd;

  public function __construct($db){
      $this->setDb($db);
  }

  public function setDb(PDO $db){
      $this->bdd = $db;
  }

  //creation review 

  public function createReview(Review $review){ 

    $insertReview = $this->bdd->prepare('INSERT INTO reviews(message, author, id_tour_operator, grade_review) 
    VALUES(:message, :author, :id_tour_operator, :grade_review)');
    $insertReview->bindValue(':message', $review->getMessage(), PDO::PARAM_STR);
    $insertReview->bindValue(':author', $review->getAuthor(), PDO::PARAM_STR);
    $insertReview->bindValue(':id_tour_operator', $review->getIdTourOperator(), PDO::PARAM_INT);
    $insertReview->bindValue(':grade_review', $review->getGradeReview(), PDO::PARAM_INT);

    $insertReview->execute();

  }


  //modifier review message (non utilisé)

  public function updateReviewMessage(Review $review, $message){

    $updatePriceDestination = $this->bdd->prepare('UPDATE reviews SET  message = :message WHERE id = :id');
    $updatePriceDestination->bindValue(':id', $review->getId(), PDO::PARAM_INT);
    $updatePriceDestination->bindValue(':message', $message);
    
    $updatePriceDestination->execute();
  }

  public function updateReviewGrade(Review $review, $grade){

    $updateReviewGrade = $this->bdd->prepare('UPDATE reviews SET  grade_review = :grade_review WHERE id = :id');
    $updateReviewGrade->bindValue(':id', $review->getId(), PDO::PARAM_INT);
    $updateReviewGrade->bindValue(':grade_review', $grade);
    
    $updateReviewGrade->execute();
  }

    
  //delete Review

  public function deleteReview(Review $review){

    $deleteReview = $this->bdd->prepare('DELETE FROM reviews WHERE id = :id');
    $deleteReview->bindValue(':id', $review->getId(), PDO::PARAM_INT);
    $deleteReview->execute();
  }
  
  //GET INFORMATIONS  
  
 // List review by operator // 

  public function getReviewByIdTo($id){
    $allReviews = [];

    $q = $this->bdd->prepare(
      'SELECT * FROM reviews
        WHERE id_tour_operator = ?');
    $q->execute([$id]);
    $donnees = $q->fetchAll(PDO::FETCH_ASSOC);

    foreach ($donnees as $donnee){
      $allReviews[] = new Review($donnee);

    }

    return $allReviews;

  }

  public function getMoyGrade($idTourOperator){

    $MoyenneGradeStatement = $this->bdd->prepare('SELECT AVG(grade_review) AS grade_moyenne FROM reviews WHERE id_tour_operator = :id_tour_operator');
    $MoyenneGradeStatement->bindValue(':id_tour_operator', $idTourOperator ,PDO::PARAM_INT);
    $MoyenneGradeStatement->execute();

    $moyenne = $MoyenneGradeStatement->fetch(PDO::FETCH_ASSOC);

    return $moyenne;
  }
}