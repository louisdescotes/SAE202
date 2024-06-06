<?php
echo '<span>Ajouter une parcelle</span>';

echo '<form action="/sae202/admin/Parcelle/validationInscriptionParcelle.php" method="post">';
echo '<input type="text" name="superficie" placeholder="superficie">';
echo '<input type="int" name="jardinId" placeholder="jardinId">';
echo '<input type="int" name="occupantId" placeholder="occupantId">';
echo '<input type="submit" value="ajouter">';
echo '</form>';
?>