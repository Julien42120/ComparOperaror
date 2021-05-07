<?php 

include 'partials/header.php';

?>

  
<div class="Inscription">
    <div class="AdminIns">
        <h1>Inscription</h1>
        <form action="admin/process/process_inscription.php" method="POST">
            <label>Entrer votre Prénom</label><br>
            <input type="text" name="name" placeholder="Prenom"><br>
            <label>Entrer un mot de passe</label><br>
            <input type="password" name="password" placeholder="Mot de passe"><br>
            <button type="submit" > Inscription </button>
        </form>
    </div>
