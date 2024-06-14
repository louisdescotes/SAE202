
<?php
    /**
     * Connexion à la base de données
     */
    require_once('../../admin/conf.inc.php');
    
    if (isset($_GET['num'])) {
        $plante_modification = $_GET['num'];
        try {
            $req = $db->prepare('SELECT * FROM PLANTE WHERE idPlante = :plante_modification');
            $req->bindParam(':plante_modification', $plante_modification, PDO::PARAM_INT);
            
            if ($req->execute()) {
                $rep = $req->fetch();
                echo '<form action="/admin/Plante/modificationUpdatePlante.php" method="post" enctype="multipart/form-data">';
                echo '<input type="hidden" name="idPlante" value="'.$rep['idPlante'].'">';
                echo '<input type="text" name="name" value="'.$rep['name'].'">';
                echo '<input type="file" name="img" value="'.$rep['img'].'">';
                echo '<input type="int" name="typePlanteId" value="'.$rep['typePlanteId'].'">';
                echo '<input type="submit" value="modifier">';
                echo '</form>';
                
            } else {
                echo 'Échec de l\'affichage des données des plantes.';
            }
        } catch(PDOException $e) {
            echo 'Erreur lors de la modification: ' . $e->getMessage();
        }
    }
?>
