<?php

include 'config/autoload.php';
include 'config/pdo.php';
include 'partials/header.php';


$manager = new TourOperatorManager($pdo);
$destinationManager = new DestinationManager($pdo);
$reviewManager = new ReviewManager($pdo);

$operator = $manager->getOperatorByDestination($_GET['to']);
$allDestination = $destinationManager->getDestinationByIdTo($operator->getId());
$allReviews = $reviewManager->getReviewByIdTo($operator->getId());

?>



<div class="detail_operator contenu">
    <div class="content">
        <div class="row">
            <div class="col-12 col-md-6 affichage_to">
                <div class="operator_description">
                    <div class="operator_title">
                        <h1><?= $operator->getName() ?></h1>
                    </div>

                    <h5><?=$operator->getGrade()?>⭐</h5>

                    <?php if($operator->getIsPremium() == 1){?>
                    <a class='link' href="<?=$operator->getLink()?>"><?=$operator->getLink()?></a>
                    <?php } ?>
                </div>
                    <?php
                    foreach ($allDestination as $destination) {
                        ?>
                        <br>
                        <div class="destination">  
                            <img src="<?= $destination->getImage()?>">

                            <div class="destination_description">
                                <h2><?= $destination->getLocation() ?></h2>
                                <h4><?= $destination->getPrice() ?> €</h4>
                            </div>

                            <a href="detail_operator.php?to=<?= $operator->getId() ?>"></a>
                                                
                        </div> 

                    <?php } ?>
                    <br>
                
            </div>

            <div class="col-12 col-md-6 affichage_review">
                <?php 
                foreach ($allReviews as $review){
                ?>



                    <div class="review">
                        <h3><?=$review->getAuthor()?></h3>
                        <p><small>Note: <?=$review->getGradeReview()?></small></p>
                    
                        <p><?=$review->getMessage()?> </p>
                    </div>

                <?php } ?>

                <br>

                <div class="form_review">
                    <form class="form" action="admin/process/process_Create_Review.php" method="post">
                        <div class="mb-3">
                            <input type='hidden' name='id_tour_operator' value="<?= $operator->getId() ?>">

                            <label for="pseudo" class="form-label"></label>
                            <input type="text" class="form-control" id="author" placeholder="Pseudo" name="author">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Ecrire un commentaire</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                        </div>

                        <select class="form-select form-select-lg mb-3" aria-label="form-select-lg example" name="grade_review">
                            <option selected value='null'>Noter</option>
                            <option value="1">1 sur 5</option>
                            <option value="2">2 sur 5</option>
                            <option value="3">3 sur 5</option>
                            <option value="4">4 sur 5</option>
                            <option value="5">5 sur 5</option>
                        </select>

                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>