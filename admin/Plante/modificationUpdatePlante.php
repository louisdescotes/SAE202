<?php
$idPlante = $_POST['idPlante'];
$name = $_POST['name'];
$typePlanteId = $_POST['typePlanteId'];
$img = $_POST['img'];

if(!empty($idPlante) && !empty($name) && !empty($typePlanteId)) {

    require_once('../../assets/conf/conf.inc.php');

    
    $req = $db->query('UPDATE PLANTE SET name = "'.$name.'", img ="'.$img.'",typePlanteId = "'.$typePlanteId.'" WHERE idPlante = '.$idPlante.';');  
    header('Location: /admin/admin.php');
}
else {
    echo 'Veuillez remplir tous les champs';
}

?>