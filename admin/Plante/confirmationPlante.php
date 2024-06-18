<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/conf.inc.php';
$planteName = htmlspecialchars($_POST['name']);
$typePlanteId = htmlspecialchars($_POST['typePlanteId']);
$image = '';

if (!empty($_FILES['img']['name'])) {
    $imageType = $_FILES["img"]["type"];
    if (!in_array($imageType, ['image/png', 'image/jpeg', 'image/jpg'])) {
        echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG et JPEG sont autorisés.</p>' . "\n";
        die();
    }

    $nouvelle_image = date("Y_m_d_H_i_s") . "---" . basename($_FILES["img"]["name"]);

    if (!move_uploaded_file($_FILES["img"]["tmp_name"], "../../assets/Uploads/" . $nouvelle_image)) {
        echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>' . "\n";
        die();
    }

    $image = $nouvelle_image;
}

$sql = 'INSERT INTO PLANTE (name, typePlanteId, img) 
        VALUES (:name, :typePlanteId, :img)';

$stmt = $db->prepare($sql);
$stmt->execute([
    ':name' => $planteName,
    ':typePlanteId' => $typePlanteId,
    ':img' => $image
]);

header('Location: /admin/admin.php');
exit();
?>
