<?php
    /**
     * Connexion à la base de données
     */
    require_once('../admin/conf.inc.php');

    
    if (isset($_POST['num'])) {
        $jardin_delete = $_POST['num'];
    
        try {
            $req = $db->prepare('DELETE FROM JARDIN WHERE idJardin = :jardin_delete');
            $req->bindParam(':jardin_delete', $jardin_delete, PDO::PARAM_INT);
            
            if ($req->execute()) {
                header('Location: /User/profil.php');
            } else {
                echo 'Échec de la suppression du jardin.';
            }
        } catch(PDOException $e) {
            echo 'Erreur lors de la suppression: ' . $e->getMessage();
        }
    }
?>