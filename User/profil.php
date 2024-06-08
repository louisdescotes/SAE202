<?php
    require_once('../assets/conf/head.inc.php');
    require_once('../assets/conf/conf.inc.php');
    require_once('../assets/conf/header.inc.php');

if (!isset($_SESSION['id'])) {
    header('Location: /User/userConnexion.php');
    exit();
}
?>

<p class="text-3xl">Bonjour <span class="text-main satoshi-bold"><?php echo htmlspecialchars($_SESSION['nom'] . ' ' . $_SESSION['prenom']); ?></span></p>

<button class="button-primary" href="">MES JARDINS</button>
<button class="button-primary" href="">MES PARCELLES</button>
<button class="button-primary" href="">MES RECETTES</button>
<button class="button-primary" href="">MON COMPTE</button>

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
echo '<div class="flex flex-col w-max">
        <label for="idUser">ID Utilisateur</label>
        <input type="hidden" name="idUser" value="'.htmlspecialchars($user['idUser']).'">
      </div>';
echo '<div class="flex flex-col w-max">
        <label for="name">Nom</label>
        <input type="text" name="name" value="'.htmlspecialchars($user['name']).'">
      </div>';
echo '<div class="flex flex-col w-max">
        <label for="forname">Prénom</label>
        <input type="text" name="forname" value="'.htmlspecialchars($user['forname']).'">
      </div>';
echo '<div class="flex flex-col w-max">
        <label for="email">Email</label>
        <input type="email" name="email" value="'.htmlspecialchars($user['email']).'">
      </div>';
echo '<div class="flex flex-col w-max">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" value="'.htmlspecialchars($user['password']).'">
      </div>';
echo '<div class="flex flex-col w-max">
        <input type="submit" value="Modifier">
      </div>';
        echo '</form>';
    } else {
        echo 'Échec de l\'affichage des données de l\'utilisateur.';
    }
} catch(PDOException $e) {
    echo 'Erreur lors de la récupération des informations de l\'utilisateur: ' . $e->getMessage();
}
?>

<?php
    require_once('../assets/conf/footer.inc.php');
?>
