<?php
session_start();

// Début Vérification de la conformité
$affichage_erreurs = '';
$erreurs = 0;

if (count($_POST) == 0) {
    header('Location: /index.php');
}

// Vérification de sélection d'un fichier
// Récupération des attributs du fichier (nom, type, taille)
if (!empty($_FILES)) {
    $image_nom = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_taille = $_FILES['image']['size'];
    $image_temporaire = $_FILES['image']['tmp_name'];
    $image_error = $_FILES['image']['error'];

    // Test si pas d'erreur de sélection
    if ($image_error == 0) {
        // Test format du fichier en fonction de l'extension
        if ($image_type != 'image/jpeg') {
            $affichage_erreurs .= '❌ Le fichier n\'est pas au format jpeg ou extension invalide<br>';
            $erreurs++;
        }

        // Test format du fichier avec la fonction exif_imagetype
        if (exif_imagetype($image_temporaire) != IMAGETYPE_JPEG) {
            $affichage_erreurs .= '❌ Ce fichier n\'est pas une image jpeg<br>';
            $erreurs++;
        }

        // Test de la taille du fichier
        $taille_max = 500 * 1024;
        if ($image_taille > $taille_max) {
            $affichage_erreurs .= '❌ La taille du fichier dépasse 500 Ko<br>';
            $erreurs++;
        }
    } else {
        $affichage_erreurs = '❌ Impossible de télécharger le fichier, erreur de sélection<br>';
        $_SESSION['information'] = $affichage_erreurs;
        $erreurs++;
        header('location: ../galerie.php');
        exit();
    }
} else {
    $affichage_erreurs = '❌ Vous devez sélectionner un fichier';
    header('location: ../galerie.php');
    $erreurs++;
    exit();
}

// On affiche les erreurs
if ($erreurs != 0) {
    $_SESSION['information'] = $affichage_erreurs;
    header('location: ../galerie.php');
    exit();
} else {
    $affichage_erreurs = '✅ Fichier conforme<br>';

    // On récupère le nombre de fichiers dans images/galerie
    $nbFichiers = -2;
    $dossier = opendir("../images/galerie");
    while ($fichier = readdir($dossier)) {
        $nbFichiers++;
    }

    // On renomme le fichier - imageN.jpg
    $image_num = $nbFichiers + 1;
    $image_nom = 'image' . $image_num . '.jpg';

    // On fixe le nom complet de la destination (chemin relatif/imageN.jpg)
    $destination = "../images/galerie/" . $image_nom;

    // On déplace le fichier dans son emplacement définitif
    if (move_uploaded_file($image_temporaire, $destination)) {
        $affichage_erreurs = '✅ Téléchargement terminé avec succès<br>';
    } else {
        $affichage_erreurs = '❌ Erreur de téléchargement<br>';
    }
}

$_SESSION['information'] = $affichage_erreurs;
header('location: ../galerie.php');
exit();
?>
