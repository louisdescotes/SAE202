<?php
$idReservation = htmlspecialchars($_POST['ReservationId']);

require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/conf.inc.php';

$stmt2 = $db->prepare('DELETE FROM RESERVATION WHERE ReservationId = :idReservation');
$stmt2->bindParam(':idReservation', $idReservation, PDO::PARAM_INT);
$stmt2->execute();

header('Location: /admin/admin.php');

?>