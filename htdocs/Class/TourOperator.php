<?php

class TourOperator {
    private $id;
    private $name;
    private $grade;
    private $link;
    private $is_premium = 0;
    private $logo;


    public function __construct($arrayTo){
        $this->hydrate($arrayTo);
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

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getGrade(){
        if ($this->grade == "") {
            return;
        }
        return $this->grade;
    }

    public function setGrade($grade){
        $this->grade = $grade;
    }
    
    public function getLink(){
        return $this->link;
    }

    public function setLink($link){
        $this->link = $link;
    }

    public function getIsPremium(){
        return $this->is_premium;
    }

    public function setIs_Premium($is_premium){
        $this->is_premium = $is_premium;
    }

    public function getLogo(){
        return $this->logo;
    }
    
    public function setLogo($logo){
        $this->logo = $logo;
    }
}