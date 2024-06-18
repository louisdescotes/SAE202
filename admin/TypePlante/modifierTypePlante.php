
<?php
    /**
     * Connexion à la base de données
     */
    require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/conf.inc.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/conf/head.inc.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/conf/header.inc.php';
    
    
    if (isset($_GET['num'])) {
        $typePlante_modification = $_GET['num'];
        try {
            $req = $db->prepare('SELECT * FROM TYPE_PLANTE WHERE idTypePlante = :typePlante_modification');
            $req->bindParam(':typePlante_modification', $typePlante_modification, PDO::PARAM_INT);
            
            if ($req->execute()) {
                $rep = $req->fetch();
                echo '<form action="/admin/TypePLante/modificationUpdateTypePlante.php" method="post">';

                echo '<div class="flex flex-col w-max">';
                echo '<label class="text-main satoshi-medium text-sm" for="idTypePlante">idTypePlante</label>';
                echo '<input class="input" type="hidden" name="idTypePlante" value="'.$rep['idTypePlante'].'">';
                echo '</div>';

                echo '<div class="flex flex-col w-max">';
                echo '<label class="text-main satoshi-medium text-sm" for="typeName">typeName</label>';
                echo '<input class="input" type="text" name="typeName" value="'.$rep['typeName'].'">';
                echo '</div>';

                echo '<div class="flex flex-col w-max">';
                echo '<label class="text-main satoshi-medium text-sm" for="origineName">OrigineName</label>';
                echo '<input class="input" type="int" name="origineName" value="'.$rep['origineName'].'">';
                echo '</div>';

                echo '<input class="button-primary text-sm" type="submit" value="modifier">';

                
                echo '</form>';
                
            } else {
                echo 'Échec de l\'affichage des données des types de plantes.';
            }
        } catch(PDOException $e) {
            echo 'Erreur lors de la modification: ' . $e->getMessage();
        }
    }
?>
