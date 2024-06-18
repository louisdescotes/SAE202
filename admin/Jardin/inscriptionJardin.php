<?php

echo '<form action="/admin/Jardin/validationInscriptionJardin.php" method="post" enctype="multipart/form-data">';
echo '<div class="flex flex-col w-max">
        <label for="name">Nom</label>
        <input type="text" id="name" name="name" placeholder="nom" >
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
        <label for="taille">Taille du jardin (m2)</label>
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
        <label for="ownerId">OwnerId</label>';
        $req2 = $db->prepare('SELECT * FROM USER');
        $req2->execute();
        $owners = $req2->fetchAll();
    
        echo '<select id="ownerId" name="ownerId">';
        echo '<option value="" disabled selected></option>';
    
        foreach ($owners as $owner) {
            echo '<option value="' . htmlspecialchars($owner['idUser']) . '">' . htmlspecialchars($owner['name']) . ' ' . htmlspecialchars($owner['forname']) . '</option>';
        }
        echo '</select>';

echo '</div>';
echo '<div class="flex flex-col w-max pointer">
        <input class="button-primary" type="submit" value="ajouter">
      </div>';
echo '</form>';
?>
