<?php
echo '<span>Ajouter un jardin</span>';

echo '<form action="/admin/Jardin/validationInscriptionJardin.php" method="post">';
echo '<label for="name">Nom</label>';
echo '<input type="text" id="name" name="name" placeholder="nom">';
echo '<label for="ville">Ville</label>';
echo '<input type="text" id="ville" name="ville" placeholder="ville">'; 
echo '<label for="CP">Code Postal</label>';
echo '<input type="text" id="CP" name="CP" placeholder="CP">';  
echo '<label for="adresse">Adresse</label>';
echo '<input type="text" id="adresse" name="adresse" placeholder="adresse">';
echo '<label for="taille">Taille</label>';
echo '<input type="number" id="taille" name="taille" placeholder="taille">';
echo '<label for="max">Nombre Maximum de Personnes</label>';
echo '<input type="number" id="max" name="max" placeholder="max">'; 
echo '<label for="img">Image</label>';
echo '<input type="file" id="img" name="img" placeholder="img">';
echo '<label for="ownerId">ID Propriétaire</label>';
echo '<input type="text" id="ownerId" name="ownerId" placeholder="ownerId">';
echo '<input type="submit" value="ajouter">';
echo '</form>';

?>