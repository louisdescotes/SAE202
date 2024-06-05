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
        $user_modifcation = $_GET['num'];
        try {
            $req = $db->prepare('SELECT * FROM USER WHERE idUSer = :user_modifcation');
            $req->bindParam(':user_modifcation', $user_modifcation, PDO::PARAM_INT);
            
            if ($req->execute()) {
                $rep = $req->fetch();
                echo '<form action="/sae202/admin/User/modificationUpdateUser.php" method="post">';
                echo '<input type="hidden" name="idUser" value="'.$rep['idUser'].'">';
                echo '<input type="text" name="nomUser" value="'.$rep['nomUser'].'">';
                echo '<input type="text" name="prenomUser" value="'.$rep['prenomUser'].'">';
                echo '<input type="text" name="emailUser" value="'.$rep['emailUser'].'">';
                echo '<input type="text" name="mdpUser" value="'.$rep['mdpUser'].'">';
                echo '<input type="text" name="photoUser" value="'.$rep['photoUser'].'">';
                echo '<input type="submit" value="modifier">';
                echo '</form>';
                
            } else {
                echo 'Échec de l\'affichage des données de l\'utilisateur.';
            }
        } catch(PDOException $e) {
            echo 'Erreur lors de la modification: ' . $e->getMessage();
        }
    }
?>
