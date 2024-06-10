<?php
$idReservation = htmlspecialchars($_POST['ReservationId']);
$nom = htmlspecialchars($_POST['nameJardin']);
$ville = htmlspecialchars($_POST['villeJardin']);
$CP = htmlspecialchars($_POST['CPJardin']);
$adresse = htmlspecialchars($_POST['adresseJardin']);
$taille = htmlspecialchars($_POST['tailleJardin']);
$max = htmlspecialchars($_POST['maxJardin']);
$img = htmlspecialchars($_POST['imgJardin']);
$_idUser = htmlspecialchars($_POST['_idUser']);


require_once('../../assets/conf/conf.inc.php');

$sql = 'INSERT INTO JARDIN (name, ville, CP, adresse, taille, max, img, ownerId) 
VALUES ("'.$nom.'", "'.$ville.'", "'.$CP.'", "'.$adresse.'", '.$taille.', '.$max.', "'.$img.'", "'.$_idUser.'")';

$stmt = $db->query($sql);

$stmt2 = $db->prepare('DELETE FROM RESERVATION WHERE ReservationId = :idReservation');
$stmt2->bindParam(':idReservation', $idReservation, PDO::PARAM_INT);
$stmt2->execute();

header('Location: /admin/admin.php');

?>