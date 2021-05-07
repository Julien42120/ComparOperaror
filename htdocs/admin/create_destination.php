<?php include '../partials/header.php'; ?>

<div class="createDestination">
    <div class="CreateDest">
        <h2>créer une Destination</h2>

        <form action="process/process_Create_Destination.php" method="POST">
            <label>Ajout Destination</label><br>
            <input type="text" name="location" placeholder="Destination"><br>
            <label>PRIX</label><br>
            <input type="text" name="price" placeholder="prix"><br>
            <input type="hidden" name="id_tour_operator" value="<?=$_GET['id']?>"><br>
            <label><b> Image </b></label><br>
                <input class="file" type="text" name="image">
            <button type="submit">Ajout</button>
        </form>
    </div>
</div>