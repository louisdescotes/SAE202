<?php

    $nomUser = htmlspecialchars($_POST['nomUser']);
    $prenomUser = htmlspecialchars($_POST['prenomUser']);
    $emailUser = htmlspecialchars($_POST['emailUser']);
    $mdpUser = htmlspecialchars($_POST['mdpUser']);
    $photoUser = $_POST['photoUser'] ?? 'default.jpg';

    echo $nomUser, $prenomUser, $emailUser, $mdpUser, $photoUser;

    try {
        $db= new PDO('mysql:host=localhost;dbname=sae202Base;charset=UTF8;', 'phpmyadmin', 'PASSWORD');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e) {
        echo 'Erreur de connexion:' . $e->getMessage();
    }
    
    $req = $db->query('INSERT INTO USER(nomUser, prenomUser, emailUser, mdpUser, photoUser) 
    VALUES ("'.$nomUser.'",
            "'.$prenomUser.'",
            "'.$emailUser.'",
            "'.$mdpUser.'",
            "'.$photoUser.'")'
        );  
    header('Location: /sae202/index.php');

?>