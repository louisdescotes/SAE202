
<?php
    /**
     * Connexion à la base de données
     */
    require_once('../../assets/conf/conf.inc.php');

    
    if (isset($_GET['num'])) {
        $typePlante_modification = $_GET['num'];
        try {
            $req = $db->prepare('SELECT * FROM TYPE_PLANTE WHERE idTypePlante = :typePlante_modification');
            $req->bindParam(':typePlante_modification', $typePlante_modification, PDO::PARAM_INT);
            
            if ($req->execute()) {
                $rep = $req->fetch();
                echo '<form action="/admin/TypePLante/modificationUpdateTypePlante.php" method="post">';
                echo '<input type="hidden" name="idTypePlante" value="'.$rep['idTypePlante'].'">';
                echo '<input type="text" name="typeName" value="'.$rep['typeName'].'">';
                echo '<input type="int" name="origineName" value="'.$rep['origineName'].'">';
                echo '<input type="submit" value="modifier">';
                echo '</form>';
                
            } else {
                echo 'Échec de l\'affichage des données des types de plantes.';
            }
        } catch(PDOException $e) {
            echo 'Erreur lors de la modification: ' . $e->getMessage();
        }
    }
?>
