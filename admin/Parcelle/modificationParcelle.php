<?php
    /**
     * Connexion à la base de données
     */
    require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/conf.inc.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/conf/head.inc.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/conf/header.inc.php';    
    
    if (isset($_GET['num'])) {
        $parcelle_modifcation = $_GET['num'];
        try {
            $req = $db->prepare('SELECT * FROM PARCELLE WHERE idParcelle = :parcelle_modifcation');
            $req->bindParam(':parcelle_modifcation', $parcelle_modifcation, PDO::PARAM_INT);
            
            if ($req->execute()) {
                $rep = $req->fetch();
                echo '<form action="/admin/Parcelle/modificationUpdateParcelle.php" method="post">';
                echo '<input type="hidden" name="idParcelle" value="'.$rep['idParcelle'].'">';

                echo '<div class="flex flex-col w-max">';
                echo '<label class="text-main satoshi-medium text-sm" for="superficie">Superficie</label>';
                echo '<input class="input" type="text" name="superficie" value="'.$rep['superficie'].'">';
                echo '</div>';
                echo '<div class="flex flex-col w-max">';
                echo '<label class="text-main satoshi-medium text-sm" for="jardinId">JardinId</label>';
                echo '<input class="input" type="int" name="jardinId" value="'.$rep['jardinId'].'">';
                echo '</div>';
                echo '<div class="flex flex-col w-max">';
                echo '<label class="text-main satoshi-medium text-sm" for="occupantId">OccupantId</label>';
                echo '<input class="input" type="int" name="occupantId" value="'.$rep['occupantId'].'">';
                echo '</div>';

                echo '<input class="button-primary text-sm" type="submit" value="modifier">';
                echo '</form>';
                
            } else {
                echo 'Échec de l\'affichage des données de la parcelle.';
            }
        } catch(PDOException $e) {
            echo 'Erreur lors de la modification: ' . $e->getMessage();
        }
    }
?>
