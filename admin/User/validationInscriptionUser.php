<?php

    $nomUser = htmlspecialchars($_POST['name']);
    $prenomUser = htmlspecialchars($_POST['forname']);
    $emailUser = htmlspecialchars($_POST['email']);
    $mdpUser = htmlspecialchars($_POST['password']);

    try {
        $db= new PDO('mysql:host=localhost;dbname=sae202Base;charset=UTF8;', 'phpmyadmin', 'PASSWORD');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e) {
        echo 'Erreur de connexion:' . $e->getMessage();
    }
    
    $req = $db->query('INSERT INTO USER(name, forname, email, password) 
    VALUES ("'.$nomUser.'",
            "'.$prenomUser.'",
            "'.$emailUser.'",
            "'.$mdpUser.'")'
        );  
    header('Location: /sae202/index.php');

?>