<?php
echo '<span>Ajouter un utilisateur</span>';

echo '<form action="/sae202/admin/User/validationInscriptionUser.php" method="post">';
echo '<input type="text" name="name" placeholder="nom">';
echo '<input type="text" name="forname" placeholder="prenom">';
echo '<input type="text" name="email" placeholder="email">';
echo '<input type="password" name="password" placeholder="mot de passe">';
echo '<input type="submit" value="inscription">';
echo '</form>';
?>