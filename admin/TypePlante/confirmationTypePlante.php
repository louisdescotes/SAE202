<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/conf.inc.php';

$typeName = htmlspecialchars($_POST['typeName']);
$origineName = htmlspecialchars($_POST['origineName']);

$sql = 'INSERT INTO TYPE_PLANTE (typeName, origineName) 
        VALUES ("'.$typeName.'", "'.$origineName.'")';

$stmt = $db->query($sql);

header('Location: /admin/admin.php');
?>
