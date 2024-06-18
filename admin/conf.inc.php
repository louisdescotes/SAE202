<?php
try {
    $db= new PDO('mysql:host=localhost;dbname=sae202Base;charset=UTF8;', 'sae202User', 'Password01$');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e) {
    echo 'Erreur de connexion:' . $e->getMessage();
}
?>