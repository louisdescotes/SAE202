<?php
require_once('../assets/conf/head.inc.php');
require_once('../admin/conf.inc.php');
require_once('../assets/conf/header.inc.php');


if(isset($_POST['email']) && isset($_POST['password'])) {
    $emailUser = $_POST['email'];
    $mdpUser = $_POST['password'];

    if($emailUser != '' && $mdpUser != '') {
        $req = $db->prepare("SELECT * FROM USER WHERE email = :emailUser AND password = :mdpUser");
        $req->execute(array(':emailUser' => $emailUser, ':mdpUser' => $mdpUser));
        $rep = $req->fetch();

        if($rep !== false) {
            $_SESSION['id'] = $rep['idUser'];
            $_SESSION['nom'] = $rep['name'];
            $_SESSION['prenom'] = $rep['forname'];

            // Vérification si admin
            if ($emailUser == 'admin@contact.fr' && $mdpUser == 'Carotte10000') {
                $_SESSION['admin'] = true;
            }

            header('Location: /index.php');
            exit(); 
        } else {
            $error = 'Erreur de connexion';
        }
    }
}
?>

<?php if (!empty($error)) echo '<p>' . htmlspecialchars($error) . '</p>'; ?>

<form action="" method="post">
    <input type="text" name="email" placeholder="email">
    <input type="password" name="password" placeholder="mot de passe">
    <input type="submit" value="connexion">
</form>
<span>Pas encore de compte ? <a href="/User/userInscription.php">Inscrivez-vous</a></span>
