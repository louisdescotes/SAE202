<?php
/**
 * Connexion à la base de données
 */
require_once('../assets/conf/head.inc.php');
require_once('../assets/conf/header.inc.php');
require_once('../admin/conf.inc.php');

session_start(); // Assurez-vous que la session est bien démarrée

if (isset($_POST['num']) && isset($_SESSION['id'])) {
    $idParcelle = $_POST['num'];
    $userId = $_SESSION['id'];
    
    try {
        // Préparer la requête SQL pour mettre à jour occupantId à NULL
        $req = $db->prepare('UPDATE PARCELLE SET occupantId = NULL WHERE idParcelle = :idParcelle AND occupantId = :userId');
        $req->bindParam(':idParcelle', $idParcelle, PDO::PARAM_INT);
        $req->bindParam(':userId', $userId, PDO::PARAM_INT);
        
        // Exécuter la requête
        if ($req->execute()) {
            header('Location: /User/profil.php');
            exit(); // Assurez-vous de quitter le script après la redirection
        } else {
            echo 'Échec de la suppression de la parcelle.';
        }
    } catch(PDOException $e) {
        echo 'Erreur lors de la suppression: ' . $e->getMessage();
    }
} else {
    echo 'Informations manquantes pour quitter la parcelle.';
}
?>
