<?php
    require_once('../conf.inc.php');
    require_once('../header.inc.php');
?>

<h2>PARCELLES</h2>

<?php
    $req = $db->prepare('SELECT *, USER.nomUser, USER.prenomUser, USER.emailUser 
        FROM PARCELLE 
        LEFT JOIN USER 
        ON PARCELLE._id_user = USER.idUser');
    $req->execute();
    $parcelles = $req->fetchAll();

    foreach ($parcelles as $parcelle) {
        echo '<p>' . htmlspecialchars($parcelle['nomParcelle']) . '</p>';
        echo '<p>' . htmlspecialchars($parcelle['nbPersonneParcelle']) . '</p>';
        echo '<p>' . htmlspecialchars($parcelle['superficieParcelle']) . '</p>';
        echo '<p>' . htmlspecialchars($parcelle['villeParcelle']) . '</p>';
        echo '<p>' . htmlspecialchars($parcelle['CPParcelle']) . '</p>';
        echo '<p>' . htmlspecialchars($parcelle['adresseParcelle']) . '</p>';

        if (!empty($parcelle['nomUser']) && !empty($parcelle['prenomUser']) && !empty($parcelle['emailUser'])) {
            echo '<p>Responsable: ' . htmlspecialchars($parcelle['nomUser']) . ' ' . htmlspecialchars($parcelle['prenomUser']) . ' (' . htmlspecialchars($parcelle['emailUser']) . ')</p>';
        } else {
            echo '<p>Responsable: Inconnu</p>';
        }
    }
?>

<?php
    require_once('../footer.inc.php');
?>
