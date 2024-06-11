<?php
    /**
     * Connexion à la base de données
     */
    require_once('../../assets/conf/conf.inc.php');

    
    if (isset($_GET['num'])) {
        $plante_delete = $_GET['num'];
    
        try {
            $req = $db->prepare('DELETE FROM PLANTE WHERE idPlante = :plante_delete');
            $req->bindParam(':plante_delete', $plante_delete, PDO::PARAM_INT);
            
            if ($req->execute()) {
                header('Location: /admin/admin.php');
            } else {
                echo 'Échec de la suppression de la plante.';
            }
        } catch(PDOException $e) {
            echo 'Erreur lors de la suppression: ' . $e->getMessage();
        }
    }
?>