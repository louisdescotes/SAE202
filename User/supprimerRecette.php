<?php

require_once('../admin/conf.inc.php');

if (isset($_POST['num'])) {
    $idRecette = $_POST['num'];

    try {
        $reqDeleteRecettePlante = $db->prepare('DELETE FROM RECETTE_PLANTE WHERE idRecette = :idRecette');
        $reqDeleteRecettePlante->bindParam(':idRecette', $idRecette, PDO::PARAM_INT);
        $reqDeleteRecettePlante->execute();

        $reqDeleteRecette = $db->prepare('DELETE FROM RECETTE WHERE idRecette = :idRecette');
        $reqDeleteRecette->bindParam(':idRecette', $idRecette, PDO::PARAM_INT);
        $reqDeleteRecette->execute();

        header('Location: /User/profil.php');

    } catch(PDOException $e) {
        echo 'Erreur lors de la suppression: ' . $e->getMessage();
    }
}

?>
