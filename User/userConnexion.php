<?php
require_once('../header.inc.php');
?>
<p>Formulaire de connexion</p>
<?php 
try {
    $db = new PDO('mysql:host=localhost;dbname=sae202Base;charset=UTF8;', 'phpmyadmin', 'PASSWORD');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e) {
    echo 'Erreur de connexion:' . $e->getMessage();
}

if(isset($_POST['emailUser']) && isset($_POST['mdpUser'])) {
    $emailUser = $_POST['emailUser'];
    $mdpUser = $_POST['mdpUser'];

    if($emailUser != '' && $mdpUser != '') {
        $req = $db->prepare("SELECT * FROM USER WHERE emailUser = :emailUser AND mdpUser = :mdpUser");
        $req->execute(array('emailUser' => $emailUser, 'mdpUser' => $mdpUser));
        $rep = $req->fetch();

        if($rep !== false) {
            $_SESSION['nom'] = $rep['nomUser'];
            $_SESSION['prenom'] = $rep['prenomUser'];
            header('Location: /sae202/index.php');
            exit(); // Arrêter l'exécution du script après la redirection
        } else {
            echo 'Erreur de connexion';
        }
    }
}
?>

<form action="" method="post">
    <input type="text" name="emailUser" placeholder="email">
    <input type="password" name="mdpUser" placeholder="mot de passe">
    <input type="submit" value="connexion">
</form>

<?php
require_once('../footer.inc.php');  
?>
