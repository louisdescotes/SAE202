<?php
require_once('../assets/conf/head.inc.php');
require_once('../assets/conf/conf.inc.php');
require_once('../assets/conf/header.inc.php');
?>
<section>

</form>

<?php
$req = $db->prepare("SELECT 
PLANTE.idPlante, PLANTE.name AS planteName, PLANTE.img, 
TYPE_PLANTE.typeName AS typeName, TYPE_PLANTE.origineName
FROM PLANTE 
INNER JOIN TYPE_PLANTE ON PLANTE.typePlanteId = TYPE_PLANTE.idTypePlante");



    $req->execute();
    $plantes = $req->fetchAll();
    echo '<div class="grid grid-cols-2 my-10 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-5 mx-5">';
    echo '
    <form class="col-start-1 col-end-8 " action="/User/resultatRecherchePlante.php" method="post">
<input type="text" name="texte" placeholder="Nom de la plante">
<button type="submit" >Rechercher</button>
    ';
    foreach ($plantes as $plante) {
        echo '<article class="border">';
        echo '<figure class="h-40 ">';
        echo '<img class="h-full object-cover" src="/assets/Uploads/' . htmlspecialchars($plante['img']) . '" alt="' . htmlspecialchars($plante['img']) . '">';
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
require_once('../assets/conf/footer.inc.php');
?>
</section>