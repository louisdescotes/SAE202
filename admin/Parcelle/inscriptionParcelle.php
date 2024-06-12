<?php
echo '<form action="/admin/Parcelle/validationInscriptionParcelle.php" method="post">';
echo '<div class="flex flex-col w-max">
        <label for="superficie">Superficie</label>
        <input type="text" name="superficie" placeholder="superficie">
      </div>';
echo '<div class="flex flex-col w-max">
        <label for="JardinId">JardinId</label>';

$req2 = $db->prepare('SELECT JARDIN.idJardin, USER.name as userName FROM JARDIN INNER JOIN USER ON JARDIN.ownerId = USER.idUser');
$req2->execute();
$jardins = $req2->fetchAll();

echo '<select id="jardinId" name="jardinId">';
foreach ($jardins as $jardin) {
    echo '<option value="' . htmlspecialchars($jardin['idJardin']) . '">' . htmlspecialchars($jardin['userName']) . '</option>';
}
echo '</select>';
echo '</div>';

echo '<div class="flex flex-col w-max">
        <label for="OccupantId">OccupantId</label>';

$req2 = $db->prepare('SELECT USER.idUser, USER.name as userName FROM USER');
$req2->execute();
$occupants = $req2->fetchAll();

echo '<select id="OccupantId" name="OccupantId">';
foreach ($occupants as $occupant) {
    echo '<option value="' . htmlspecialchars($occupant['idUser']) . '">' . htmlspecialchars($occupant['userName']) . '</option>';
}
echo '</select>';
echo '</div>';

echo '<div class="flex flex-col w-max button-primary pointer">
        <input type="submit" value="ajouter">
      </div>';
echo '</form>';
?>
