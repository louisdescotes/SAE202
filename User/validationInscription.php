<?php
    $nomUser = htmlspecialchars($_POST['name']);
    $prenomUser = htmlspecialchars($_POST['forname']);
    $emailUser = htmlspecialchars($_POST['email']);
    $mdpUser = htmlspecialchars($_POST['password']);

    require_once('../admin/conf.inc.php');
    
    $req = $db->query('INSERT INTO USER(name, forname, email, password) 
    VALUES ("'.$nomUser.'",
            "'.$prenomUser.'",
            "'.$emailUser.'",
            "'.$mdpUser.'")'
        );  
    header('Location: /User/userConnexion.php');

?>