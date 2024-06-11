<?php
echo '<form action="/admin/TypePlante/confirmationTypePlante.php" method="post">';
echo '<div class="flex flex-col w-max">
        <label for="typeName">typeName</label>
        <input type="text" id="typeName" name="typeName" placeholder="typeName">
      </div>';
      echo '<div class="flex flex-col w-max">
      <label for="origineName">origineName</label>
      <input type="text" id="origineName" name="origineName" placeholder="origineName">
    </div>';
      

echo '<div class="flex flex-col w-max button-primary pointer">
        <input type="submit" value="ajouter">
      </div>';
echo '</form>';
?>