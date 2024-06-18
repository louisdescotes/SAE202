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
<section class="flex flex-col sm:grid sm:items-center sm:grid-cols-4 mb-10 gap-10 h-[80svh] mx-5 relative"> 
<aside class="col-span-2  flex ">
    <form action="" method="post" class="flex flex-col gap-4">
    <h2 class="text-main text-xl bambino">Déjà un compte ? </h2>
    <div class="flex flex-col w-max">
    <label class="text-main satoshi-medium text-sm" for="name">Email</label>
    <input class="input" type="text" name="email" placeholder="email">
    </div>
    <div class="flex flex-col w-max">
        <label class="text-main satoshi-medium text-sm" for="password">Mot de passe</label>
        <input class="input" type="password" name="password" placeholder="mot de passe">
    </div>
    <div>
        <input class="button-primary" type="submit" value="connexion">
    </div>
</form>
</aside>
<aside class="col-span-2 flex flex-col gap-8 ">
    <div class="flex flex-col gap-6">
        <h2 class="text-main text-xl bambino">Nouveaux arrivants</h2>
        <p class="text-xs">Bienvenue à vous sur le site de Juntea! Nous serons ravi de vous comptez parmi nos membres. 
            Venez de rejoindre une communauté dynamique et passionnée de jardinage et de thé, où vous pourrez découvrir, partager et vous épanouir. </p>
    </div>
    <div class="flex">
        <a class="button-primary" href="/User/userInscription.php">Créer un nouveau compte</a>
    </div>
    <div class="flex justify-end absolute bottom-0">
        <img class="w-[40%]" src="/assets/img/jasmin.png" alt="dessin de pancarte avec jasmin">
    </div>
</aside>
</section>
<?php
require_once('../assets/conf/footer.inc.php');
?>
