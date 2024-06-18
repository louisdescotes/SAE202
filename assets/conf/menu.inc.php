<?php
session_start();
?>

<nav class="nav-1">
    <img class="wow bounceIn" src="/assets/img/logo.png" alt="logo1">
    <input type="checkbox" id="overlay-input" />
    <label for="overlay-input" id="overlay-button"><span></span></label>
    <div id="overlay">
        <img src="/assets/img/logo3.png" alt="logo3">
        <ul>
            <li><a class="bambino" href="/index.php">Accueil</a></li>
            <hr>
            <li><a class="bambino" href="/Jardin/jardinList.php">Jardins</a></li>
            <hr>
            <li><a class="bambino" href="/Recette/recetteList.php">Recettes</a></li>
            <hr>
            <li><a class="bambino" href="/Plante/planteList.php">Plantes</a></li>
            <hr>
            
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true): ?>
                <li><a href="/admin/admin.php">Admin</a></li>
                <hr>
            <?php endif; ?>
            <li><a class="bambino" href="/User/contact.php">Contact</a></li>
            <hr>
            <?php if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['id'])): ?>
                        <span><?php echo htmlspecialchars($_SESSION['nom']) . ' ' . htmlspecialchars($_SESSION['prenom']); ?></span>
                        <li><a class="bambino" href="/User/deconnexion.php">Déconnexion</a></li>
                        <li><a class="bambino" href="/User/profil.php">Profil</a></li>
                    <?php else: ?>
                        <li><a class="bambino" href="/User/userConnexion.php">Connexion</a></li>
                    <?php endif; ?>
        </ul>
    </div>
</nav>

<nav class="nav-2">
    <ul>
        <div class="nav-2-1">
            <li><a class="bambino" href="/index.php">Accueil</a></li>
            <li><a class="bambino" href="/Jardin/jardinList.php">Jardins</a></li>
            <li><a class="bambino" href="/Recette/recetteList.php">Recettes</a></li>
            <li><a class="bambino" href="/Plante/planteList.php">Plantes</a></li>
            <li><a class="bambino" href="/User/contact.php">Contact</a></li>
            <?php if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['id'])): ?>
                        <span><?php echo htmlspecialchars($_SESSION['nom']) . ' ' . htmlspecialchars($_SESSION['prenom']); ?></span>
                        <li><a class="bambino" href="/User/deconnexion.php">Déconnexion</a></li>
                        <li><a class="bambino" href="/User/profil.php">Profil</a></li>
                    <?php else: ?>
                        <li><a class="bambino" href="/User/userConnexion.php">Connexion</a></li>
                    <?php endif; ?>
        </div>
        <div class="nav-2-2">
            <img class="wow bounceIn" src="/assets/img/logo.png" alt="logo1">
        </div>
        <div class="nav-2-3">
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true): ?>
                <li><a href="/admin/admin.php">Admin</a></li>
            <?php endif; ?>
            <div class="flex gap-3 items-end col-start-5 col-end-9 justify-end">
                <div class="desktop_menu">
                   
                </div>
            </div>
        </div>
    </ul>
</nav>
