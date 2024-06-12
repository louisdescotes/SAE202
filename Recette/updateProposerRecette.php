<?php
require_once('../assets/conf/conf.inc.php');
require_once('../assets/conf/header.inc.php');

$nomRecette = $_POST['nomRecette'];
$descriptionRecette = $_POST['descriptionRecette'];
$idJardin = $_POST['nomJardin']; 
$creatorId = $_SESSION['id'];
$plantes = isset($_POST['planteCheckbox']) ? $_POST['planteCheckbox'] : [];

$image = '';

if (!empty($_FILES['image']['name'])) {
    $imageType = $_FILES["image"]["type"];
    if (!in_array($imageType, ['image/png', 'image/jpeg', 'image/jpg'])) {
        echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG et JPEG sont autorisés.</p>' . "\n";
        exit();
    }

    $nouvelle_image = date("Y_m_d_H_i_s") . "---" . basename($_FILES["image"]["name"]);

    if (!move_uploaded_file($_FILES["image"]["tmp_name"], "../assets/Uploads/" . $nouvelle_image)) {
        echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>' . "\n";
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

foreach ($plantes as $planteId) {
    $req2 = $db->prepare('INSERT INTO RECETTE_PLANTE (idRecette, idPlante) VALUES (:idRecette, :idPlante)');
    $req2->execute(array(
        'idRecette' => $lastRecetteId,
        'idPlante' => $planteId
    ));
}

header('Location: /Recette/recetteList.php');
exit();
?>
