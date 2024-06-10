<?php
session_start();
?>
<nav class="grid grid-cols-6 lg:grid-cols-8 gap-x-5 mx-5">
    <div class=" flex gap-3 items-center col-start-1 col-end-4 justify-start">
        <img src="/assets/img/logo.png" alt="">
        <a href="/index.php">Accueil</a>
        <a href="/Jardin/jardinList.php">Jardins</a>
        <a href="/admin/admin.php">Admin</a>
    </div>
        <div class="flex gap-3 items-center col-start-4 col-end-9 justify-end">
        <?php if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['id'])): ?>
            <span>
                <?php echo htmlspecialchars($_SESSION['nom']) . ' ' . htmlspecialchars($_SESSION['prenom']); ?>
            </span>
            <a href="/User/deconnexion.php">Déconnexion</a>
            <a href="/User/profil.php">Profil</a>
        <?php else: ?>
            <a href="/User/userConnexion.php">Connexion</a>
        <?php endif; ?>
        </div>
        
    </div>
    
</nav>
