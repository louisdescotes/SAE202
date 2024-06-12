<?php
echo '<form action="/admin/Plante/confirmationPlante.php" method="post" enctype="multipart/form-data">';
echo '<div class="flex flex-col w-max">
        <label for="name">Nom</label>
        <input type="text" id="name" name="name" placeholder="nom">
      </div>';
echo '<div class="flex flex-col w-max">
        <label for="typePlanteId">Type Plante ID</label>
        <input type="text" id="typePlanteId" name="typePlanteId" placeholder="typeIdPlante">
      </div>';
echo '<div class="flex flex-col w-max">
        <label for="img">Image</label>
        <input type="file" id="img" name="img" placeholder="img">
      </div>';
echo '<div class="flex flex-col w-max button-primary pointer">
        <input type="submit" value="Ajouter">
      </div>';
echo '</form>';
?>
