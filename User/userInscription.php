<?php
require_once('../header.inc.php');
?>

<p>Formulaire d'inscription</p>
<form action="/sae202/admin/User/validationInscriptionUser.php" method="post">
    <input type="text" name="name" placeholder="nom">
    <input type="text" name="forname" placeholder="prenom">
    <input type="text" name="email" placeholder="email">
    <input type="password" name="password" placeholder="mot de passe">

    <input type="submit" value="inscription">
</form>

<?php
require_once('../footer.inc.php');
?>