<?php
    $nomParcelle = htmlspecialchars($_POST['nomParcelle']);
    $nbPersonneParcelle = htmlspecialchars($_POST['nbPersonneParcelle']);
    $superficieParcelle = htmlspecialchars($_POST['superficieParcelle']);
    $villeParcelle = htmlspecialchars($_POST['villeParcelle']);
    $CPParcelle = htmlspecialchars($_POST['CPParcelle']);
    $adresseParcelle = htmlspecialchars($_POST['adresseParcelle']);
    $_id_user = $_POST['_id_user'];

    try {
        $db= new PDO('mysql:host=localhost;dbname=sae202Base;charset=UTF8;', 'phpmyadmin', 'PASSWORD');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e) {
        echo 'Erreur de connexion:' . $e->getMessage();
    }
    
    $req = $db->query('INSERT INTO PARCELLE(nomParcelle, nbPersonneParcelle, superficieParcelle, villeParcelle, CPParcelle, adresseParcelle,_id_user) 
    VALUES ("'.$nomParcelle.'",
            "'.$nbPersonneParcelle.'",
            "'.$superficieParcelle.'",
            "'.$villeParcelle.'",
            "'.$CPParcelle.'",
            "'.$adresseParcelle.'",
            "'.$_id_user.'")'
        );  
    header('Location: /sae202/index.php');

?>