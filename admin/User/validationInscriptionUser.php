<?php

    $nomUser = htmlspecialchars($_POST['name']);
    $prenomUser = htmlspecialchars($_POST['forname']);
    $emailUser = htmlspecialchars($_POST['email']);
    $mdpUser = htmlspecialchars($_POST['password']);

    require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/conf.inc.php';    
    
    $req = $db->query('INSERT INTO USER(name, forname, email, password) 
    VALUES ("'.$nomUser.'",
            "'.$prenomUser.'",
            "'.$emailUser.'",
            "'.$mdpUser.'")'
        );  
    header('Location: /admin/admin.php');

?>