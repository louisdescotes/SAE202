
<?php
    /**
     * Connexion à la base de données
     */
    require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/conf.inc.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/conf/head.inc.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/conf/header.inc.php';
    
    
    if (isset($_GET['num'])) {
        $plante_modification = $_GET['num'];
        try {
            $req = $db->prepare('SELECT * FROM PLANTE WHERE idPlante = :plante_modification');
            $req->bindParam(':plante_modification', $plante_modification, PDO::PARAM_INT);
            
            if ($req->execute()) {
                $rep = $req->fetch();
                echo '<form action="/admin/Plante/modificationUpdatePlante.php" method="post" enctype="multipart/form-data">';
                echo '<input type="hidden" name="idPlante" value="'.$rep['idPlante'].'">';

                echo '<div class="flex flex-col w-max">';
                echo '<label class="text-main satoshi-medium text-sm" for="name">Nom</label>';
                echo '<input class="input" type="text" name="name" value="'.$rep['name'].'">';
                echo '</div>';
                echo '<div class="flex flex-col w-max">';
                echo '<label class="text-main satoshi-medium text-sm" for="img">Image</label>';
                echo '<input class="" type="file" name="img" value="'.$rep['img'].'">';
                echo '</div>';
                echo '<div class="flex flex-col w-max">';
                echo '<label class="text-main satoshi-medium text-sm" for="typePlanteId">TypePlanteId</label>';
                echo '<input class="input" type="int" name="typePlanteId" value="'.$rep['typePlanteId'].'">';
                echo '</div>';

                echo '<input class="text-sm button-primary" type="submit" value="modifier">';
                echo '</form>';
                
            } else {
                echo 'Échec de l\'affichage des données des plantes.';
            }
        } catch(PDOException $e) {
            echo 'Erreur lors de la modification: ' . $e->getMessage();
        }
    }
?>
