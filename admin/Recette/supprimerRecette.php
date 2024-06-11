<?php

require_once('../../assets/conf/conf.inc.php');

if (isset($_GET['num'])) {
    $idRecette = $_GET['num'];

    try {
        $reqDeleteRecettePlante = $db->prepare('DELETE FROM RECETTE_PLANTE WHERE idRecette = :idRecette');
        $reqDeleteRecettePlante->bindParam(':idRecette', $idRecette, PDO::PARAM_INT);
        $reqDeleteRecettePlante->execute();

        $reqDeleteRecette = $db->prepare('DELETE FROM RECETTE WHERE idRecette = :idRecette');
        $reqDeleteRecette->bindParam(':idRecette', $idRecette, PDO::PARAM_INT);
        $reqDeleteRecette->execute();

        header('Location: /admin/admin.php');

    } catch(PDOException $e) {
        echo 'Erreur lors de la suppression: ' . $e->getMessage();
    }
}

?>
