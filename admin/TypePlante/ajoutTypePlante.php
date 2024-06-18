<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/conf.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/conf/head.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/conf/header.inc.php';


echo '<form action="/admin/TypePlante/confirmationTypePlante.php" method="post">';
echo '<div class="flex flex-col w-max">
<label class="text-main satoshi-medium text-sm" for="name">Nom</label>
        <label class="text-main satoshi-medium text-sm" for="typeName">typeName</label>
        <input class="input" type="text" id="typeName" name="typeName" placeholder="typeName">
      </div>';
      echo '<div class="flex flex-col w-max">
      <label class="text-main satoshi-medium text-sm" for="origineName">OrigineName</label>
      <input class="input" type="text" id="origineName" name="origineName" placeholder="origineName">
    </div>';

echo '<div class="flex flex-col w-max pointer">
        <input class="button-primary text-sm" type="submit" value="ajouter">
      </div>';
echo '</form>';
?>