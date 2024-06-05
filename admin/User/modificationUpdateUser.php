<?php
$user_id = $_POST['idUser'];
$user_nom = $_POST['nomUser'];
$user_prenom = $_POST['prenomUser'];
$user_email = $_POST['emailUser'];
$user_mdp = $_POST['mdpUser'];
$user_photo = $_POST['photoUser'];

if(!empty($user_nom) && !empty($user_prenom) && !empty($user_email) && !empty($user_mdp)) {
    try {
        $db= new PDO('mysql:host=localhost;dbname=sae202Base;charset=UTF8;', 'phpmyadmin', 'PASSWORD');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e) {
        echo 'Erreur de connexion:' . $e->getMessage();
    }
    
    $req = $db->query('UPDATE USER SET nomUser = "'.$user_nom.'", prenomUser = "'.$user_prenom.'", emailUser = "'.$user_email.'", mdpUser = "'.$user_mdp.'", photoUser = "'.$user_photo.'" WHERE idUser = '.$user_id.';');  
    header('Location: /sae202/admin.php');
}
else {
    echo 'Veuillez remplir tous les champs';
}


?>