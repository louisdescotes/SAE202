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
$ownerId = $_SESSION['id'];

$image = '';

if (!empty($_FILES['img']['name'])) {
    $imageType = $_FILES["img"]["type"];
    if (!in_array($imageType, ['image/png', 'image/jpeg', 'image/jpg'])) {
        echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG et JPEG sont autorisés.</p>' . "\n";
        die();
    }

    $nouvelle_image = date("Y_m_d_H_i_s") . "---" . basename($_FILES["img"]["name"]);

    if (!move_uploaded_file($_FILES["img"]["tmp_name"], "../assets/Uploads/" . $nouvelle_image)) {
        echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>' . "\n";
        die();
    }

    $image = $nouvelle_image;
}

if(!empty($ownerId) && !empty($name)) {
    
    $req = $db->prepare('INSERT INTO RESERVATION (nameJardin, villeJardin, CPJardin, adresseJardin, tailleJardin, maxJardin, imgJardin, _idUser) 
    VALUES ("'.$name.'",
            "'.$ville.'", 
            "'.$CP.'", 
            "'.$adresse.'", 
            "'.$taille.'",
            "'.$max.'", 
            "'.$image.'", 
            "'.$ownerId.'")');
    $req->execute();

        header('Location: /index.php');
}
else {
    echo 'Erreur, nous n\'avons pas pu vous inscrire au jardin. Veuillez réessayer plus tard.';
}
