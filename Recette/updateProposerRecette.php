<?php
    require_once('../admin/conf.inc.php');
    require_once('../assets/conf/header.inc.php');

session_start();
$_SESSION['information'] = '';
$affichage_retour = '';

$nomRecette = $_POST['nomRecette'];
$descriptionRecette = $_POST['descriptionRecette'];
$creatorId = $_SESSION['id'];
$plantes = isset($_POST['planteCheckbox']) ? $_POST['planteCheckbox'] : [];

$image = '';

if (!empty($_FILES['image']['name'])) {
    $imageType = $_FILES["image"]["type"];
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

    $nouvelle_image = date("Y_m_d_H_i_s") . "---" . basename($_FILES["image"]["name"]);

    if (!move_uploaded_file($_FILES["image"]["tmp_name"], "../assets/Uploads/" . $nouvelle_image)) {
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

$req = $db->prepare('INSERT INTO RECETTE (name, description, img, creatorId) VALUES (:nomRecette, :descriptionRecette, :image, :creatorId)');
$req->execute(array(
    'nomRecette' => $nomRecette,
    'descriptionRecette' => $descriptionRecette,
    'image' => $image,
    'creatorId' => $creatorId
));

$lastRecetteId = $db->lastInsertId();

try {
    if(!empty($nomRecette) && !empty($descriptionRecette) && !empty($creatorId) && !empty($plantes)) {
        foreach ($plantes as $planteId) {
        $req2 = $db->prepare('INSERT INTO RECETTE_PLANTE (idRecette, idPlante) VALUES (:idRecette, :idPlante)');
        $req2->execute(array(
            'idRecette' => $lastRecetteId,
            'idPlante' => $planteId
        ));
    }
    $affichage_retour = '
    <div class="popup w-fit fixed bottom-2.5 right-2.5 cursor-pointer">
        <div class="absolute right-2.5 top-2.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>    </div>
        <div class="flex items-center p-5 gap-5 bg-cream rounded-md w-fit"> 
        <div class="w-20"> 
            <img draggable="false" src="../assets/img/gautier.png" alt="gautier"> 
        </div>
            <p class="max-w-60">Votre recette a été ajoutée.</p>
        <div>
    </div>';
    $_SESSION['information'] = $affichage_retour;
} else {
    $affichage_retour = '
    <div class="popup w-fit fixed bottom-2.5 right-2.5 cursor-pointer">
        <div class="absolute right-2.5 top-2.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>    </div>
        <div class="flex items-center p-5 gap-5 bg-cream rounded-md w-fit"> 
        <div class="w-20"> 
            <img draggable="false" src="../assets/img/louis.png" alt="erreur"> 
        </div>
            <p class="max-w-60">Erreur: Tout les champs sont obligatoires</p>
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
            <p class="max-w-60">Erreur lors de la création de la recette</p>
        <div>
    </div>';
    $_SESSION['information'] = $affichage_retour;
}

header('Location: /Recette/recetteList.php');
exit();
?>
