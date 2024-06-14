<?php
require_once('../assets/conf/head.inc.php');
require_once('../admin/conf.inc.php');
require_once('../assets/conf/header.inc.php');

$idUser = $_GET['idUser'];
$idJardin = $_GET['idJardin'];

try {
    $req = $db->prepare('SELECT JARDIN.name AS jardinName, JARDIN.img, JARDIN.idJardin, PARCELLE.superficie
    FROM JARDIN
    INNER JOIN PARCELLE ON PARCELLE.jardinId = JARDIN.idJardin
    WHERE JARDIN.idJardin = :idJardin');
$req->bindParam(':idJardin', $idJardin, PDO::PARAM_INT);
$req->execute();
$parcelle = $req->fetch();

if ($parcelle) {
    echo '<span>Bonjour ' . htmlspecialchars($_SESSION['nom']) . ' ' . htmlspecialchars($_SESSION['prenom']) . '</span><br>';
    echo '<span>Vous allez rejoindre le jardin ' . htmlspecialchars($parcelle['jardinName']) . ' de ' . htmlspecialchars($parcelle['superficie']) . ' m²</span><br>';
    echo '<img src="/assets/Uploads/' . htmlspecialchars($parcelle['img']) . '" alt="image jardin"><br>';
    echo '<a href="rejoindreConfirmationJardin.php?idJardin=' . htmlspecialchars($idJardin) . '&idUser=' . htmlspecialchars($idUser) .  '">Confirmer</a>';
} else {
    echo 'Aucune parcelle trouvée pour cet identifiant de jardin.';
}
} catch (PDOException $e) {
    echo 'Erreur lors de la récupération des jardins: ' . $e->getMessage();
}
?>