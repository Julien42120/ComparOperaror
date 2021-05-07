<?php

class TourOperatorManager {

  private $bdd;

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function setDb(PDO $db){
    $this->bdd = $db;
  }


  public function getOperatorByDestination($id){
    
    $q = $this->bdd->prepare('SELECT * FROM tour_operators WHERE id = ?');
    $q->execute([$id]);
    $operator = $q->fetch(PDO::FETCH_ASSOC);

    return new TourOperator ($operator);
  
  }


  public function getAllOperator(){
    $allOperator = [];
    $q = $this->bdd->prepare('SELECT * FROM tour_operators');
    $q ->execute();
    $donnees = $q -> fetchAll(PDO::FETCH_ASSOC);

      foreach ($donnees as $donnee){
        $allOperator[] = new TourOperator($donnee);
      }
        return $allOperator;

  }

  public function operatorExist($operator){
    $CharacterStatement = $this->bdd->prepare("SELECT COUNT(*) FROM tour_operators WHERE name = ?");
    $CharacterStatement->execute([
        $operator->getName()
    ]);
    $result = empty($CharacterStatement->fetchColumn());
    return (bool) $result;
  } 

  public function updateOperatorToPremium(TourOperator $tourOperator){
    $updatePremium = $this->bdd->prepare('UPDATE tour_operators SET is_premium = :is_premium WHERE id = :id');
    $updatePremium->bindValue(':is_premium', $tourOperator->getIspremium());
    $updatePremium->bindValue(':id', $tourOperator->getId());

    $updatePremium->execute();
  }

  public function updateGradeByOperator(TourOperator $tourOperator){
    $updateGrade = $this->bdd->prepare('UPDATE tour_operators SET grade = :grade WHERE id = :id');
    $updateGrade->bindValue(':grade', $tourOperator->getGrade());
    $updateGrade->bindValue(':id', $tourOperator->getId());

    $updateGrade->execute();
  }

  public function getOperatorById($param){

    if (is_int($param)) {
           $CharacterStatement = $this->bdd->prepare('SELECT * FROM tour_operators WHERE id = :id');
           $CharacterStatement->bindValue(':id', $param, PDO::PARAM_INT);
           $CharacterStatement->execute();
           $operatorArray = $CharacterStatement->fetch(PDO::FETCH_ASSOC);

           return $operatorArray;
       }
  }

  public function createTourOperator(TourOperator $tourOperator){
    $q = $this->bdd->prepare('INSERT INTO tour_operators (name, link, is_premium, logo) VALUES(:name, :link, :is_premium, :logo)');
    $q->bindValue(':name', $tourOperator->getName());
    //grade
    $q->bindValue(':link', $tourOperator->getLink());
    $q->bindValue(':is_premium', $tourOperator->getIsPremium());
    $q->bindValue(':logo', $tourOperator->getLogo());
    $q->execute();
  }

  public function updateTO(TourOperator $operator){
    $updateTO = $this->bdd->prepare('UPDATE tour_operators SET name= :name, grade= :grade, link=:link, is_premium = :is_premium, logo = :logo WHERE id=:id');
    $updateTO->bindValue("grade", $operator->getGrade());
    $updateTO->bindValue("is_premium", $operator->getIsPremium());
    $updateTO->bindValue("link", $operator->getLink(), PDO::PARAM_STR);
    $updateTO->bindValue("logo", $operator->getLogo(), PDO::PARAM_STR);
    $updateTO->bindValue("name", $operator->getName(), PDO::PARAM_STR);
    $updateTO->bindValue("id", $operator->getId(), PDO::PARAM_INT);
    $updateTO->execute();
  }

  public function deleteTo(TourOperator $operator){

    $deleteTo = $this->bdd->prepare('DELETE FROM tour_operators WHERE id = :id');
    $deleteTo->bindValue(':id', $operator->getId(), PDO::PARAM_INT);
    $deleteTo->execute();
  }

}