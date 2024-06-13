<?php
require_once('../assets/conf/head.inc.php');
require_once('../assets/conf/conf.inc.php');
require_once('../assets/conf/header.inc.php');

// require_once('../assets/conf/grid.inc.php');


if (!isset($_SESSION['id'])) {
    header('Location: /User/userConnexion.php');
    exit();
}
?>

<body>
    <div class="grid grid-cols-2 my-10 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-5 mx-5">
        <p class="text-3xl col-start-1 col-end-8 row-start-1">Bonjour <span class="text-main satoshi-bold"><?php echo htmlspecialchars($_SESSION['nom'] . ' ' . $_SESSION['prenom']); ?></span></p>
        <div class="flex justify-between col-start-1 col-end-8">
            <div>
                <button class="view-button button-secondary" data-view="Jardins" data-view="Jardins" onclick="setView('Jardins')">MES JARDINS</button>
                <button class="view-button button-secondary" data-view="Parcelles" data-view="Parcelles" onclick="setView('Parcelles')">MES PARCELLES</button>
                <button class="view-button button-secondary" data-view="Recettes" data-view="Recettes" onclick="setView('Recettes')">MES RECETTES</button>
                <button class="view-button button-secondary" data-view="Compte" data-view="Compte" onclick="setView('Compte')">MON COMPTE</button>
            </div>
        </div>
    </div>

    <div class="view Jardins grid grid-cols-2 my-10 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-5 mx-5">


        <?php
        try {
            $req = $db->prepare('SELECT * FROM JARDIN WHERE ownerId = ' . $_SESSION['id']);
            $req->execute();
            $parcelles = $req->fetchAll();

            if ($parcelles) {
                foreach ($parcelles as $parcelle) {
                    echo '<div class="col-span-2 relative mb-24">';
                    echo '<div class="bg-cream p-16">';
                    echo '<div class="object-cover w-full h-80 mb-4">';
                    echo '<img class="w-full h-full object-cover object-center" src="/assets/Uploads/' . htmlspecialchars($parcelle['img']) . '" alt="image jardin"><br>';
                    echo '</div>';
                    echo '</div>';

                    echo '<div class="flex justify-between mb-2">';
                    echo '<p class="text-xl text-main satoshi-medium">' . htmlspecialchars($parcelle['name']) . '</p>';
                    echo '<p class="satoshi-light">' . htmlspecialchars($parcelle['ville']) . ' - ' . htmlspecialchars($parcelle['CP']) . '</p>';
                    echo '</div>';

                    echo '<div class="flex flex-col mb-2">';
                    echo '<p>' . htmlspecialchars($parcelle['taille']) . 'm²</p>';
                    echo '<p>Parcelles disponibles: ' . htmlspecialchars($parcelle['taille']) . '/' . htmlspecialchars($parcelle['max']) . '</p>';
                    echo '</div>';

                    echo '
<form action="/User/supprimerJardin.php" method="POST">
    <input type="hidden" name="num" value="' . htmlspecialchars($parcelle['idJardin']) . '">
    <input class="button-tercery" type="submit" value="Supprimer">
</form>
';
                    echo '</div>';
                }
        ?>

        <?php
            } else {
                echo '<span class="col-start-1 col-end-8">Vous n\'avez aucun jardin.</span>';
            }
        } catch (PDOException $e) {
            echo 'Erreur lors de la récupération des jardins: ' . $e->getMessage();
        }
        ?>

    </div>

    <div class="view Parcelles grid grid-cols-2 my-10 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-5 mx-5">
        <?php
        try {
            $req = $db->prepare('SELECT DISTINCT PARCELLE.idParcelle, PARCELLE.superficie,
            JARDIN.name AS jardinName, JARDIN.img, JARDIN.ville, JARDIN.adresse, JARDIN.CP
        FROM PARCELLE
        INNER JOIN JARDIN ON PARCELLE.jardinId = JARDIN.idJardin
        INNER JOIN USER ON PARCELLE.occupantId = USER.idUser
        WHERE PARCELLE.occupantId = :occupantId');

            $req->bindParam(':occupantId', $_SESSION['id'], PDO::PARAM_INT);
            $req->execute();
            $parcelles = $req->fetchAll();

            if ($parcelles) {
                foreach ($parcelles as $parcelle) {
                    echo '<div class="col-span-2 relative mb-24">';
                    echo '<div class="bg-cream p-16">';
                    echo '<div class="object-cover w-full h-80 mb-4">';
                    echo '<img class="w-full h-full object-cover object-center" src="/assets/Uploads/' . htmlspecialchars($parcelle['img']) . '" alt="image jardin"><br>';
                    echo '</div>';
                    echo '</div>';

                    echo '<div class="flex justify-between mb-2">';
                    echo '<p class="text-xl text-main satoshi-medium">' . htmlspecialchars($parcelle['jardinName']) . '</p>';
                    echo '</div>';
                    echo '<div class="flex justify-between mb-2">';
                    echo '<p class="satoshi-light">' . htmlspecialchars($parcelle['ville']) . ' - ' . htmlspecialchars($parcelle['adresse']) . ' - ' . htmlspecialchars($parcelle['CP']) . '</p>';
                    echo '</div>';
                    echo '<div class="flex flex-col mb-2">';
                    echo '<p>' . htmlspecialchars($parcelle['superficie']) . 'm²</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<span>Vous n\'avez aucune parcelle.</span>';
            }
        } catch (PDOException $e) {
            echo 'Erreur lors de la récupération des parcelles: ' . $e->getMessage();
        }
        ?>
    </div>
    <div class="view Recettes grid grid-cols-2 my-10 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-5 mx-5">
        <?php
        try {
            $req = $db->prepare('
            SELECT RECETTE.name AS recetteName, RECETTE.description, RECETTE.img, RECETTE.idRecette,
                   USER.name AS userName, USER.forname AS userForname, 
                   GROUP_CONCAT(PLANTE.name SEPARATOR "|") AS plantes
            FROM RECETTE
            INNER JOIN RECETTE_PLANTE ON RECETTE.idRecette = RECETTE_PLANTE.idRecette
            INNER JOIN PLANTE ON RECETTE_PLANTE.idPlante = PLANTE.idPlante
            INNER JOIN USER ON RECETTE.creatorId = USER.idUser
            WHERE RECETTE.creatorId = :userId
            GROUP BY RECETTE.idRecette
        ');
            $req->bindParam(':userId', $_SESSION['id'], PDO::PARAM_INT);
            $req->execute();
            $recettes = $req->fetchAll(PDO::FETCH_ASSOC);

            if ($recettes) {
                foreach ($recettes as $recette) {
                    echo '<div class="col-span-2 relative mb-24">';
                    echo '<div class="bg-cream p-16">';
                    echo '<div class="object-cover w-full h-80 mb-4">';
                    echo '<img class="w-full h-full object-cover object-center" src="/assets/Uploads/' . htmlspecialchars($recette['img']) . '" alt="image recette"><br>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="flex flex-col">';
                    echo '<span>Nom: ' . htmlspecialchars($recette['recetteName']) . '</span>';
                    echo '<span>Description: ' . htmlspecialchars($recette['description']) . '</span>';
                    echo '</div>';
                    echo '<div class="flex flex-col">';
                    echo '<span>Plantes:</span>';
                    $plantes = explode('|', $recette['plantes']);
                    foreach ($plantes as $plante) {
                        echo '<span>' . htmlspecialchars($plante) . '</span>';
                    }
                    echo '</div>';
                    echo '<div class="flex justify-between">';
                    echo '<form action="/User/supprimerRecette.php" method="POST">';
                    echo '<input type="hidden" name="num" value="' . htmlspecialchars($recette['idRecette']) . '">';
                    echo '<input class="button-tercery" type="submit" value="Supprimer">';
                    echo '</form>';

                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<span>Vous n\'avez aucune recette.</span>';
            }
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
        ?>
    </div>

    <div class="view Compte grid grid-cols-2 my-10 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-5 mx-5">
        <?php
        try {
            $req = $db->prepare('SELECT * FROM USER WHERE idUser = :user_id');
            $req->bindParam(':user_id', $_SESSION['id'], PDO::PARAM_INT);
            $req->execute();
            $user = $req->fetch();

            if ($user) {
                echo '<form class="col-start-1 col-end-8" action="/User/modificationProfil.php" method="post">';
                echo '<div class="grid grid-cols-2  sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-5 ">';
                echo '<div class="flex flex-col col-start-1 col-end-4">
                <input type="hidden" name="idUser" value="' . htmlspecialchars($user['idUser']) . '">
<label class="text-xl text-main satoshi-medium" for="name">Nom</label>
<input class="rounded pl-2 py-1 border border-main" type="text" name="name" value="' . htmlspecialchars($user['name']) . '">
</div>';
                echo '<div class="flex flex-col col-start-1 col-end-4">
<label class="text-xl text-main satoshi-medium" for="forname">Prénom</label>
<input class="rounded pl-2 py-1 border border-main" type="text" name="forname" value="' . htmlspecialchars($user['forname']) . '">
</div>';
                echo '<div class="flex flex-col col-start-1 col-end-4">
<label class="text-xl text-main satoshi-medium" for="email">Email</label>
<input class="rounded pl-2 py-1 border border-main" type="email" name="email" value="' . htmlspecialchars($user['email']) . '">
</div>';
                echo '<div class="flex flex-col col-start-1 col-end-4">
<label class="text-xl text-main satoshi-medium" for="password">Mot de passe</label>
<input class="rounded pl-2 py-1 border border-main" type="password" name="password" value="' . htmlspecialchars($user['password']) . '">
</div>';
                echo '<div class="flex flex-col col-start-1 col-end-2">
<input class="button-primary" type="submit" value="Modifier">
</div>';
                echo '</div>';
                echo '</form>';
            } else {
                echo 'Échec de l\'affichage des données de l\'utilisateur.';
            }
        } catch (PDOException $e) {
            echo 'Erreur lors de la récupération des informations de l\'utilisateur: ' . $e->getMessage();
        }
        ?>
    </div>

    <script src="/assets/js/adminPanel.js"></script>
</body>