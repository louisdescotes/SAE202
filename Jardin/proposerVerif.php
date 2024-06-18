<?php

require_once('../assets/conf/head.inc.php');
require_once('../admin/conf.inc.php');
require_once('../assets/conf/header.inc.php');


$_SESSION['information'] = '';
$affichage_retour = '';

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


        $affichage_retour = '
        <div class="popup w-fit fixed bottom-2.5 right-2.5 cursor-pointer">
            <div class="absolute right-2.5 top-2.5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>    </div>
            <div class="flex items-center p-5 gap-5 bg-cream rounded-md w-fit"> 
            <div class="w-20"> 
                <img draggable="false" src="../assets/img/louis.png" alt="erreur"> 
            </div>
                <p class="max-w-60">Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG et JPEG sont autorisés.</p>
            <div>
        </div>';
        $_SESSION['information'] = $affichage_retour;
        exit();
    }

    $nouvelle_image = date("Y_m_d_H_i_s") . "---" . basename($_FILES["img"]["name"]);

    if (!move_uploaded_file($_FILES["img"]["tmp_name"], "../assets/Uploads/" . $nouvelle_image)) {
        $affichage_retour = '
    <div class="popup w-fit fixed bottom-2.5 right-2.5 cursor-pointer">
        <div class="absolute right-2.5 top-2.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>    </div>
        <div class="flex items-center p-5 gap-5 bg-cream rounded-md w-fit"> 
        <div class="w-20"> 
            <img draggable="false" src="../assets/img/louis.png" alt="erreur"> 
        </div>
            <p class="max-w-60">Problème avec la sauvegarde de l\'image, désolé...</p>
        <div>
    </div>';
    $_SESSION['information'] = $affichage_retour;
        exit();
    }

    $image = $nouvelle_image;
}
try {
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

            header('Location: /Jardin/jardinList.php');
            $affichage_retour = '
            <div class="popup w-fit fixed bottom-2.5 right-2.5 cursor-pointer">
                <div class="absolute right-2.5 top-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>    </div>
                <div class="flex items-center p-5 gap-5 bg-cream rounded-md w-fit"> 
                <div class="w-20"> 
                    <img draggable="false" src="../assets/img/ioni.png" alt="Ioni"> 
                </div>
                    <p class="max-w-60">Votre demande a été envoyée à l’admin, elle sera gérée dans les plus brefs délais.</p>
                <div>
            </div>';
            $_SESSION['information'] = $affichage_retour;
    }
} catch (PDOException $e) {
    $affichage_retour = '
<div class="popup w-fit fixed bottom-2.5 right-2.5 cursor-pointer">
    <div class="absolute right-2.5 top-2.5">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>    </div>
    <div class="flex items-center p-5 gap-5 bg-cream rounded-md w-fit"> 
    <div class="w-20"> 
        <img draggable="false" src="../assets/img/louis.png" alt="erreur"> 
    </div>
        <p class="max-w-60">Erreur: nous n\'avons pas pu vous inscrire au jardin. Veuillez réessayer plus tard</p>
    <div>
</div>';
$_SESSION['information'] = $affichage_retour;
}


