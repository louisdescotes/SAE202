<?php
try {
    require_once('../../assets/conf/conf.inc.php');

    $idJardin = intval($_POST['idJardin']);
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

    $stmt = $db->prepare('UPDATE JARDIN SET 
                          name = "'.$jardin_name.'", 
                          ville = "'.$jardin_ville.'", 
                          CP = "'.$jardin_CP.'", 
                          adresse = "'.$jardin_adresse.'", 
                          taille = "'.$jardin_taille.'", 
                          max = "'.$jardin_max.'", 
                          img = "'.$image.'", 
                          ownerId = "'.$jardin_ownerId.'" 
                          WHERE idJardin = '.$idJardin.';');


    if ($stmt->execute()) {
        header('Location: /admin/admin.php');
        exit();
    } else {
        echo "Une erreur s'est produite lors de la mise à jour des données.";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
