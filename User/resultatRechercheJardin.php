<?php
require_once('../assets/conf/head.inc.php');
require_once('../assets/conf/conf.inc.php');
require_once('../assets/conf/header.inc.php');
?>



<?php
try {
    if (isset($_POST['texte']) && !empty($_POST['texte'])) {
        $nom = htmlspecialchars($_POST['texte']);

$req = $db->prepare('SELECT JARDIN.idJardin, JARDIN.ownerId, JARDIN.name AS jardinName, JARDIN.ville, JARDIN.CP, JARDIN.adresse, JARDIN.taille, JARDIN.max, JARDIN.img, USER.name AS userName, USER.forname AS userForname, USER.email AS userEmail, COUNT(PARCELLE.idParcelle) AS countParcelles
            FROM JARDIN
            INNER JOIN USER ON JARDIN.ownerId = USER.idUser
            LEFT JOIN PARCELLE ON PARCELLE.jardinId = JARDIN.idJardin
            WHERE JARDIN.name LIKE :Jnom
            GROUP BY JARDIN.idJardin');

        // Ajouter les % pour le LIKE dans la variable PHP
        $searchTerm = '%' . $nom . '%';
        $req->bindParam(':Jnom', $searchTerm, PDO::PARAM_STR);
        $req->execute();
        $jardins = $req->fetchAll();



        echo '<div class="grid grid-cols-2 my-10 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-5 mx-5">';

        echo '<p class="row-start-2">Voici les résultats pour : ' . $nom . '</p>';
        echo '
        <form class="row-start-3" action="/User/resultatRechercheJardin.php" method="get">
    <input type="text" name="texte" placeholder="Nom du jardin">
    <button type="submit">Rechercher</button>
</form>
        ';
        foreach ($jardins as $jardin) {
            echo '<div class="parcelle-container relative col-span-2 row-start-4 mb-24">';
                echo '<div class="bg-cream p-16">';
                    echo '<div class="object-cover w-full h-80 mb-4">';
                        echo '<img class="w-full h-full object-cover object-center" src="/assets/Uploads/' . htmlspecialchars($jardin['img']) . '" alt="Image de ' . htmlspecialchars($jardin['jardinName']) . '">';
                    echo '</div>';
                echo '</div>';
    
                echo '<div class="mb-2">';
                    if (!empty($jardin['userName']) && !empty($jardin['userForname']) && !empty($jardin['userEmail'])) {
                        echo '<p class="flex"> ' . htmlspecialchars($jardin['userName']) . ' ' . htmlspecialchars($jardin['userForname']) . ' - ' . htmlspecialchars($jardin['userEmail']) . '</p>';
                    } else {
                        echo '<p>Responsable: Inconnu</p>';
                    }
                echo '</div>';
    
                echo '<div class="flex justify-between mb-2">';
                    echo '<p class="text-xl text-main satoshi-medium">' . htmlspecialchars($jardin['jardinName']) . '</p>';
                    echo '<p class="satoshi-light">' . htmlspecialchars($jardin['ville']) . ' - ' . htmlspecialchars($jardin['CP']) . ' - ' . htmlspecialchars($jardin['adresse']) . '</p>';
                echo '</div>';
    
                echo '<div class="flex flex-col mb-2">';
                    echo '<p>' . htmlspecialchars($jardin['taille']) . 'm²</p>';
                    echo '<p>Parcelles disponibles: ' . htmlspecialchars($jardin['countParcelles']) . '/' . htmlspecialchars($jardin['max']) . '</p>';
                echo '</div>';
    
                if (!empty($_SESSION['id'])) {
                    if ($jardin['countParcelles'] < $jardin['max'] && $jardin['ownerId'] != $_SESSION['id'] && $jardin['countParcelles'] > 0) {
                        echo '<a class="button-primary" href="rejoindreJardin.php?idJardin=' . htmlspecialchars($jardin['idJardin']) . '&idUser=' . htmlspecialchars($_SESSION['id']) . '">Rejoindre</a>';
                    } else {
                        echo '<span class="parcelle-full">Parcelles pleines</span>';
                    }
                } else {
                    echo '<span>Connectez-vous pour rejoindre une parcelle</span>';
                }
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
    }
} catch (PDOException $e) {
    echo 'Erreur lors de la récupération des jardins: ' . $e->getMessage();
}
        ?>


<?php
require_once('../assets/conf/footer.inc.php');
?>
