<?php

require_once('../assets/conf/head.inc.php');
require_once('../assets/conf/conf.inc.php');
require_once('../assets/conf/header.inc.php');


$name = $_POST['name'];
$ville = $_POST['ville'];
$CP = $_POST['CP'];
$adresse = $_POST['adresse'];
$taille = $_POST['taille'];
$max = $_POST['max'];
$img = $_POST['img'];
$ownerId = $_SESSION['id'];

require_once('../assets/conf/conf.inc.php');

if(!empty($ownerId) && !empty($name)) {
    
    $req = $db->prepare('INSERT INTO RESERVATION (nameJardin, villeJardin, CPJardin, adresseJardin, tailleJardin, maxJardin, imgJardin, _idUser) 
    VALUES ("'.$name.'",
            "'.$ville.'", 
            "'.$CP.'", 
            "'.$adresse.'", 
            "'.$taille.'",
            "'.$max.'", 
            "'.$img.'", 
            "'.$ownerId.'")');
    $req->execute();

        header('Location: /index.php');
}
else {
    echo 'Erreur, nous n\'avons pas pu vous inscrire au jardin. Veuillez réessayer plus tard.';
}
