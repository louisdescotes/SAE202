<?php
session_start();
?>
<nav>
    <a href="/sae202/index.php">Accueil</a>
    <a href="/sae202/Parcelle/parcelleList.php">Parcelle</a>
    <a href="/sae202/User/userConnexion.php">Connexion</a>
    <a href="/sae202/User/userInscription.php">Inscription</a>
    <a href="/sae202/admin.php">Admin</a>

    <?php if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['id'])): ?>
        <span>
            <?php echo htmlspecialchars($_SESSION['nom']) . ' ' . htmlspecialchars($_SESSION['prenom']); ?>
        </span>
        <a href="/sae202/User/deconnexion.php">Déconnexion</a>
        <a href="/sae202/User/profil.php">Profil</a>
    <?php endif; ?>
</nav>
