<?php
    /**
     * Connexion à la base de données
     */
    try {
        $db= new PDO('mysql:host=localhost;dbname=sae202Base;charset=UTF8;', 'phpmyadmin', 'PASSWORD');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch(PDOException $e) {
        echo 'Erreur de connexion:' . $e->getMessage();
        }

    
    if (isset($_GET['num'])) {
        $user_delete = $_GET['num'];
    
        try {
            $req = $db->prepare('DELETE FROM USER WHERE idUSer = :user_delete');
            $req->bindParam(':user_delete', $user_delete, PDO::PARAM_INT);
            
            if ($req->execute()) {
                header('Location: /sae202/admin.php');
            } else {
                echo 'Échec de la suppression de l\'utilisateur.';
            }
        } catch(PDOException $e) {
            echo 'Erreur lors de la suppression: ' . $e->getMessage();
        }
    }
?>