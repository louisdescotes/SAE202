<?php
$idUser = $_GET['idUser'];
$idJardin = $_GET['idJardin'];

require_once('../assets/conf/conf.inc.php');

if (!empty($idUser) && !empty($idJardin)) {
    try {
        $reqSelectParcelle = $db->prepare('SELECT idParcelle 
                                           FROM PARCELLE 
                                           WHERE jardinId = :idJardin 
                                           AND occupantId IS NULL 
                                           LIMIT 1');
        $reqSelectParcelle->bindParam(':idJardin', $idJardin, PDO::PARAM_INT);
        $reqSelectParcelle->execute();
        $row = $reqSelectParcelle->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            $idParcelle = $row['idParcelle'];
            
            $reqUpdateParcelle = $db->prepare('UPDATE PARCELLE 
                                               SET occupantId = :idUser 
                                               WHERE idParcelle = :idParcelle');
            $reqUpdateParcelle->bindParam(':idUser', $idUser, PDO::PARAM_INT);
            $reqUpdateParcelle->bindParam(':idParcelle', $idParcelle, PDO::PARAM_INT);
            $reqUpdateParcelle->execute();
            
            header('Location: /Jardin/jardinList.php');
            exit();
        } else {
            echo 'Aucune parcelle disponible dans ce jardin.';
        }
    } catch (PDOException $e) {
        echo 'Erreur PDO : ' . $e->getMessage();
    }
} else {
    echo 'Erreur, les paramètres idUser ou idJardin sont manquants.';
}
?>
