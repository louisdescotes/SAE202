<?php
$idTypePlante = $_POST['idTypePlante'];
$typeName = $_POST['typeName'];
$origineName = $_POST['origineName'];

if(!empty($idTypePlante) && !empty($typeName) && !empty($origineName)) {

    require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/conf.inc.php';    
    
    $req = $db->query('UPDATE TYPE_PLANTE SET typeName = "'.$typeName.'", origineName = "'.$origineName.'" WHERE idTypePlante = '.$idTypePlante.';');  
    header('Location: /admin/admin.php');
}
else {
    echo 'Veuillez remplir tous les champs';
}
?>