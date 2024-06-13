<?php
require_once('../assets/conf/conf.inc.php');

session_start();
$_SESSION['information'] = '';
$affichage_retour = '';

$user_id = $_POST['idUser'];
$user_nom = $_POST['name'];
$user_prenom = $_POST['forname'];
$user_email = $_POST['email'];
$user_mdp = $_POST['password'];

try {
if(!empty($user_nom) && !empty($user_prenom) && !empty($user_email) && !empty($user_mdp)) {
    $req = $db->query('UPDATE USER SET name = "'.$user_nom.'", forname = "'.$user_prenom.'", email = "'.$user_email.'", password = "'.$user_mdp.'" WHERE idUser = '.$user_id.';');  

    $affichage_retour = '
    <div class="popup w-fit fixed bottom-2.5 right-2.5 cursor-pointer">
        <div class="absolute right-2.5 top-2.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>    </div>
        <div class="flex items-center p-5 gap-5 bg-cream rounded-md w-fit"> 
        <div class="w-20"> 
            <img draggable="false" src="../assets/img/estelle.png" alt="estelle"> 
        </div>
            <p class="max-w-60">Votre profil a été modifié.</p>
        <div>
    </div>';
    $_SESSION['information'] = $affichage_retour;

    header('Location: /User/profil.php');
}
else {
    $affichage_retour = '
    <div class="popup w-fit fixed bottom-2.5 right-2.5 cursor-pointer">
        <div class="absolute right-2.5 top-2.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>    </div>
        <div class="flex items-center p-5 gap-5 bg-cream rounded-md w-fit"> 
        <div class="w-20"> 
            <img draggable="false" src="../assets/img/louis.png" alt="erreur"> 
        </div>
            <p class="max-w-60">Veuillez remplir tout les champs.</p>
        <div>
    </div>';
    $_SESSION['information'] = $affichage_retour;
}

} catch (PDOException $e) {
    $affichage_retour = '
    <div class="popup w-fit fixed bottom-2.5 right-2.5 cursor-pointer">
        <div class="absolute right-2.5 top-2.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>    </div>
        <div class="flex items-center p-5 gap-5 bg-cream rounded-md w-fit"> 
        <div class="w-20"> 
            <img draggable="false" src="../assets/img/louis.png" alt="erreur"> 
        </div>
            <p class="max-w-60">Erreur lors de la modification de votre profil</p>
        <div>
    </div>';
    $_SESSION['information'] = $affichage_retour;
}


?>