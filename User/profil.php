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
$req = $db->prepare('SELECT * FROM PARCELLE WHERE occupantId = :occupantId');
$req->execute(['occupantId' => $_SESSION['id']]);
$parcelles = $req->fetchAll();

foreach ($parcelles as $parcelle) {
    echo '<p>' . htmlspecialchars($parcelle['nomParcelle']) . '</p>';
    echo '<p>' . htmlspecialchars($parcelle['nbPersonneParcelle']) . '</p>';
    echo '<p>' . htmlspecialchars($parcelle['superficieParcelle']) . '</p>';
    echo '<p>' . htmlspecialchars($parcelle['villeParcelle']) . '</p>';
    echo '<p>' . htmlspecialchars($parcelle['CPParcelle']) . '</p>';
    echo '<p>' . htmlspecialchars($parcelle['adresseParcelle']) . '</p>';

    $reqResponsable = $db->prepare('SELECT name, forname, email FROM USER WHERE idUser = :idUser');
    $reqResponsable->execute(['idUser' => $parcelle['_id_user']]);
    $responsable = $reqResponsable->fetch();

    if ($responsable) {
        echo '<p>Responsable: ' . htmlspecialchars($responsable['name']) . ' ' . htmlspecialchars($responsable['forname']) . ' (' . htmlspecialchars($responsable['email']) . ')</p>';
    }
}
?>

<h3>Votre compte</h3>
<?php
try {
    $req = $db->prepare('SELECT * FROM USER WHERE idUser = :user_id');
    $req->bindParam(':user_id', $_SESSION['id'], PDO::PARAM_INT);
    
    if ($req->execute()) {
        $rep = $req->fetch();
        echo '<form action="../sae202/admin/User/modificationUpdateUser.php" method="post"">';
        echo '<input type="hidden" name="idUser" value="'.htmlspecialchars($rep['idUser']).'">';
        echo '<input type="text" name="name" value="'.htmlspecialchars($rep['name']).'">';
        echo '<input type="text" name="forname" value="'.htmlspecialchars($rep['forname']).'">';
        echo '<input type="email" name="email" value="'.htmlspecialchars($rep['email']).'">';
        echo '<input type="password" name="password" value="'.htmlspecialchars($rep['password']).'">';
        echo '<input type="submit" value="modifier">';
        echo '</form>';
        
    } else {
        echo 'Échec de l\'affichage des données de l\'utilisateur.';
    }
} catch(PDOException $e) {
    echo 'Erreur lors de la modification: ' . $e->getMessage();
}
?>

<?php
require_once('../footer.inc.php');
?>
