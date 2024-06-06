<?php
$superficie = filter_input(INPUT_POST, 'superficie', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$jardinId = filter_input(INPUT_POST, 'jardinId', FILTER_SANITIZE_NUMBER_INT);
$occupantId = filter_input(INPUT_POST, 'occupantId', FILTER_SANITIZE_NUMBER_INT);

if (!empty($superficie) && !empty($jardinId) && !empty($occupantId)) {
    try {
        $db = new PDO('mysql:host=localhost;dbname=sae202Base;charset=UTF8;', 'phpmyadmin', 'PASSWORD');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $req = $db->prepare('INSERT INTO PARCELLE (superficie, jardinId, occupantId) VALUES (:superficie, :jardinId, :occupantId)');
        $req->bindParam(':superficie', $superficie, PDO::PARAM_STR);
        $req->bindParam(':jardinId', $jardinId, PDO::PARAM_INT);
        $req->bindParam(':occupantId', $occupantId, PDO::PARAM_INT);
        $req->execute();

        header('Location: /sae202/admin.php');
        exit(); 
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
} else {
    echo 'Veuillez remplir tous les champs';
}
?>
