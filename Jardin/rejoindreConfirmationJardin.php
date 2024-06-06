<?php
$userId = $_GET['idUser'];
$parcelleId = $_GET['idJardin'];

require_once('./assets/conf/conf.inc.php');

if(!empty($parcelleId) && !empty($userId)) {
    
    $req = $db->query('UPDATE PARCELLE SET occupantId = "'.$userId.'";');  
    header('Location: /admin.php');
}
else {
    echo 'Erreur, nous n\'avons pas pu vous inscrire au jardin. Veuillez réessayer plus tard.';
}
