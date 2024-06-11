<?php
require_once('../../assets/conf/conf.inc.php');

$planteName = htmlspecialchars($_POST['name']);
$typePlanteId = htmlspecialchars($_POST['typePlanteId']);
$img = htmlspecialchars($_POST['img']);
$jardinId = htmlspecialchars($_POST['jardinId']);

$sql = 'INSERT INTO PLANTE (name, typePlanteId, jardinId,img) 
        VALUES ("'.$planteName.'", "'.$typePlanteId.'", "'.$img.'", "'.$jardinId.'")';

$stmt = $db->query($sql);

header('Location: /admin/admin.php');
?>
