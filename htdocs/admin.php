<?php 

include 'partials/header.php';

?>

  
<div class="Inscription">
    <div class="AdminCo">
        <h1>Connexion</h1>
        <form action="admin/process/process_connexion.php" method="POST">
            <label>Entrer votre Prénom</label><br>
            <input type="text" name="name" placeholder="Prenom"><br>
            <label>Entrer votre mot de passe</label><br>
            <input type="password" name="password" placeholder="Mot de passe"><br>
            <button type="submit" > Se Connecter </button>
        </form>
    </div>
</div>