<?php
$parcelle_id = $_POST['idParcelle'];
$parcelle_nom = $_POST['nomParcelle'];
$parcelle_nbPersonne = $_POST['nbPersonneParcelle'];
$parcelle_surperficie = $_POST['superficieParcelle'];
$parcelle_ville = $_POST['villeParcelle'];
$parcelle_CP = $_POST['CPParcelle'];
$parcelle_adresse = $_POST['adresseParcelle'];
$_id_user = $_POST['_id_user'];

if(!empty($parcelle_id) && !empty($parcelle_nom) && !empty($parcelle_nbPersonne) && !empty($parcelle_surperficie)  && !empty($parcelle_ville)  && !empty($parcelle_CP)  && !empty($parcelle_adresse) && !empty($_id_user)) {

    try {
        $db= new PDO('mysql:host=localhost;dbname=sae202Base;charset=UTF8;', 'phpmyadmin', 'PASSWORD');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e) {
        echo 'Erreur de connexion:' . $e->getMessage();
    }
    
    $req = $db->query('UPDATE PARCELLE SET nomParcelle = "'.$parcelle_nom.'", nbPersonneParcelle = "'.$parcelle_nbPersonne.'", superficieParcelle = "'.$parcelle_surperficie.'", villeParcelle = "'.$parcelle_ville.'", adresseParcelle = "'.$parcelle_adresse.'", CPParcelle = "'.$parcelle_CP.'", _id_user = "'.$_id_user.'" WHERE idParcelle = '.$parcelle_id.';');  
    header('Location: /sae202/admin.php');
}
else {
    echo 'Veuillez remplir tous les champs';
}


?>