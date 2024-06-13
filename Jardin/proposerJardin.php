<?php
require_once('../assets/conf/head.inc.php');
require_once('../assets/conf/conf.inc.php');
require_once('../assets/conf/header.inc.php');
 
echo '<form action="/Jardin/proposerVerif.php" method="post" enctype="multipart/form-data">';
echo '<div class="flex flex-col w-max">
        <label for="name">Nom</label>
        <input type="text" id="name" name="name" placeholder="nom">
      </div>';
echo '<div class="flex flex-col w-max">
        <label for="ville">Ville</label>
        <input type="text" id="ville" name="ville" placeholder="ville">
      </div>';
echo '<div class="flex flex-col w-max">
        <label for="CP">Code Postal</label>
        <input type="text" id="CP" name="CP" placeholder="CP">
      </div>';
echo '<div class="flex flex-col w-max">
        <label for="adresse">Adresse</label>
        <input type="text" id="adresse" name="adresse" placeholder="adresse">
      </div>';
echo '<div class="flex flex-col w-max">
        <label for="taille">Taille m2</label>
        <input type="number" id="taille" name="taille" placeholder="taille">
      </div>';
echo '<div class="flex flex-col w-max">
        <label for="max">Nombre Maximum de Personnes</label>
        <input type="number" id="max" name="max" placeholder="max">
      </div>';
echo '<div class="flex flex-col w-max">
        <label for="img">Image</label>
        <input type="file" id="img" name="img" placeholder="img">
      </div>';
      echo '<div class="flex flex-col w-max">
      <input type="hidden" id="ownerId" name="ownerId" value="'.$_SESSION['id'].'" placeholder="ownerId">
    </div>';
echo '<div class="flex flex-col w-max button-primary pointer">
        <input type="submit" value="ajouter">
      </div>';
echo '</form>';
?>