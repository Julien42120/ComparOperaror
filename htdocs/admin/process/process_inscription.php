<?php

include '../../config/pdo.php';

if (isset($_POST['name'])) {
    $req = $pdo->prepare('INSERT INTO admin (name , password) VALUE ( ? ,? ) ');
    $req->execute([
        $_POST['name'],
        $_POST['password']
    ]);
    header('Location:../../index.php?message= Votre compte a été crée!');

    
}

