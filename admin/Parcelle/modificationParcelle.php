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
                echo '<input type="text" name="superficie" value="'.$rep['superficie'].'">';
                echo '<input type="int" name="jardinId" value="'.$rep['jardinId'].'">';
                echo '<input type="int" name="occupantId" value="'.$rep['occupantId'].'">';
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
