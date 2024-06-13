<?php

session_start();
$_SESSION['information'] = '';
$affichage_retour = '';

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$message = $_POST['message'];
$email = $_POST['email'];
$type_demande = $_POST['radio'];

$prenom = ucfirst(mb_strtolower($prenom));
$nom = ucfirst(mb_strtolower($nom));

$erreurs = 0;

try {
    if (!empty($nom) && !empty($prenom) && !empty($message) && !empty($email) && !empty($type_demande)) {
        $subject = "SAE105 : Mail de $prenom $nom";
        $headers = [
            'From' => $email,
            'Reply-to' => $email,
            'X-Mailer' => 'PHP/' . phpversion()
        ];
    
        $email_dest = "mmi23b06@mmi-troyes.fr";
    
        if (mail($email_dest, $subject, $message, $headers)) {
            $erreurs = 0;
        } else {
            $erreurs++;
        }
    
        $subject = "Confirmation de votre demande sur SAE105";
        $headers = [
            'From' => "mmi23b06@mmi-troyes.fr",
            'Reply-to' => "no-reply@mmi-troyes.fr",
            'X-Mailer' => 'PHP/' . phpversion(),
            'MIME-Version' => '1.0',
            'Content-Type' => 'text/html; charset=utf-8'
        ];
    
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
            <h1><img src='http://mmi23b06.sae105.ovh/images/Crown32x32.webp' alt='Logo de Sofiane Pamart'> Bonjour $prenom $nom</h1><br>
            <h2>$message_radio</h2><br>
            <span style='color:#323233;'>Nos équipes vous remercient d'avoir pris contact avec nous.</span>
            <br><br><br>
            <a href='http://mmi23b06.sae105.ovh/index.php' style='border-radius: 5px; border: 1px solid #C9C9CC; background: #E2E2E5; padding: 5px 10px; text-decoration:none; color:#080809; width: 20%; text-align: center;'>Retournez sur le site</a>
            <br>
            <img style='margin-top: 10px;' src='http://mmi23b06.sae105.ovh/images/galerie/28.jpeg' alt='Logo de Sofiane Pamart'>
        </body>
        </html>";
    
        if (mail($email_dest, $subject, $message_dest, $headers)) {
            $affichage_retour = '
            <div class="popup w-fit fixed bottom-2.5 right-2.5 cursor-pointer">
                <div class="absolute right-2.5 top-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                </div>
                <div class="flex items-center p-5 gap-5 bg-cream rounded-md w-fit">
                    <div class="w-20">
                        <img draggable="false" src="../assets/img/clemence.png" alt="clemence">
                    </div>
                    <p class="max-w-60">Votre mail a été envoyé.</p>
                </div>
            </div>';
        } else {
            $affichage_retour = '
            <div class="popup w-fit fixed bottom-2.5 right-2.5 cursor-pointer">
                <div class="absolute right-2.5 top-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                </div>
                <div class="flex items-center p-5 gap-5 bg-cream rounded-md w-fit">
                    <div class="w-20">
                        <img draggable="false" src="../assets/img/louis.png" alt="erreur">
                    </div>
                    <p class="max-w-60">Erreur: Echec de l\'envoi du mail</p>
                </div>
            </div>';
        }
    } else {
        $affichage_retour = '
        <div class="popup w-fit fixed bottom-2.5 right-2.5 cursor-pointer">
            <div class="absolute right-2.5 top-2.5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
            </div>
            <div class="flex items-center p-5 gap-5 bg-cream rounded-md w-fit">
                <div class="w-20">
                    <img draggable="false" src="../assets/img/louis.png" alt="erreur">
                </div>
                <p class="max-w-60">Erreur: Tous les champs sont obligatoires</p>
            </div>
        </div>';
    }

    $_SESSION['information'] = $affichage_retour;
    header('location: /User/contact.php');
    exit();
} catch (Exception $e) {
    $affichage_retour = '
    <div class="popup w-fit fixed bottom-2.5 right-2.5 cursor-pointer">
        <div class="absolute right-2.5 top-2.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
        </div>
        <div class="flex items-center p-5 gap-5 bg-cream rounded-md w-fit">
            <div class="w-20">
                <img draggable="false" src="../assets/img/louis.png" alt="erreur">
            </div>
            <p class="max-w-60">Erreur: Echec de l\'envoi du mail</p>
        </div>
    </div>';

    $_SESSION['information'] = $affichage_retour;
    header('location: /User/contact.php');
    exit();
}
?>
