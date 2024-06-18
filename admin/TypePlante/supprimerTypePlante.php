<?php
    /**
     * Connexion à la base de données
     */
    require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/conf.inc.php';    
    
    if (isset($_GET['num'])) {
        $typePlante_delete = $_GET['num'];
    
        try {
            $req = $db->prepare('DELETE FROM TYPE_PLANTE WHERE idTypePlante = :typePlante_delete');
            $req->bindParam(':typePlante_delete', $typePlante_delete, PDO::PARAM_INT);
            
            if ($req->execute()) {
                header('Location: /admin/admin.php');
            } else {
                echo 'Échec de la suppression du type de la plante.';
            }
        } catch(PDOException $e) {
            echo 'Erreur lors de la suppression: ' . $e->getMessage();
        }
    }
?>