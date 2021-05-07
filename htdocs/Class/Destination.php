<?php

class Destination {
    private $id;
    private $location;
    private $price;
    private $id_tour_operator;
    private $image;


    public function __construct($arrayDestination){
        $this->hydrate($arrayDestination);
    }

    public function hydrate($donnees){
        foreach ($donnees as $key => $value)
        {
          $method = 'set'.ucfirst($key);
          
          if (method_exists($this, $method))
          {
            $this->$method($value);
          }
        }
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getLocation(){
        return $this->location;
    }

    public function setLocation($location){
        $this->location = $location;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
    }
    
    public function getIdTourOperator(){
        return $this->id_tour_operator;
    }

    public function setId_tour_operator($id_tour_operator){
        $this->id_tour_operator = $id_tour_operator;
    }

    public function getImage(){
        return $this->image;
    }

    public function setImage($image){
        if ($image == '') {
            $this->image = 'https://www.acs-ami.com/fr/blog/wp-content/uploads/2015/07/inspiration-voyage.jpg';
        } else{
            $this->image = $image;
        }
    }
}