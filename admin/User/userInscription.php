<?php
echo '<span>Ajouter un utilisateur</span>';

echo '<form action="/sae202/admin/User/validation_userInscription.php" method="post">';
echo '<input type="text" name="nomUser" placeholder="nom">';
echo '<input type="text" name="prenomUser" placeholder="prenom">';
echo '<input type="text" name="emailUser" placeholder="email">';
echo '<input type="password" name="mdpUser" placeholder="mot de passe">';
echo '<input type="file" name="photoUser" placeholder="image de profil">';
echo '<input type="submit" value="inscription">';
echo '</form>';
?>