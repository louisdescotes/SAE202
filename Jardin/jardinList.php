<?php
require_once('../conf.inc.php');
require_once('../header.inc.php');
?>

<h2>JARDINS</h2>

<?php
try {
    $req = $db->prepare('SELECT JARDIN.*, USER.name AS name, USER.forname AS forname, USER.email AS email 
        FROM JARDIN 
        LEFT JOIN USER 
        ON JARDIN.ownerId = USER.idUser');
    $req->execute();
    $jardins = $req->fetchAll();

    foreach ($jardins as $jardin) {
        echo '<p>' . htmlspecialchars($jardin['name']) . '</p>';
        echo '<p>' . htmlspecialchars($jardin['ville']) . '</p>';
        echo '<p>' . htmlspecialchars($jardin['CP']) . '</p>';
        echo '<p>' . htmlspecialchars($jardin['adresse']) . '</p>';
        echo '<p>' . htmlspecialchars($jardin['taille']) . '</p>';
        echo '<p>' . htmlspecialchars($jardin['max']) . '</p>';
        echo '<p>' . htmlspecialchars($jardin['img']) . '</p>';

        if (!empty($jardin['name']) && !empty($jardin['forname']) && !empty($jardin['email'])) {
            echo '<p>Responsable: ' . htmlspecialchars($jardin['name']) . ' ' . htmlspecialchars($jardin['forname']) . ' (' . htmlspecialchars($jardin['email']) . ')</p>';
        } else {
            echo '<p>Responsable: Inconnu</p>';
        }

        if (!empty($_SESSION['id'])) {
            echo '<a href="rejoindreJardin.php?idJardin=' . htmlspecialchars($jardin['idJardin']) . '&idUser=' . htmlspecialchars($_SESSION['id']) . '">Rejoindre</a>';
        } else {
            echo '<span>Connectez-vous pour rejoindre une parcelle</span>';
        }
    }
} catch (PDOException $e) {
    echo 'Erreur lors de la récupération des jardins: ' . $e->getMessage();
}
?>

<?php
require_once('../footer.inc.php');
?>
