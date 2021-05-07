<?php
session_start();
include '../../config/pdo.php';


$req = $pdo->prepare('SELECT * FROM admin WHERE name = ?');
    
    
    $req->execute(array(
        $_POST['name']
    ));
$resultat = $req->fetch(PDO::FETCH_ASSOC);

if ($resultat['name'] === $_POST['name'] && $resultat['password'] === $_POST['password']){
    $_SESSION['id']= $resultat['id'];
    $_SESSION['name']= $resultat['name'];
    $_SESSION['password']= $_POST['password'];
    
    header('Location:../../index.php?message=Salut '.$_POST['name'].' tu es connecté a ton compte !');
    
}

else {
    header('Location:../../index.php?message=pseudo ou mot de passe faux !');
}
