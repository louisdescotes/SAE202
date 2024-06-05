<?php
$userId = $_GET['idUser'];
$parcelleId = $_GET['idJardin'];

if(!empty($parcelleId) && !empty($userId)) {
    try {
        $db= new PDO('mysql:host=localhost;dbname=sae202Base;charset=UTF8;', 'phpmyadmin', 'PASSWORD');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e) {
        echo 'Erreur de connexion:' . $e->getMessage();
    }
    
    $req = $db->query('UPDATE PARCELLE SET occupantId = "'.$userId.'";');  
    header('Location: /sae202/admin.php');
}
else {
    echo 'Erreur, nous n\'avons pas pu vous inscrire au jardin. Veuillez réessayer plus tard.';
}
