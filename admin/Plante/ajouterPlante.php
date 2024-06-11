<?php
echo '<form action="/admin/Plante/confirmationPlante.php" method="post">';
echo '<div class="flex flex-col w-max">
        <label for="name">Nom</label>
        <input type="text" id="name" name="name" placeholder="nom">
      </div>';
      echo '<div class="flex flex-col w-max">
      <label for="typePlanteId">typePlanteId</label>
      <input type="text" id="typePlanteId" name="typePlanteId" placeholder="typeIdPlante">
    </div>';

    echo '<div class="flex flex-col w-max">
    <label for="jardinId">jardinId</label>
    <input type="text" id="jardinId" name="jardinId" placeholder="jardinId">
  </div>';
      

echo '<div class="flex flex-col w-max button-primary pointer">
        <input type="submit" value="ajouter">
      </div>';
echo '</form>';
?>