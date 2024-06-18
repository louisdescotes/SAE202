<?php
require_once('../assets/conf/head.inc.php');
require_once('../admin/conf.inc.php');
require_once('../assets/conf/header.inc.php');

echo '<form action="/Jardin/proposerVerif.php" method="post" enctype="multipart/form-data">';
echo       '<div class="flex flex-col w-max">
<label class="text-main satoshi-medium text-sm" for="ville">Nom</label>
<input class="" type="text" id="name" name="name" placeholder="name">
</div>';

echo '<div class="flex flex-col w-max">
        <label class="text-main satoshi-medium text-sm" for="ville">Ville</label>
        <input class="input" type="text" id="ville" name="ville" placeholder="ville">
      </div>';

echo '<div class="flex flex-col w-max">
        <label class="text-main satoshi-medium text-sm" for="CP">Code Postal</label>
        <input class="input" type="text" id="CP" name="CP" placeholder="Code Postal">
      </div>';

echo '<div class="flex flex-col w-max">
      <label class="text-main satoshi-medium text-sm" for="adresse">Adresse</label>
      <input class="input" type="text" id="adresse" name="adresse" placeholder="adresse">
    </div>';

echo '<div class="flex flex-col w-max">
    <label class="text-main satoshi-medium text-sm" for="taille">Taille m2</label>
    <input class="input" type="text" id="taille" name="taille" placeholder="taille">
  </div>';

echo '<div class="flex flex-col w-max">
  <label class="text-main satoshi-medium text-sm" for="max">Nombre Maximum de Personnes</label>
  <input class="number" type="text" id="max" name="max" placeholder="max">
</div>';

echo '<div class="flex flex-col w-max">
<label class="text-main satoshi-medium text-sm" for="img">Image</label>
<input class="" type="file" id="img" name="img" placeholder="img">
</div>';
echo '<div class="flex flex-col w-max">
      <input type="hidden" id="ownerId" name="ownerId" value="' . $_SESSION['id'] . '" placeholder="ownerId">
    </div>';
echo '<div class="flex flex-col w-max button-primary pointer">
        <input class="button-primary" type="submit" value="ajouter">
      </div>';
echo '</form>';
