<?php 

class Review {

    private $id;
    private $message;
    private $author;
    private $id_tour_operator;
    private $grade_review;

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    /* HYDRATE */

    public function hydrate($donnees){
        foreach ($donnees as $key =>$value) {

            $method = 'set'.ucfirst($key);

        if (method_exists($this, $method))
        {
          $this->$method($value);
        }
        }
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setMessage($message){
        $this->message = $message;
    }

    public function getMessage(){
        return $this->message;

    }

    public function getGradeReview(){
        return $this->grade_review;

    }

    public function setGrade_review($grade_review){
        $this->grade_review = $grade_review;
    }

    public function setAuthor($author){
        $this->author = $author;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function getIdTourOperator(){
        return $this->id_tour_operator;
    }
    
    public function setId_tour_operator($id_tour_operator){
        $this->id_tour_operator = $id_tour_operator;
    }
}
