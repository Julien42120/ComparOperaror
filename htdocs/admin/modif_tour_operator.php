<?php include '../partials/header.php' ?>


<div class="Modify">
    <div class="formModify">

        <h2>Modifier l'Opérateur <br><?=$_GET['name']?></h2>

        <form action="process/process_Modif_tour_operator.php" method="POST" enctype="multipart/form-data">
            <input type='hidden' name='id_tour_operator' value="<?= $_GET['id'] ?>">
            <label>Nom</label><br>
            <input type="text" name="name" placeholder="name"><br>
            <label>Note</label><br>
            <input type="number" min="0" max="5" name="grade" placeholder="/5"><br>
            <label>Lien</label><br>
            <input type="text" name="link" placeholder="Lien"><br>
                <input type="checkbox" id="scales" value="1" name="is_premium"
                checked>
                <label for="scales">Premium</label>
                <input type="checkbox" id="horns" value="0" name="is_premium">
                <label for="horns">No Premium</label><br>
                <label><b> Logo </b></label><br>
                <input class="file" type="text" name="logo" id="photo"><br>
            <button type="submit">Modifier</button>
        </form><br>
        
    </div>
</div>