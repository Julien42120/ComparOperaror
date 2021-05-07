<?
 include '../partials/header.php';
?>



<div class="AjoutTourOp">
   
    <div class="formAddTour"> 
        <h2>Ajout de Tour Operateur</h2>
        <form action="process/process_Create_Tour.php" method="POST" enctype="multipart/form-data">
            <label>Nom</label><br>
            <input type="text" name="name" placeholder="name"><br>
            <label>Note</label><br>
            <input type="number" min="0" max="5" name="grade" placeholder="/5"><br>
            <label>Lien</label><br>
            <input type="text" name="link" placeholder="Lien"><br>
                <input type="checkbox" id="scales" value="1" name="is_premium"
                checked>
                <label for="scales">Premium</label><br>
                <input type="checkbox" id="horns" value="0" name="is_premium">
                <label for="horns">No Premium</label><br>
                <label><b> Logo </b></label><br>
                <input class="file" type="text" name="logo">
                <button type="submit">Ajout</button>
        </form>
    </div>
</div>
