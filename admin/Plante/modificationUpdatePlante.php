<?php
$idPlante = $_POST['idPlante'];
$name = $_POST['name'];
$typePlanteId = $_POST['typePlanteId'];


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


if(!empty($idPlante) && !empty($name) && !empty($typePlanteId)) {

    require_once('../../assets/conf/conf.inc.php');

    
    $req = $db->query('UPDATE PLANTE SET name = "'.$name.'", img ="'.$image.'",typePlanteId = "'.$typePlanteId.'" WHERE idPlante = '.$idPlante.';');  
    header('Location: /admin/admin.php');
}
else {
    echo 'Veuillez remplir tous les champs';
}

?>