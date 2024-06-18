<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/conf.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/conf/head.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/conf/header.inc.php';

echo '<form action="/admin/Plante/confirmationPlante.php" method="post" enctype="multipart/form-data">';
echo '<div class="flex flex-col w-max">
        <label class="text-main satoshi-medium text-sm" for="name">Nom</label>
        <input class="input" type="text" id="name" name="name" placeholder="nom">
      </div>';
echo '<div class="flex flex-col w-max">
        <label class="text-main satoshi-medium text-sm" for="typePlanteId">Type de Plante</label>';

$req2 = $db->prepare('SELECT idTypePlante, typeName as typePlanteName, origineName  FROM TYPE_PLANTE');
$req2->execute();
$typePlantes = $req2->fetchAll();

echo '<select id="typePlanteId" name="typePlanteId">';
foreach ($typePlantes as $typePlante) {
  echo '<option value="' . htmlspecialchars($typePlante['idTypePlante']) . '">' . htmlspecialchars($typePlante['typePlanteName'] . ' (' . $typePlante['origineName'] . ')') . '</option>';
}
echo '</select>';
echo '</div>';
echo '<div class="flex flex-col w-max">
        <label class="text-main satoshi-medium text-sm" for="Image">Image</label>
        <input class="" type="file" id="img" name="img" placeholder="img">
      </div>';
echo '<div class="flex flex-col w-max pointer">
        <input class="button-primary" type="submit" value="Ajouter">
      </div>';
echo '</form>';
?>
