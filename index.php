<!DOCTYPE html>
<html lang="fr">
<head>
    <script src="assets/js/carousel-logo.js"></script>
    <?php require_once('./assets/conf/head.inc.php'); ?>
</head>
<body>
    <?php 
    // require_once('./assets/conf/grid.inc.php');

    require_once('./admin/conf.inc.php');
    require_once('./assets/conf/header.inc.php');

    ?>
<div class='video'>
    <video class="video-accueil" autoplay loop muted>
        <source src="assets/img/accueil.mp4" type="video/mp4">
    </video>
</div>

<div class="accueil-0">
<img class="wow slideInRight" data-wow-delay="0.4s" src="assets/img/video.png" alt="video">
<div class="accueil-0-infos">
<h2 class="bambino text-2xl" data-wow-delay="0.2s">Qui nous sommes ?</h2>
<p class="satoshi-medium text-s" data-wow-delay="0.1s">Le cojardinage est une nouvelle façon de jardiner, basée sur le partage et la collaboration. Ce concept innovant met en relation des personnes qui possèdent un jardin mais manquent de temps, d'énergie ou de compétences pour l'entretenir, avec des passionnés de jardinage à la recherche d'un espace pour cultiver. Ensemble, ils peuvent créer un jardin prospère et productif. Le cojardinage repose sur le principe du partage de l'espace. Les propriétaires de jardins offrent un espace souvent inutilisé à des jardiniers enthousiastes, optimisant ainsi l'utilisation des terrains disponibles et donnant une seconde vie à des jardins en sommeil. Cette collaboration permet aux deux parties de planifier, planter, entretenir et récolter ensemble, créant un échange de connaissances et de compétences qui enrichit l'expérience de chacun. Les fruits, légumes, herbes et fleurs cultivés sont ensuite partagés entre les partenaires, assurant une distribution équitable des récoltes et une satisfaction commune.</p>
</div>
</div>

<div class="accueil-1 gap-10">
    <img class="wow slideInLeft" data-wow-delay="0.1s"src="assets/img/accueil1.png" alt="accueil1">
    <div class="accueil-1-infos">
    <h2 class="bambino text-2xl" data-wow-delay="0.2s">Comment on fait pour devenir membres ?</h2>
    <p class="satoshi-medium text-s" data-wow-delay="0.1s">Rien de plus simple, une inscription est le tour est joué. En étant membre vous pouvez désomais rejoindre une parcelle d'un jardin d'un autre utilisateur. Vous pouvez aussi proposer votre propre jardin ou bien pour les plus chimiste proposer votre propre infusion à la communautée</p>
    </div>
</div>

<div class="accueil-2">
    <h2 class="bambino text-2xl" data-wow-delay="0.2s">Nos services</h2>
    <div class="accueil-2-content">
        <div class="accueil-2-content-1">
        <a class=" " data-wow-delay="0.2s" href="/Jardin/jardinList.php"><img src="/assets/img/jardin-accueil.png" alt="1"></a>
        <a class="" data-wow-delay="0.7s" href="/Jardin/jardinList.php"><input class="satoshi-medium" type="button" value="Voir Plus"></a>
        </div>
        <div class="accueil-2-content-2">
        <a class=" " data-wow-delay="0.4s" href="/Recette/recetteList.php"><img src="/assets/img/recette-accueil.png" alt="2"></a>
        <a class="" data-wow-delay="0.9s" href="/Recette/recetteList.php"><input class="satoshi-medium" type="button" value="Voir Plus"></a>
        </div>
        <div class="accueil-2-content-3">
        <a class=" " data-wow-delay="0.6s" href="/Plante/planteList.php"><img src="/assets/img/fleur-accueil.png" alt="3"></a>
        <a class="ht" data-wow-delay="1.1s" href="/Plante/planteList.php"><input class="satoshi-medium" type="button" value="Voir Plus"></a>
        </div>
    </div>
</div>

<div class="accueil-3">
    <h2 class="bambino text-2xl" data-wow-delay="0.2s">Besoin d’aide ?</h2>
    <p class="satoshi-medium text-s text-center max-w-[50%]" data-wow-delay="0.2s">Nos équipes seront ravis de répondre à vos problèmes. Un formulaire de contact est à votre disposition. Une fois votre formulaire envoyé, nous vous recontacterons le plus rapidement possible</p>
    <div class="accueil-3-contact">
        <a class="bambino wow bounceIn" data-wow-delay="0.4s" href="/User/contact.php"><input type="button" value="Nous contactez"></a>
    </div>
</div>
    <?php
    require_once('./assets/conf/footer.inc.php');
    ?>
</body>
</html>