<?php 
    /**
     * Connexion à la base de données
     */
    try {
    $db= new PDO('mysql:host=localhost;dbname=sae202Base;charset=UTF8;', 'phpmyadmin', 'PASSWORD');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e) {
    echo 'Erreur de connexion:' . $e->getMessage();
    }


    require_once('header.inc.php');

    /**
     * Affichage des données de la table USER
     */
    $req = $db->query("SELECT * FROM USER;");
    $rep = $req->fetch();

    echo '<h3>Table USER</h3>';
    require_once('../sae202/admin/User/userInscription.php');
    echo '<table>';
    echo '<tr>';
    echo '<th>idUser</th>';
    echo '<th>nomUser</th>';
    echo '<th>prenomUser</th>';
    echo '<th>emailUser</th>';
    echo '<th>mdpUser</th>';
    echo '<th>photoUser</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr>';
        echo '<td>'.$rep['idUser'].'</td>';
        echo '<td>'.$rep['nomUser'].'</td>';
        echo '<td>'.$rep['prenomUser'].'</td>';
        echo '<td>'.$rep['emailUser'].'</td>';
        echo '<td>'.$rep['mdpUser'].'</td>';
        echo '<td>'.$rep['photoUser'].'</td>';
        echo '<td><a href="/sae202/admin/User/deleteUser.php?num='. $rep['idUser'] . '">SUPPRIMER</a></td>';
        echo '<td><a href="/sae202/admin/User/modificationUser.php?num='. $rep['idUser'] . '">MODIFIER</a></td>';
        echo '</tr>';
    }
    echo '</table>';

    /**
     * Affichage des données de la table PARCELLE
     */
    $req = $db->query("SELECT * FROM PARCELLE;");
    $rep = $req->fetch();
    echo '<h3>Table PARCELLE</h3>';
    echo '<table>';
    echo '<tr>';
    echo '<th>idParcelle</th>';
    echo '<th>nomParcelle</th>';
    echo '<th>nbPersonneParcelle</th>';
    echo '<th>superficieParcelle</th>';
    echo '<th>villeParcelle</th>';
    echo '<th>CPParcelle</th>';
    echo '<th>adresseParcelle</th>';
    echo '<th>_id_user</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
    echo '<tr>';
        echo '<td>'.$rep['idParcelle'].'</td>';
        echo '<td>'.$rep['nomParcelle'].'</td>';
        echo '<td>'.$rep['nbPersonneParcelle'].'</td>';
        echo '<td>'.$rep['superficieParcelle'].'</td>';
        echo '<td>'.$rep['villeParcelle'].'</td>';
        echo '<td>'.$rep['CPParcelle'].'</td>';
        echo '<td>'.$rep['adresseParcelle'].'</td>';
        echo '<td>'.$rep['_id_user'].'</td>';
    echo '</tr>';
    }
    echo '</table>';

    /**
     * Affichage des données de la table PLANTE
     */
    $req = $db->query("SELECT * FROM PLANTE;");
    $rep = $req->fetch();
    echo '<h3>Table Plante</h3>';
    echo '<table>';
    echo '<tr>';
    echo '<th>idPlante</th>';
    echo '<th>nomPlante</th>';
    echo '<th>nomLatinPlante</th>';
    echo '<th>photoPlante</th>';
    echo '<th>endroitPlante</th>';
    echo '<th>terrainPlante</th>';
    echo '<th>besoinDeauPlante</th>';
    echo '<th>impactEnvPlante</th>';
    echo '<th>_id_parcelle</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr>';
        echo '<td>'.$rep['idPlante'].'</td>';
        echo '<td>'.$rep['nomPlante'].'</td>';
        echo '<td>'.$rep['nomLatinPlante'].'</td>';
        echo '<td>'.$rep['photoPlante'].'</td>';
        echo '<td>'.$rep['endroitPlante'].'</td>';
        echo '<td>'.$rep['terrainPlante'].'</td>';
        echo '<td>'.$rep['besoinDeauPlante'].'</td>';
        echo '<td>'.$rep['impactEnvPlante'].'</td>';
        echo '<td>'.$rep['_id_parcelle'].'</td>';
        echo '</tr>';
    }
    echo '</table>';

        /**
     * Affichage des données de la table TYPE_PLANTE
     */
    $req = $db->query("SELECT * FROM TYPE_PLANTE;");
    $rep = $req->fetch();
    echo '<h3>Table Type_Plante</h3>';
    echo '<table>';
    echo '<tr>';
    echo '<th>idTypePlante</th>';
    echo '<th>nomTypePlante</th>';
    echo '<th>origineTypePlante</th>';
    echo '<th>_id_plante</th>';
    echo '</tr>';
    while($rep = $req->fetch()) {
        echo '<tr>';
        echo '<td>'.$rep['idTypePlante'].'</td>';
        echo '<td>'.$rep['nomTypePlante'].'</td>';
        echo '<td>'.$rep['origineTypePlante'].'</td>';
        echo '<td>'.$rep['_id_plante'].'</td>';
        echo '</tr>';
    }
    echo '</table>';

?>