<?php
require_once('../assets/conf/head.inc.php');
require_once('../assets/conf/conf.inc.php');
require_once('../assets/conf/header.inc.php');

if (isset($_POST['texte']) && !empty($_POST['texte'])) {
    $nom = htmlspecialchars($_POST['texte']);
    $req = $db->prepare("
    SELECT 
        PLANTE.idPlante, PLANTE.name AS planteName, PLANTE.img, 
        TYPE_PLANTE.typeName, TYPE_PLANTE.origineName
    FROM PLANTE 
    INNER JOIN TYPE_PLANTE ON PLANTE.typePlanteId = TYPE_PLANTE.idTypePlante
    WHERE PLANTE.name LIKE :nom
    GROUP BY PLANTE.idPlante");

    $searchTerm = '%' . $nom . '%';
    $req->bindParam(':nom', $searchTerm, PDO::PARAM_STR);
    $req->execute();
    $plantes = $req->fetchAll();

    echo '<div class="grid grid-cols-2 my-10 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-5 mx-5">';
    echo '<p class="col-span-2">Voici les résultats pour : ' . $nom . '</p>';
    echo '<form class="col-span-2 row-start-2" action="/User/resultatRecherchePlante.php" method="post">';
    echo '<input type="text" name="texte" placeholder="Nom de la plante">';
    echo '<button type="submit">Rechercher</button>';
    echo '</form>';

    foreach ($plantes as $plante) {
        echo '<article class="row-start-3 col-span-2 border">';
        echo '<figure class="plante-image">';
        echo '<img src="/assets/Uploads/' . htmlspecialchars($plante['img']) . '" alt="' . htmlspecialchars($plante['img']) . '">';
        echo '</figure>';
        echo '<div class="plante-infos">';
        echo '<div class="type-plante">';
        echo '<h1>Nom : ' . htmlspecialchars($plante['planteName']) . '</h1>';
        echo '</div>';
        echo '<h2>Type : ' . htmlspecialchars($plante['typeName']) . '</h2>';
        echo '<h3>Origine : ' . htmlspecialchars($plante['origineName']) . '</h3>';
        echo '</div>';
        echo '</article>';
    }   
    echo '</div>';
}

require_once('../assets/conf/footer.inc.php');
?>
