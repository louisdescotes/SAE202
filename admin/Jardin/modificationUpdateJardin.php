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
    $jardin_img = htmlspecialchars($_POST['img']);
    $jardin_ownerId = htmlspecialchars($_POST['ownerId']);

    $stmt = $db->prepare('UPDATE JARDIN SET 
                          name = "'.$jardin_name.'", 
                          ville = "'.$jardin_ville.'", 
                          CP = "'.$jardin_CP.'", 
                          adresse = "'.$jardin_adresse.'", 
                          taille = "'.$jardin_taille.'", 
                          max = "'.$jardin_max.'", 
                          img = "'.$jardin_img.'", 
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
