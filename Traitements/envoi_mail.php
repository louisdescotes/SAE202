<?php

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$message = $_POST['message'];
$email = $_POST['email'];
$type_demande = $_POST['radio'];

$prenom = ucfirst(mb_strtolower($prenom));
$nom = ucfirst(mb_strtolower($nom));

$affichage_retour = '';
$erreurs = 0;

if (empty($_POST['nom'])) {
    header('location: /User/contact.php');
    $affichage_retour .= '❌ Le champ NOM est obligatoire<br>';
    $erreurs++;
}

if (empty($_POST['prenom'])) {
  header('location: /User/contact.php');
    $affichage_retour .= '❌ Le champ PRENOM est obligatoire<br>';
    $erreurs++;
}

if (empty($_POST['email'])) {
    header('location: /User/contact.php');
    $affichage_retour .= '❌ Le champ EMAIL est obligatoire<br>';
    $erreurs++;
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('location: /User/contact.php');
    $affichage_retour .= '❌ Le champ EMAIL est incorrect<br>';
    $erreurs++;
}

if (empty($_POST['radio'])) {
    header('location: /User/contact.php');
    $affichage_retour .= '❌ Le champ TYPE est obligatoire<br>';
    $erreurs++;
} else {
    $type_demande = $_POST['radio'];
}

if (empty($_POST['message'])) {
    header('location: /User/contact.php');
    $affichage_retour .= '❌ Le champ MESSAGE est obligatoire<br>';
    $erreurs++;
} else {
    $message = $_POST['message'];
}

if ($erreurs == 0) {
    $subject = "SAE105 : Mail de $prenom $nom";
    $headers['From'] = $email;
    $headers['Reply-to'] = $email;
    $headers['X-Mailer'] = 'PHP/' . phpversion();

    $email_dest = "mmi23b06@mmi-troyes.fr";

    if (mail($email_dest, $subject, $message, $headers)) {
        $erreurs = 0;
    } else {
        $erreurs++;
    }

    $subject = "Confirmation de votre demande sur SAE105";
    $headers['From'] = "mmi23b06@mmi-troyes.fr";
    $headers['Reply-to'] = "no-reply@mmi-troyes.fr";
    $headers['X-Mailer'] = 'PHP/' . phpversion();
    $headers['MIME-Version'] = '1.0';
    $headers['content-type'] = 'text/html; charset=utf-8';

    $email_dest = $email;

    switch ($type_demande) {
        case 'information':
            $message_radio = "Votre demande d'information a bien été prise en compte";
            break;
        case 'devis':
            $message_radio = "Votre demande de devis a été transmise";
            break;
        case 'reclamation':
            $message_radio = "Votre réclamation sera traitée dans les meilleurs délais";
            break;
    }

    $message_dest = "<!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    </head>
    <body style='text-align:center;'>
        <h1> <img src='http://mmi23b06.sae105.ovh/images/Crown32x32.webp' alt='Logo de Sofiane Pamart'> Bonjour $prenom $nom</h1><br>
        <h2> $message_radio </h2><br>
        <span style='color:#323233;'>Nos équipes vous remercient d'avoir pris contact avec nous.</span>
        <br>
        <br>
        <br>
        <a href='http://mmi23b06.sae105.ovh/index.php' style='border-radius: 5px; border: 1px solid #C9C9CC; background: #E2E2E5; padding: 5px 10px; text-decoration:none; color:#080809; width: 20%; text-align: center;'>Retournez sur le site</a>
        <br>
        <img style='margin-top: 10px;' src='http://mmi23b06.sae105.ovh/images/galerie/28.jpeg' alt='Logo de Sofiane Pamart'>
    </body>
    </html>";

    if (mail($email_dest, $subject, $message_dest, $headers)) {
        $erreurs = 0;
    } else {
        $erreurs++;
    }

    $affichage_retour = '✅ Votre demande a bien été envoyée';
    header('location: /index.php');

    if ($erreurs != 0) {
        $affichage_retour = "❌ Echec de l'envoi du message";
        header('location: /index.php');
    }
}