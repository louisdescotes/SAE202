<body>
<?php 
    /**
     * Connexion à la base de données
     */
    require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/conf.inc.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/conf/head.inc.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/conf/header.inc.php';
    

    // require_once('../assets/conf/grid.inc.php');
?>
<div class="grid grid-cols-2 my-10 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-5 mx-5">
    <div class="col-start-1 col-end-9 row-start-1 flex sm:block gap-2 flex-col">
    <button class="view-button button-secondary" data-view="Users" onclick="setView('Users')">Users</button>
    <button class=" view-button button-primary" data-view="Jardins" onclick="setView('Jardins')">Jardins</button>
    <button class=" view-button button-primary" data-view="Parcelles" onclick="setView('Parcelles')">Parcelles</button>
    <button class=" view-button button-primary" data-view="Plantes" onclick="setView('Plantes')">Plantes</button>
    <button class=" view-button button-primary" data-view="Type_Plante" onclick="setView('Type_Plante')">Type Plante</button>
    <button class=" view-button button-primary" data-view="RecetteAd" onclick="setView('RecetteAd')">Recettes</button>
    </div>
    <div class="col-start-1 row-start-2 flex flex-col w-full sm:col-start-8 col-end-9 sm:row-start-1 text-end">
    <button class=" view-button button-tercery" data-view="Demandes" onclick="setView('Demande')">Demandes</button>
    </div>
</div>


<div class="view Users flex flex-col gap-5 mx-5 overflow-hidden">
<?php
    /**
     * Affichage des données de la table USER
     */
    require_once('../admin/User/inscriptionUser.php');
    
    $req = $db->query("SELECT * FROM USER");
    $userReq = $db->prepare('SELECT COUNT(idUser) as userCount FROM USER');
    $userReq->execute();
    $userCount = $userReq->fetchColumn();
    
    echo '<span class="row-start-2">Total de users: ' . htmlspecialchars($userCount) . '</span>';

    echo '<div class="w-full h-full overflow-scroll">';
    echo '<table class="col-start-1 border-collapse overflow-x-auto col-end-9 w-full">';
    echo '<tr class="text-main">';
    echo '<th class="text-start">idUser</th>';
    echo '<th class="text-start">name</th>';
    echo '<th class="text-start">forname</th>';
    echo '<th class="text-start">email</th>';
    echo '<th class="text-start">password</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr class="h-8">';
        echo '<td class="">'.$rep['idUser'].'</td>';
        echo '<td class="">'.$rep['name'].'</td>';
        echo '<td class="">'.$rep['forname'].'</td>';
        echo '<td class="">'.$rep['email'].'</td>';
        echo '<td class="">'.$rep['password'].'</td>';
        echo '<td class=""><a class="button-primary" href="/admin/User/modificationUser.php?num='. $rep['idUser'] . '">MODIFIER</a></td>';
        echo '<td class=""><a class="button-tercery" href="/admin/User/deleteUser.php?num='. $rep['idUser'] . '">SUPPRIMER</a></td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
?>
</div>

<div class="view Jardins flex flex-col gap-5 mx-5 overflow-hidden">
    <?php
    /**
     * Affichage des données de la table JARDIN
     */
    require_once('../admin/Jardin/inscriptionJardin.php');

    $req = $db->query("SELECT * FROM JARDIN");
    $jardinReq = $db->prepare('SELECT COUNT(idJardin) as jardinCount FROM JARDIN');
    $jardinReq->execute();
    $jardinCount = $jardinReq->fetchColumn();
    
    echo '<span class="row-start-2">Total de jardins: ' . htmlspecialchars($jardinCount) . '</span>';
     
    $req = $db->query("SELECT * FROM JARDIN;");
    echo '<div class="w-full h-full overflow-scroll">';
    echo '<table class="col-start-1 col-end-9 w-full border-collapse overflow-x-auto">';
    echo '<tr class="text-main">';
    echo '<th class="text-start">idJardin</th>';
    echo '<th class="text-start">name</th>';
    echo '<th class="text-start">ville</th>';
    echo '<th class="text-start">CP</th>';
    echo '<th class="text-start">adresse</th>';
    echo '<th class="text-start">taille</th>';
    echo '<th class="text-start">img</th>';
    echo '<th class="text-start">max</th>';
    echo '<th class="text-start">ownerId</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr class="h-8">';
        echo '<td class="">'.$rep['idJardin'].'</td>'; 
        echo '<td class="">'.$rep['name'].'</td>';
        echo '<td class="">'.$rep['ville'].'</td>';
        echo '<td class="">'.$rep['CP'].'</td>';
        echo '<td class="">'.$rep['adresse'].'</td>';
        echo '<td class="">'.$rep['taille'].'</td>';
        echo '<td class="">'.$rep['img'].'</td>';
        echo '<td class="">'.$rep['max'].'</td>';
        echo '<td class="">'.$rep['ownerId'].'</td>';
        echo '<td class=""><a class="button-primary" href="/admin/Jardin/modificationJardin.php?num='. $rep['idJardin'] . '">MODIFIER</a></td>';
        echo '<td class=""><a class="button-tercery" href="/admin/Jardin/deleteJardin.php?num='. $rep['idJardin'] . '">SUPPRIMER</a></td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
    ?>
</div>

<div class="view Parcelles flex flex-col gap-5 mx-5 overflow-hidden">
    <?php
    /**
     * Affichage des données de la table PARCELLE
     */
    require_once('../admin/Parcelle/inscriptionParcelle.php');

    $req = $db->query("SELECT * FROM PARCELLE");
    $parcelleReq = $db->prepare('SELECT COUNT(idParcelle) as parcelleCount FROM PARCELLE');
    $parcelleReq->execute();
    $parcelleCount = $parcelleReq->fetchColumn();
    
    echo '<span class="row-start-2">Total de parcelles: ' . htmlspecialchars($parcelleCount) . '</span>';

    $req = $db->query(" SELECT * FROM PARCELLE
;");
    echo '<div class="w-full h-full overflow-scroll">';
    echo '<table class="col-start-1 col-end-9 w-full border-collapse overflow-x-auto">';
    echo '<tr class="text-main">';
    echo '<th class="text-start">idParcelle</th>';
    echo '<th class="text-start">superficie</th>';
    echo '<th class="text-start">jardinId</th>';
    echo '<th class="text-start">occupantId</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr class="h-8">';
        echo '<td class="">'.$rep['idParcelle'].'</td>';
        echo '<td class="">'.$rep['superficie'].'</td>';
        echo '<td class="">'.$rep['jardinId'].'</td>';
        echo '<td class="">'.$rep['occupantId'].'</td>';
        echo '<td class=""><a class="button-primary" href="/admin/Parcelle/modificationParcelle.php?num='. $rep['idParcelle'] . '">MODIFIER</a></td>';
        echo '<td class=""><a class="button-tercery" href="/admin/Parcelle/deleteParcelle.php?num='. $rep['idParcelle'] . '">SUPPRIMER</a></td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
    ?>
</div>

<div class="view Plantes flex flex-col gap-5 mx-5 overflow-hidden">
    <?php
    /**
     * Affichage des données de la table PLANTE
     */
    require_once('../admin/Plante/ajouterPlante.php');

    $req = $db->query("SELECT * FROM PLANTE");
    $planteReq = $db->prepare('SELECT COUNT(idPlante) as planteCount FROM PLANTE');
    $planteReq->execute();
    $planteCount = $planteReq->fetchColumn();
    
    echo '<span class="row-start-2">Total de plantes: ' . htmlspecialchars($planteCount) . '</span>';
    echo '<div class="w-full h-full overflow-scroll">';
    $req = $db->query("SELECT * FROM PLANTE;");
    echo '<table class="col-start-1 col-end-9 w-full border-collapse overflow-x-auto">';
    echo '<tr class="text-main">';
    echo '<th class="text-start">idPlante</th>';
    echo '<th class="text-start">name</th>';
    echo '<th class="text-start">img</th>';
    echo '<th class="text-start">typePlanteId</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr class="h-8">';
        echo '<td class"">'.$rep['idPlante'].'</td>';
        echo '<td class"">'.$rep['name'].'</td>';
        echo '<td class"">'.$rep['img'].'</td>';
        echo '<td class"">'.$rep['typePlanteId'].'</td>';
        echo '<td class=""><a class="button-primary" href="/admin/Plante/modifierPlante.php?num='. $rep['idPlante'] . '">MODIFIER</a></td>';
        echo '<td class=""><a class="button-tercery" href="/admin/Plante/supprimerPlante.php?num='. $rep['idPlante'] . '">SUPPRIMER</a></td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
    ?>
</div>

<div class="view Type_Plante flex flex-col  gap-5 mx-5 overflow-hidden">
    <?php
    /**
     * Affichage des données de la table TYPE_PLANTE
     */

     require_once('../admin/TypePlante/ajoutTypePlante.php');

     $req = $db->query("SELECT * FROM TYPE_PLANTE;");
     $typePlanteReq = $db->prepare('SELECT COUNT(idTypePlante) as typePlanteCount FROM TYPE_PLANTE');
     $typePlanteReq->execute();
     $typePlanteCount = $typePlanteReq->fetchColumn();
     
     echo '<span class="row-start-2">Total de plantes: ' . htmlspecialchars($typePlanteCount) . '</span>';
     echo '<div class="w-full h-full overflow-scroll">';
    $req = $db->query("SELECT * FROM TYPE_PLANTE;");
    echo '<table class="col-start-1 col-end-9 w-full border-collapse overflow-x-auto">';
    echo '<tr class="text-main">';
    echo '<th class="text-start">idTypePlante</th>';
    echo '<th class="text-start">typeName</th>';
    echo '<th class="text-start">origineName</th>'; 
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr class="h-8">';
        echo '<td class="">'.$rep['idTypePlante'].'</td>';
        echo '<td class="">'.$rep['typeName'].'</td>';
        echo '<td class="">'.$rep['origineName'].'</td>'; 
        echo '<td class=""><a class="button-primary" href="/admin/TypePlante/modifierTypePLante.php?num='. $rep['idTypePlante'] . '">MODIFIER</a></td>';
        echo '<td class=""><a class="button-tercery" href="/admin/TypePlante/supprimerTypePlante.php?num='. $rep['idTypePlante'] . '">SUPPRIMER</a></td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
    ?>
</div>

<div class="view RecetteAd flex flex-col my-10 gap-5 mx-5 overflow-hidden">
    <?php
    /**
     * Affichage des données de la table RECETTE
     */
    $req = $db->query("SELECT * FROM RECETTE;");
    $recetteReq = $db->prepare('SELECT COUNT(idRecette) as recetteCount FROM RECETTE');
    $recetteReq->execute();
    $recetteCount = $recetteReq->fetchColumn();
    
    echo '<span class="row-start-1">Total de recette: ' . htmlspecialchars($recetteCount) . '</span>';
    echo '<div class="w-full h-full overflow-scroll">';
    echo '<table class="col-start-1 col-end-9 w-full border-collapse overflow-x-auto">';
    echo '<tr class="text-main">';
    echo '<th class="text-start">idRecette</th>';
    echo '<th class="text-start">name</th>';
    echo '<th class="text-start">creatorId</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr class="h-8">';
        echo '<td class="">'.$rep['idRecette'].'</td>';
        echo '<td class="">'.$rep['name'].'</td>';
        echo '<td class="">'.$rep['creatorId'].'</td>';

        echo '<td class=""><a class="button-tercery" href="/admin/Recette/supprimerRecette.php?num='. $rep['idRecette'] . '">SUPPRIMER</a></td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
    ?>
</div>

<div class="view Demande flex flex-col  gap-5 mx-5 overflow-hidden">
    <?php
    /**
     * Affichage des données de la table RESERVATION
     */
    $req = $db->query("SELECT * FROM RESERVATION;");
    echo '<div class="w-full h-full overflow-scroll">';
    echo '<table class="col-start-1 col-end-9 w-full border-collapse overflow-x-auto">';
    echo '<tr class="text-main">';
    echo '<th class="text-start">ReservationId</th>';
    echo '<th class="text-start">nomJardin</th>';
    echo '<th class="text-start">villeJardin</th>';
    echo '<th class="text-start">CPJardin</th>';
    echo '<th class="text-start">adresseJardin</th>';
    echo '<th class="text-start">tailleJardin</th>';
    echo '<th class="text-start">maxJardin</th>';
    echo '<th class="text-start">imgJardin</th>';
    echo '<th class="text-start">_idUser</th>';
    echo '<th class="text-start"></th>';
    echo '<th class="text-start"></th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr class="h-8">';
        echo '<td class="">'.$rep['ReservationId'].'</td>';
        echo '<td class="">'.$rep['nameJardin'].'</td>';
        echo '<td class="">'.$rep['villeJardin'].'</td>';
        echo '<td class="">'.$rep['CPJardin'].'</td>';
        echo '<td class="">'.$rep['adresseJardin'].'</td>';
        echo '<td class="">'.$rep['tailleJardin'].'</td>';
        echo '<td class="">'.$rep['maxJardin'].'</td>';
        echo '<td class="">'.$rep['imgJardin'].'</td>';
        echo '<td class="">'.$rep['_idUser'].'</td>';

        echo '<form action="/admin/Demande/reservationAccepte.php" class="button-primary" method="post" enctype="multipart/form-data">';
        echo '<input class="hidden" type="text" id="ReservationId" name="ReservationId"  value="'. $rep['ReservationId'] .'">';
        echo '<input class="hidden" type="text" id="nameJardin" name="nameJardin"  value="'. $rep['nameJardin'] .'">';
        echo '<input class="hidden" type="text" id="villeJardin" name="villeJardin"  value="'. $rep['villeJardin'] .'">';
        echo '<input class="hidden" type="text" id="CPJardin" name="CPJardin" value="'. $rep['CPJardin'] .'">';
        echo '<input class="hidden" type="text" id="adresseJardin" name="adresseJardin" value="'. $rep['adresseJardin'] .'" >';
        echo '<input class="hidden" type="text" id="tailleJardin" name="tailleJardin" value="'. $rep['tailleJardin'] .'" >';
        echo '<input class="hidden" type="text" id="maxJardin" name="maxJardin" value="'. $rep['maxJardin'] .'" >';
        echo '<input class="hidden" type="text" id="imgJardin" name="imgJardin" value="'. $rep['imgJardin'] .'" >';
        echo '<input class="hidden" type="text" id="_idUser" name="_idUser" value="'. $rep['_idUser'] .'">';
        echo '<td><input class="button-primary" type="submit" value="Accepter"></td>';
        echo '</form>';

        echo '<form action="/admin/Demande/reservationRefuse.php" class="button-primary" method="post">';
        echo '<input class="hidden" type="text" id="Res rvationId" name="ReservationId"  value="'. $rep['ReservationId'] .'">';
        echo '<input class="hidden" type="text" id="nameJardin" name="nameJardin"  value="'. $rep['nameJardin'] .'">';
        echo '<input class="hidden" type="text" id="villeJardin" name="villeJardin"  value="'. $rep['villeJardin'] .'">';
        echo '<input class="hidden" type="text" id="CPJardin" name="CPJardin" value="'. $rep['CPJardin'] .'">';
        echo '<input class="hidden" type="text" id="adresseJardin" name="adresseJardin" value="'. $rep['adresseJardin'] .'" >';
        echo '<input class="hidden" type="text" id="tailleJardin" name="tailleJardin" value="'. $rep['tailleJardin'] .'" >';
        echo '<input class="hidden" type="text" id="maxJardin" name="maxJardin" value="'. $rep['maxJardin'] .'" >';
        echo '<input class="hidden" type="text" id="imgJardin" name="imgJardin" value="'. $rep['imgJardin'] .'" >';
        echo '<input class="hidden" type="text" id="_idUser" name="_idUser" value="'. $rep['_idUser'] .'">';
        echo '<td class="button"><input class="button-tercery" type="submit" value="Refuser"></td>';
        echo '</form>';
        echo '</div>';

        // <form action="/Admin/Demande/reservationRefuse.php" class="button-tercery></form>

        echo '</tr>';
    }
    echo '</table>';
    ?>
</div>

<div>
    <?php
    if(isset($_SESSION['information'])) {
        echo '<p>' . $_SESSION['information'] . '</p>';
    }
    ?>
</div>

<script src="../assets/js/adminPanel.js"></script>
</body>
