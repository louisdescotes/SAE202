<?php
    /**
     * Connexion à la base de données
     */
    require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/conf.inc.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/conf/head.inc.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/conf/header.inc.php';
    
    if (isset($_GET['num'])) {
        $user_modifcation = $_GET['num'];
        try {
            $req = $db->prepare('SELECT * FROM USER WHERE idUser = :user_modifcation');
            $req->bindParam(':user_modifcation', $user_modifcation, PDO::PARAM_INT);
            
            if ($req->execute()) {
                $rep = $req->fetch();
                echo '<form action="/admin/User/modificationUpdateUser.php" method="post">';
                echo '<input type="hidden" name="idUser" value="'.$rep['idUser'].'">';

                echo '<div class="flex flex-col w-max">';
                echo '<label>Name</label>';
                echo '<input type="text" name="name" value="'.$rep['name'].'">';
                echo '</div>';
                echo '<div class="flex flex-col w-max">';
                echo '<label>Forname</label>';
                echo '<input type="text" name="forname" value="'.$rep['forname'].'">';
                echo '</div>';
                echo '<div class="flex flex-col w-max">';
                echo '<label>Email</label>';
                echo '<input type="email" name="email" value="'.$rep['email'].'">';
                echo '</div>';
                echo '<div class="flex flex-col w-max">';
                echo '<label>Password</label>';
                echo '<input type="password" name="password" value="'.$rep['password'].'">';
                echo '</div>';

                echo '<input class="button-primary text-sm" type="submit" value="modifier">';
                echo '</form>';
            } else {
                echo 'Échec de l\'affichage des données de l\'utilisateur.';
            }
        } catch(PDOException $e) {
            echo 'Erreur lors de la modification: ' . $e->getMessage();
        }
    }
?>
