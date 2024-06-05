<?php
/**
 * Connexion à la base de données
 */
try {
    $db = new PDO('mysql:host=localhost;dbname=sae202Base;charset=UTF8;', 'phpmyadmin', 'PASSWORD');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion: ' . $e->getMessage();
}

if (isset($_GET['num'])) {
    $parcelle_delete = $_GET['num'];

    try {
        $req = $db->prepare('DELETE FROM PARCELLE WHERE idParcelle = :parcelle_delete');
        $req->bindParam(':parcelle_delete', $parcelle_delete, PDO::PARAM_INT);

        if ($req->execute()) {
            header('Location: /sae202/admin.php');
            exit(); // Ajout de exit() pour s'assurer que le script s'arrête après la redirection
        } else {
            echo 'Échec de la suppression de la parcelle.';
        }
    } catch (PDOException $e) {
        echo 'Erreur lors de la suppression: ' . $e->getMessage();
    }
} else {
    echo 'Aucun numéro de parcelle spécifié.';
}
?>
