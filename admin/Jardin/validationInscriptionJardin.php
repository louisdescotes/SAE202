<?php
require_once('../../assets/conf/conf.inc.php');

$jardin_name = htmlspecialchars($_POST['name']);
$jardin_ville = htmlspecialchars($_POST['ville']);
$jardin_CP = htmlspecialchars($_POST['CP']);
$jardin_adresse = htmlspecialchars($_POST['adresse']);
$jardin_taille = intval($_POST['taille']);
$jardin_max = intval($_POST['max']);
$jardin_ownerId = htmlspecialchars($_POST['ownerId']);

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


$sql = 'INSERT INTO JARDIN (name, ville, CP, adresse, taille, max, img, ownerId) 
    VALUES ("' . $jardin_name . '", "' . $jardin_ville . '", "' . $jardin_CP . '", "' . $jardin_adresse . '", ' . $jardin_taille . ', ' . $jardin_max . ', "' . $image . '", "' . $jardin_ownerId . '")';
    $stmt = $db->query($sql);

    $idJardin = $db->lastInsertId();

    for ($i = 1; $i < $jardin_max; $i++) {
        $sql3 = 'INSERT INTO PARCELLE (superficie, jardinId) 
         VALUES (' . $jardin_taille . ', ' . $idJardin . ')';
        $stmt3 = $db->query($sql3);
    }
    $stmt3->execute();

header('Location: /admin/admin.php');
?>
