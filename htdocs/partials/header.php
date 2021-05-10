<?php session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/custom.css">
    <title>Document</title>
</head>
<body>



<div class="Nav">
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php">Accueil</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php if ( $_SESSION ){?>

          
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../ajoutAdmin.php">Inscription Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/create_Tour_Operator.php">Créer un Tour Opérateur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/list_TourOperator.php">Liste Opérateur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/process/process_deco.php" >Deconnexion</a>
          </li>
        </ul>

        <?php } else {  ?>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../admin.php">Connexion</a>
          </li>
          
        <?php } ?>


        <!-- <form action="" class="d-flex" method="POST">
          <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form> -->

        <?php
        if (isset($_POST['search'])){
        $search = $_POST['search'];
        $sql=
        "SELECT * 
        FROM `destinations` 
        WHERE location
            LIKE :search
        LIMIT 10";

        $q=$pdo->prepare($sql);
        $q->bindValue(':search','%'.$search.'%');

        $q->execute();
        while ($donnees=$q->fetch(PDO::FETCH_ASSOC));
      }

        ?>


      </div>
  </div>
</div>
</nav>

<?php 
if(!empty($_GET['message'])){
    echo '<div class="alert alert-danger " role="alert">'
    .$_GET['message']. 
    '</div>';
}
?>