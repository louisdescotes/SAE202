<?php
try {
    $db= new PDO('mysql:host=localhost;dbname=mmi23b06;charset=UTF8;', 'mmi23b06', 'Password01$');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e) {
    echo 'Erreur de connexion:' . $e->getMessage();
}
?>