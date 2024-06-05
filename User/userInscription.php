<?php
require_once('../header.inc.php');
?>

<p>Formulaire d'inscription</p>
<form action="/sae202/admin/User/validationInscriptionUser.php" method="post">
    <input type="text" name="nomUser" placeholder="nom">
    <input type="text" name="prenomUser" placeholder="prenom">
    <input type="text" name="emailUser" placeholder="email">
    <input type="password" name="mdpUser" placeholder="mot de passe">
    <input type="file" name="photoUser" placeholder="image de profil">

    <input type="submit" value="inscription">
</form>

<?php
require_once('../footer.inc.php');
?>