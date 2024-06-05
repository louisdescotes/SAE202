<?php
echo '<span>Ajouter un jardin</span>';

echo '<form action="/sae202/admin/Parcelle/validationInscriptionParcelle.php" method="post">';
echo '<input type="text" name="nomParcelle" placeholder="nom">';
echo '<input type="int" name="nbPersonneParcelle" placeholder="nbPersonne">';
echo '<input type="int" name="superficieParcelle" placeholder="superficie">';
echo '<input type="text" name="villeParcelle" placeholder="villeParcelle">';
echo '<input type="text" name="CPParcelle" placeholder="CPParcelle">';
echo '<input type="text" name="adresseParcelle" placeholder="adresseParcelle">';
echo '<input type="text" name="_id_user" placeholder="_id_user">';
echo '<input type="submit" value="ajouter">';
echo '</form>';
?>