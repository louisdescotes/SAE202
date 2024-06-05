<a href="/sae202/index.php">Accueil</a>
<a href="/sae202/User/userConnexion.php">Connexion</a>
<a href="/sae202/User/userInscription.php">Inscription</a>
<a href="/sae202/admin.php">Admin</a>

<?php
session_start();
if(isset($_SESSION['nom']) && isset($_SESSION['prenom']))
{
    ?><span><?php echo $_SESSION['nom'].' '.$_SESSION['prenom']?></span>
    <a href="/sae202/User/deconnexion.php">Déconnexion</a><?php
}
?>
