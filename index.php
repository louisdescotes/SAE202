<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once('./assets/conf/head.inc.php'); ?>
</head>
<body class=" w-full">
    <?php 
    // require_once('./assets/conf/grid.inc.php');

    require_once('./admin/conf.inc.php');
    require_once('./assets/conf/header.inc.php');

    ?>
    <section class="grid grid-cols-2 mb-10 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-5 mx-5">
        <img src="/assets/Uploads/jardin1.jpg" class="border rounded-l bg-grey col-start-1 col-end-9 row-start-1 row-end-2 min-h-[35rem] object-cover w-full"></img>
    </section>
    <section class="grid grid-cols-2 my-10 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-5 mx-5">
        <h2 class="text-xl col-start-1 col-end-7 md:col-end-4 leading-6 tracking-normal bambino">Le co-jardinage près de chez vous</h2>    
        <p class="text-xs col-start-1 col-end-7 md:col-end-4 leading-4 tracking-wide">Le cojardinage est une nouvelle façon de jardiner, basée sur le partage et la collaboration. Ce concept innovant met en relation des personnes qui possèdent un jardin mais manquent de temps, d'énergie ou de compétences pour l'entretenir, avec des passionnés de jardinage à la recherche d'un espace pour cultiver. Ensemble, ils peuvent créer un jardin prospère et productif.<br>
        Le cojardinage repose sur le principe du partage de l'espace. Les propriétaires de jardins offrent un espace souvent inutilisé à des jardiniers enthousiastes, optimisant ainsi l'utilisation des terrains disponibles et donnant une seconde vie à des jardins en sommeil. Cette collaboration permet aux deux parties de planifier, planter, entretenir et récolter ensemble, créant un échange de connaissances et de compétences qui enrichit l'expérience de chacun. Les fruits, légumes, herbes et fleurs cultivés sont ensuite partagés entre les partenaires, assurant une distribution équitable des récoltes et une satisfaction commune.</p>
    </section>
    <section class="my-48">
    <?php
try {
    $req = $db->prepare('SELECT JARDIN.idJardin, JARDIN.ownerId, JARDIN.name AS jardinName, JARDIN.ville, JARDIN.CP, JARDIN.adresse, JARDIN.taille, JARDIN.max, JARDIN.img, USER.name AS userName, USER.forname AS userForname, USER.email AS userEmail, COUNT(PARCELLE.idParcelle) AS countParcelles
        FROM JARDIN 
        INNER JOIN USER 
        ON JARDIN.ownerId = USER.idUser
        LEFT JOIN PARCELLE
        ON PARCELLE.jardinId = JARDIN.idJardin
        GROUP BY JARDIN.idJardin
        LIMIT 4');
    $req->execute();
    $jardins = $req->fetchAll();

    echo '<div class="grid grid-cols-2 my-10 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-8 xl:grid-cols-8 gap-5 mx-5">';
    foreach ($jardins as $jardin) {
        echo '<div class="col-span-2 ">';
            echo '<div class="bg-cream p-16">';
                echo '<div class="object-cover w-full h-80 mb-4">';
                    echo '<img class="w-full h-full object-cover object-center" src="/assets/Uploads/' . htmlspecialchars($jardin['img']) . '" alt="Image de ' . htmlspecialchars($jardin['jardinName']) . '">';
                echo '</div>';
            echo '</div>';

            echo '<div class="mb-2 text-xs satoshi-light">';
                if (!empty($jardin['userName']) && !empty($jardin['userForname']) && !empty($jardin['userEmail'])) {
                    echo '<p class="flex"> ' . htmlspecialchars($jardin['userName']) . ' ' . htmlspecialchars($jardin['userForname']) . ' - ' . htmlspecialchars($jardin['userEmail']) . '</p>';
                } else {
                    echo '<p>Responsable: Inconnu</p>';
                }
            echo '</div>';

            echo '<div class="flex flex-col items-start mb-2">';
                echo '<p class="text-xl satoshi-bold">' . htmlspecialchars($jardin['jardinName']) . '</p>';
                echo '<p class="text-xs satoshi-regular">' . htmlspecialchars($jardin['ville']) . ' - ' . htmlspecialchars($jardin['CP']) . ' - ' . htmlspecialchars($jardin['adresse']) . '</p>';
            echo '</div>';

            echo '<div class="flex flex-col mb-2 satoshi-regular text-xs">';
                echo '<p>' . htmlspecialchars($jardin['taille']) . 'm²</p>';
                echo '<p>Parcelles disponibles: ' . htmlspecialchars($jardin['countParcelles']) . '/' . htmlspecialchars($jardin['max']) . '</p>';
            echo '</div>';

            if (!empty($_SESSION['id'])) {
                if ($jardin['countParcelles'] < $jardin['max'] && $jardin['ownerId'] != $_SESSION['id'] && $jardin['countParcelles'] > 0) {
                    echo '<a class="button-primary" href="rejoindreJardin.php?idJardin=' . htmlspecialchars($jardin['idJardin']) . '&idUser=' . htmlspecialchars($_SESSION['id']) . '">Rejoindre</a>';
                } else {
                    echo '<span>Parcelles pleines</span>';
                }
            } else {
                echo '<span>Connectez-vous pour rejoindre une parcelle</span>';
            }
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
} catch (PDOException $e) {
    echo 'Erreur lors de la récupération des jardins: ' . $e->getMessage();
}
?>

    </section>
    <section class="grid grid-cols-2 my-2 grid-cols-8 gap-2 mx-5 h-96">
        <img src="/assets/Uploads/jardin1.jpg" class="bg-grey col-start-1 col-end-5 w-full h-full object-cover"></img>
        <img src="/assets/Uploads/jardin1.jpg" class="bg-grey col-start-5 col-end-9 w-full h-full object-cover"></img>
    </section>
    <section class="grid grid-cols-2 my-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-5 mx-5 mb-72 h-96">
        <aside class="grid grid-cols-4 grid-rows-2 w-full col-start-1 col-end-9 gap-x-2 gap-y-2 ">
            <img src="/assets/Uploads/jardin1.jpg" class="bg-grey col-start-1 col-end-2 row-start-1 row-end-2 w-full h-full object-cover"></img>
            <img src="/assets/Uploads/jardin1.jpg" class="bg-grey col-start-2 col-end-3 row-start-1 row-end-2 w-full h-full object-cover"></img>
            <img src="/assets/Uploads/jardin1.jpg" class="bg-grey col-start-3 col-end-5 row-start-1 row-end-4 w-full h-full object-cover"></img>
            <img src="/assets/Uploads/jardin1.jpg" class="bg-grey col-start-1 col-end-3 row-start-2 row-end-4 w-full h-full object-cover"></img>
        </aside>
    </section>
    </div>
    <?php
    require_once('./assets/conf/footer.inc.php');
    ?>
</body>
</html>