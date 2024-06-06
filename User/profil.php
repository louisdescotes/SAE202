<?php
require_once('../conf.inc.php');
require_once('../header.inc.php');

if (!isset($_SESSION['id'])) {
    header('Location: /sae202/User/userConnexion.php');
    exit();
}
?>

<h2>Profil</h2>
<span>Bonjour <?php echo htmlspecialchars($_SESSION['nom'] . ' ' . $_SESSION['prenom']); ?></span>

<a href="">MES PARCELLES</a>

<h3>Vos parcelles</h3>
<?php
try {
    $req = $db->prepare('SELECT DISTINCT PARCELLE.idParcelle, PARCELLE.superficie,
                                JARDIN.name AS jardinName, JARDIN.img, 
                                USER.name AS userName, USER.forname, USER.email
                         FROM PARCELLE
                         INNER JOIN JARDIN ON PARCELLE.jardinId = JARDIN.idJardin
                         INNER JOIN USER ON PARCELLE.occupantId = USER.idUser
                         WHERE PARCELLE.occupantId = :occupantId');
                         
    $req->bindParam(':occupantId', $_SESSION['id'], PDO::PARAM_INT);
    $req->execute();
    $parcelles = $req->fetchAll();

    if ($parcelles) {
        foreach ($parcelles as $parcelle) {
            echo '<p>Nom du jardin : ' . htmlspecialchars($parcelle['jardinName']) . '</p>';
            echo '<p>Superficie : ' . htmlspecialchars($parcelle['superficie']) . ' m²</p>';
            echo '<img src="' . htmlspecialchars($parcelle['img']) . '" alt="image jardin"><br>';
            echo '<p>Responsable : ' . htmlspecialchars($parcelle['userName']) . ' ' . htmlspecialchars($parcelle['forname']) . ' ' . htmlspecialchars($parcelle['email']) . '</p>';
        }
    } else {
        echo '<span>Vous n\'avez aucune parcelle.</span>';
    }
} catch(PDOException $e) {
    echo 'Erreur lors de la récupération des parcelles: ' . $e->getMessage();
}
?>

<h3>Votre compte</h3>
<?php
try {
    $req = $db->prepare('SELECT * FROM USER WHERE idUser = :user_id');
    $req->bindParam(':user_id', $_SESSION['id'], PDO::PARAM_INT);
    $req->execute();
    $user = $req->fetch();

    if ($user) {
        echo '<form action="../sae202/admin/User/modificationUpdateUser.php" method="post">';
        echo '<input type="hidden" name="idUser" value="'.htmlspecialchars($user['idUser']).'">';
        echo '<input type="text" name="name" value="'.htmlspecialchars($user['name']).'">';
        echo '<input type="text" name="forname" value="'.htmlspecialchars($user['forname']).'">';
        echo '<input type="email" name="email" value="'.htmlspecialchars($user['email']).'">';
        echo '<input type="password" name="password" value="'.htmlspecialchars($user['password']).'">';
        echo '<input type="submit" value="Modifier">';
        echo '</form>';
    } else {
        echo 'Échec de l\'affichage des données de l\'utilisateur.';
    }
} catch(PDOException $e) {
    echo 'Erreur lors de la récupération des informations de l\'utilisateur: ' . $e->getMessage();
}
?>

<?php
require_once('../footer.inc.php');
?>
