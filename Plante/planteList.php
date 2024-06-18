<?php
require_once('../assets/conf/head.inc.php');
require_once('../admin/conf.inc.php');
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
    echo '<div class="form-plante">';
    echo '<form class="recherche-plante" action="/User/resultatRecherchePlante.php" method="post">
    <input type="text" name="texte" placeholder="Que recherchez-vous ?">
    <button type="submit"><span class="material-symbols-outlined">search</span></button>';
    echo '</div>';
echo '<h2 class="plante-h2 bambino">Guides des plantes</h2>';
echo '<div class="plantes">';
    foreach ($plantes as $plante) {
        echo '<figure class="plante">';
        echo '<img src="/assets/Uploads/' . htmlspecialchars($plante['img']) . '" alt="' . htmlspecialchars($plante['img']) . '">';
        echo '<div class="plante-infos">';
        echo '<h1 class="satoshi-bold">Nom : ' . htmlspecialchars($plante['planteName']) . '</h1>';
        echo '<h2>Type : ' . htmlspecialchars($plante['typeName']) . '</h2>';
        echo '<h3>Origine : ' . htmlspecialchars($plante['origineName']) . '</h3>';
        echo '</div>';
        echo '</figure>';
    }
    echo '</div>';
// require_once('../assets/conf/footer.inc.php');
?>
</section>