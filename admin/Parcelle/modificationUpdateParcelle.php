<?php
$parcelle_id = $_POST['idParcelle'];
$parcelle_superficie = $_POST['superficie'];
$parcelle_jardinId = $_POST['jardinId'];
$parcelle_occupantId = $_POST['occupantId'];

if(!empty($parcelle_id) && !empty($parcelle_superficie) && !empty($parcelle_jardinId) && !empty($parcelle_occupantId)) {

    try {
        $db= new PDO('mysql:host=localhost;dbname=sae202Base;charset=UTF8;', 'phpmyadmin', 'PASSWORD');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e) {
        echo 'Erreur de connexion:' . $e->getMessage();
    }
    
    $req = $db->query('UPDATE PARCELLE SET superficie = "'.$parcelle_superficie.'", jardinId = "'.$parcelle_jardinId.'", occupantId = "'.$parcelle_occupantId.'" WHERE idParcelle = '.$parcelle_id.';');  
    header('Location: /sae202/admin.php');
}
else {
    echo 'Veuillez remplir tous les champs';
}


?>