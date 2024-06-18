<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/conf.inc.php';
$superficie = htmlspecialchars($_POST['superficie']);
$jardinId = htmlspecialchars($_POST['jardinId']);
$occupantId = htmlspecialchars($_POST['occupantId']);



$req = $db->query('INSERT INTO PARCELLE(superficie, jardinId, occupantId)
VALUES ("'.$superficie.'",
        "'.$jardinId.'",
        "'.$occupantId.'")'
    );
header('Location: /admin/admin.php');

?>
