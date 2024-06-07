<?php
require_once('../assets/conf/head.inc.php');
require_once('../assets/conf/conf.inc.php');
require_once('../assets/conf/header.inc.php');
?>

<h2>JARDINS</h2>

<?php
try {
    $req = $db->prepare('SELECT JARDIN.idJardin, JARDIN.name AS jardinName, JARDIN.ville, JARDIN.CP, JARDIN.adresse, JARDIN.taille, JARDIN.max, JARDIN.img, USER.name AS userName, USER.forname AS userForname, USER.email AS userEmail, COUNT(PARCELLE.idParcelle) AS countParcelles
        FROM JARDIN 
        INNER JOIN USER 
        ON JARDIN.ownerId = USER.idUser
        LEFT JOIN PARCELLE
        ON PARCELLE.jardinId = JARDIN.idJardin
        GROUP BY JARDIN.idJardin');
    $req->execute();
    $jardins = $req->fetchAll();

    echo '<div class="flex flex-col gap-8">';
    foreach ($jardins as $jardin) {
        echo '<div class="border border-black">';
        echo '<p class="text-xl underline">' . htmlspecialchars($jardin['jardinName']) . '</p>';
        echo '<div class="flex gap-8">';
        echo '<p>' . htmlspecialchars($jardin['ville']) . '</p>';
        echo '<p>' . htmlspecialchars($jardin['CP']) . '</p>';
        echo '<p>' . htmlspecialchars($jardin['adresse']) . '</p>';
        echo '</div>';
        echo '<p>' . htmlspecialchars($jardin['taille']) . 'm²</p>';

        echo '<p>' . htmlspecialchars($jardin['countParcelles']) . '/' . htmlspecialchars($jardin['max']) . '</p>';

        echo '<div class="img">';
        echo '<p>' . htmlspecialchars($jardin['img']) . '</p>';
        echo '</div>';
        if (!empty($jardin['userName']) && !empty($jardin['userForname']) && !empty($jardin['userEmail'])) {
            echo '<p>Responsable: ' . htmlspecialchars($jardin['userName']) . ' ' . htmlspecialchars($jardin['userForname']) . ' (' . htmlspecialchars($jardin['userEmail']) . ')</p>';
        } else {
            echo '<p>Responsable: Inconnu</p>';
        }

        if (!empty($_SESSION['id'])) {
            echo '<a href="rejoindreJardin.php?idJardin=' . htmlspecialchars($jardin['idJardin']) . '&idUser=' . htmlspecialchars($_SESSION['id']) . '">Rejoindre</a>';
        } else {
            echo '<span>Connectez-vous pour rejoindre une parcelle</span>';
        }
        
        echo '</div>';
    }
    echo '</div>';
} catch (PDOException $e) {
    echo 'Erreur lors de la récupération des jardins: ' . $e->getMessage();
}
?>

<?php
require_once('../assets/conf/footer.inc.php');
?>
