<?php

class DestinationManager {

    private $bdd;

    public function __construct($db)
    {
      $this->setDb($db);
    }

    public function setDb(PDO $db){
      $this->bdd = $db;
    }
  
  public function getAllDestination(){
     $allDestination = [];
      $q= $this->bdd->prepare('SELECT * FROM destinations');
      $q -> execute();
      $donnees = $q -> fetchAll(PDO::FETCH_ASSOC);

      foreach ($donnees as $donnee){
        $allDestination[] = new Destination($donnee);
      }
      return $allDestination;
  }

  public function getDestinationByName(string $name){
    $allDestination = [];

    $q = $this->bdd->prepare(
      'SELECT *
        FROM destinations 
        WHERE location = ?');
    $q->execute([$name]);
    $donnees = $q->fetchAll(PDO::FETCH_ASSOC);
 
    foreach ($donnees as $donnee){
      $allDestination[] = new Destination($donnee);

    }

    return $allDestination;

  }

  public function getDestinationByIdTo($id){
    $allDestination = [];

    $q = $this->bdd->prepare(
      'SELECT * FROM destinations
        WHERE id_tour_operator = ?');
    $q->execute([$id]);
    $donnees = $q->fetchAll(PDO::FETCH_ASSOC);
 
    foreach ($donnees as $donnee){
      $allDestination[] = new Destination($donnee);

    }

    return $allDestination;

  }


  public function getAllOperation($allOperation){
    $this->allOperation = $allOperation;
  }

  public function createDestination(Destination $destination){ 
    $q = $this->bdd->prepare('INSERT INTO destinations (location , price, id_tour_operator , image) VALUE (:location, :price, :id_tour_operator , :image)');
    $q->bindValue(':location', $destination->getLocation());
    $q->bindValue(':price', $destination->getPrice());
    $q->bindValue(':id_tour_operator', $destination->getIdTourOperator());
    $q->bindValue(':image', $destination->getImage());
    $q->execute();

    $destination->hydrate([
      'id' => $this->bdd->lastInsertId()
    ]);
  }

  public function deleteDestination(Destination $destination){

    $deleteTo = $this->bdd->prepare('DELETE FROM destinations WHERE id = :id');
    $deleteTo->bindValue(':id', $destination->getId(), PDO::PARAM_INT);
    $deleteTo->execute();
  }
  
}