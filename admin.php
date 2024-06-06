<?php 
    /**
     * Connexion à la base de données
     */
    require_once('./assets/conf/head.inc.php');
    require_once('./assets/conf/conf.inc.php');
    require_once('./assets/conf/header.inc.php');

    /**
     * Affichage des données de la table USER
     */
    $req = $db->query("SELECT * FROM USER;");
    echo '<h3>Table USER</h3>';
    require_once('./admin/User/inscriptionUser.php');
    echo '<table>';
    echo '<tr>';
    echo '<th>idUser</th>';
    echo '<th>name</th>';
    echo '<th>forname</th>';
    echo '<th>email</th>';
    echo '<th>password</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr>';
        echo '<td>'.$rep['idUser'].'</td>';
        echo '<td>'.$rep['name'].'</td>';
        echo '<td>'.$rep['forname'].'</td>';
        echo '<td>'.$rep['email'].'</td>';
        echo '<td>'.$rep['password'].'</td>';
        echo '<td><a href="/admin/User/deleteUser.php?num='. $rep['idUser'] . '">SUPPRIMER</a></td>';
        echo '<td><a href="/admin/User/modificationUser.php?num='. $rep['idUser'] . '">MODIFIER</a></td>';
        echo '</tr>';
    }
    echo '</table>';


    /**
     * Affichage des données de la table JARDIN
     */
    echo '<h3>Table JARDIN</h3>';
    require_once('./admin/Jardin/inscriptionJardin.php');
     
    $req = $db->query("SELECT * FROM JARDIN;");
    echo '<table>';
    echo '<tr>';
    echo '<th>idJardin</th>';
    echo '<th>name</th>';
    echo '<th>ville</th>';
    echo '<th>CP</th>';
    echo '<th>adresse</th>';
    echo '<th>taille</th>';
    echo '<th>max</th>';
    echo '<th>ownerId</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr>';
        echo '<td>'.$rep['idJardin'].'</td>'; 
        echo '<td>'.$rep['name'].'</td>';
        echo '<td>'.$rep['ville'].'</td>';
        echo '<td>'.$rep['CP'].'</td>';
        echo '<td>'.$rep['adresse'].'</td>';
        echo '<td>'.$rep['taille'].'</td>';
        echo '<td>'.$rep['max'].'</td>';
        echo '<td>'.$rep['ownerId'].'</td>';
        echo '<td><a href="/admin/Jardin/deleteJardin.php?num='. $rep['idJardin'] . '">SUPPRIMER</a></td>';
        echo '<td><a href="/admin/Jardin/modificationJardin.php?num='. $rep['idJardin'] . '">MODIFIER</a></td>';
        echo '</tr>';
    }
    echo '</table>';

        /**
     * Affichage des données de la table PARCELLE
     */
    echo '<h3>Table PARCELLE</h3>';
    require_once('./admin/Parcelle/inscriptionParcelle.php');

    $req = $db->query(" SELECT PARCELLE.idParcelle, PARCELLE.superficie, PARCELLE.jardinId, PARCELLE.occupantId,
                                JARDIN.name AS jardinName, 
                                USER.email AS userEmail
                        FROM PARCELLE
                        INNER JOIN JARDIN ON JARDIN.idJardin = PARCELLE.idParcelle
                        INNER JOIN USER ON USER.idUser = PARCELLE.idParcelle
;");

    echo '<table>';
    echo '<tr>';
    echo '<th>idParcelle</th>';
    echo '<th>superficie</th>';
    echo '<th>jardinId</th>';
    echo '<th>nomJardin</th>';
    echo '<th>occupantId</th>';
    echo '<th>emailOccupant</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr>';
        echo '<td>'.$rep['idParcelle'].'</td>';
        echo '<td>'.$rep['superficie'].'</td>';
        echo '<td>'.$rep['jardinId'].'</td>';
        echo '<td>'.$rep['jardinName'].'</td>';
        echo '<td>'.$rep['occupantId'].'</td>';
        echo '<td>'.$rep['userEmail'].'</td>';
        echo '<td><a href="/admin/Parcelle/deleteParcelle.php?num='. $rep['idParcelle'] . '">SUPPRIMER</a></td>';
        echo '<td><a href="/admin/Parcelle/modificationParcelle.php?num='. $rep['idParcelle'] . '">MODIFIER</a></td>';
        echo '</tr>';
    }
    echo '</table>';

    /**
     * Affichage des données de la table PLANTE
     */
    $req = $db->query("SELECT * FROM PLANTE;");
    echo '<h3>Table Plante</h3>';
    echo '<table>';
    echo '<tr>';
    echo '<th>idPlante</th>';
    echo '<th>name</th>';
    echo '<th>typePlanteId</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr>';
        echo '<td>'.$rep['idPlante'].'</td>';
        echo '<td>'.$rep['name'].'</td>';
        echo '<td>'.$rep['typePlanteId'].'</td>';
        echo '</tr>';
    }
    echo '</table>';

    /**
     * Affichage des données de la table TYPE_PLANTE
     */
    $req = $db->query("SELECT * FROM TYPE_PLANTE;");
    echo '<h3>Table Type_Plante</h3>';
    echo '<table>';
    echo '<tr>';
    echo '<th>idTypePlante</th>';
    echo '<th>typeName</th>';
    echo '<th>origineName</th>'; 
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr>';
        echo '<td>'.$rep['idTypePlante'].'</td>';
        echo '<td>'.$rep['typeName'].'</td>';
        echo '<td>'.$rep['origineName'].'</td>'; 
        echo '</tr>';
    }
    echo '</table>';

    /**
     * Affichage des données de la table RECETTE
     */
    $req = $db->query("SELECT * FROM RECETTE;");
    echo '<h3>Table RECETTE</h3>';
    echo '<table>';
    echo '<tr>';
    echo '<th>idRecette</th>';
    echo '<th>name</th>';
    echo '<th>creatorId</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr>';
        echo '<td>'.$rep['idRecette'].'</td>';
        echo '<td>'.$rep['name'].'</td>';
        echo '<td>'.$rep['creatorId'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
?>
