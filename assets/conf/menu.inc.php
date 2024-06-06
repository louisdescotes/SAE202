<?php
session_start();
?>
<nav class="flex center w-full text-main">
    <div>
        <img src="/assets/img/logo.png" alt="">
    </div>
    <div class="flex justify-end items-center gap-4 w-full">
        <a href="/index.php">Accueil</a>
        <a href="/Jardin/jardinList.php">Jardins</a>
        <a href="/User/userConnexion.php">Connexion</a>
        <a href="/User/userInscription.php">Inscription</a>
        <a href="/admin.php">Admin</a>

        <?php if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['id'])): ?>
            <span>
                <?php echo htmlspecialchars($_SESSION['nom']) . ' ' . htmlspecialchars($_SESSION['prenom']); ?>
            </span>
            <a href="/User/deconnexion.php">Déconnexion</a>
            <a href="/User/profil.php">Profil</a>
        <?php endif; ?>
    </div>
    
</nav>
