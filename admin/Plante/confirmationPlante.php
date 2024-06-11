<?php
require_once('../../assets/conf/conf.inc.php');

$planteName = htmlspecialchars($_POST['name']);
$typePlanteId = htmlspecialchars($_POST['typePlanteId']);
$jardinId = htmlspecialchars($_POST['jardinId']);

$sql = 'INSERT INTO PLANTE (name, typePlanteId, jardinId) 
        VALUES ("'.$planteName.'", "'.$typePlanteId.'", "'.$jardinId.'")';

$stmt = $db->query($sql);

header('Location: /admin/admin.php');
?>
