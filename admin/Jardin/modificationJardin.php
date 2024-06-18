<?php
    /**
     * Connexion à la base de données
     */
    require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/conf.inc.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/conf/head.inc.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/conf/header.inc.php';
    
    if (isset($_GET['num'])) {
        $jardin_modifcation = $_GET['num'];
        try {
            $req = $db->prepare('SELECT * FROM JARDIN WHERE idJardin = :jardin_modifcation');
            $req->bindParam(':jardin_modifcation', $jardin_modifcation, PDO::PARAM_INT);
            
            if ($req->execute()) {
                $rep = $req->fetch();
                echo '<form action="/admin/Jardin/modificationUpdateJardin.php" method="post" enctype="multipart/form-data">';
                echo '<input type="hidden" name="idJardin" value="'.$rep['idJardin'].'">';
                echo '<div class="flex flex-col w-max">';
                echo '<label class="text-main satoshi-medium text-sm" for="name">Nom</label>';
                echo '<input class="input" type="text" id="name" name="name" value="'.$rep['name'].'">';
                echo '</div>';
                echo '<div class="flex flex-col w-max">';
                echo '<label class="text-main satoshi-medium text-sm" for="ville">Ville</label>';
                echo '<input class="input" type="text" id="ville" name="ville" value="'.$rep['ville'].'">';  
                echo '</div>';
                echo '<div class="flex flex-col w-max">';
                echo '<label class="text-main satoshi-medium text-sm" for="CP">Code Postal</label>';
                echo '<input class="input" type="text" id="CP" name="CP" value="'.$rep['CP'].'">';  
                echo '</div>';
                echo '<div class="flex flex-col w-max">';
                echo '<label class="text-main satoshi-medium text-sm" for="adresse">Adresse</label>';
                echo '<input class="input" type="text" id="adresse" name="adresse" value="'.$rep['adresse'].'">';
                echo '</div>';
                echo '<div class="flex flex-col w-max">';
                echo '<label class="text-main satoshi-medium text-sm" for="taille">Taille</label>';
                echo '<input class="input" type="number" id="taille" name="taille" value="'.$rep['taille'].'">';
                echo '</div>';
                echo '<div class="flex flex-col w-max">';
                echo '<label class="text-main satoshi-medium text-sm" for="max">Nombre Maximum de Personnes</label>';
                echo '<input class="input" type="number" id="max" name="max" value="'.$rep['max'].'">'; 
                echo '</div>';
                echo '<div class="flex flex-col w-max">';
                echo '<label class="text-main satoshi-medium text-sm" for="img">Image</label>';
                echo '<input class="" type="file" id="img" name="img" value="'.$rep['img'].'">';  
                echo '</div>';
                echo '<div class="flex flex-col w-max">';
                echo '<label class="text-main satoshi-medium text-sm" for="ownerId">ID Propriétaire</label>';
                echo '<input class="input" type="text" id="ownerId" name="ownerId" value="'.$rep['ownerId'].'">';
                echo '</div>';

                echo '<input class="button-primary text-sm" type="submit" value="modifier">';
                echo '</form>';
                
            } else {
                echo 'Échec de l\'affichage des données du jardin.';
            }
        } catch(PDOException $e) {
            echo 'Erreur lors de la modification: ' . $e->getMessage();
        }
    }
?>
