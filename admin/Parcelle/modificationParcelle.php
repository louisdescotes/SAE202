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
        $parcelle_modifcation = $_GET['num'];
        try {
            $req = $db->prepare('SELECT * FROM PARCELLE WHERE idParcelle = :parcelle_modifcation');
            $req->bindParam(':parcelle_modifcation', $parcelle_modifcation, PDO::PARAM_INT);
            
            if ($req->execute()) {
                $rep = $req->fetch();
                echo '<form action="/sae202/admin/Parcelle/modificationUpdateParcelle.php" method="post">';
                echo '<input type="hidden" name="idParcelle" value="'.$rep['idParcelle'].'">';
                echo '<input type="text" name="nomParcelle" value="'.$rep['nomParcelle'].'">';
                echo '<input type="int" name="nbPersonneParcelle" value="'.$rep['nbPersonneParcelle'].'">';
                echo '<input type="int" name="superficieParcelle" value="'.$rep['superficieParcelle'].'">';
                echo '<input type="text" name="villeParcelle" value="'.$rep['villeParcelle'].'">';
                echo '<input type="int" name="CPParcelle" value="'.$rep['CPParcelle'].'">';
                echo '<input type="text" name="adresseParcelle" value="'.$rep['adresseParcelle'].'">';
                echo '<input type="text" name="_id_user" value="'.$rep['_id_user'].'">';
                echo '<input type="submit" value="modifier">';
                echo '</form>';
                
            } else {
                echo 'Échec de l\'affichage des données de la parcelle.';
            }
        } catch(PDOException $e) {
            echo 'Erreur lors de la modification: ' . $e->getMessage();
        }
    }
?>
