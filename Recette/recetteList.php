<?php
require_once('../assets/conf/head.inc.php');
require_once('../admin/conf.inc.php');
require_once('../assets/conf/header.inc.php');
?>

<body>


    <?php
        $req = $db->prepare('SELECT RECETTE.name AS recetteName, RECETTE.description, RECETTE.img, 
        USER.name AS userName, USER.forname AS userForname, 
        GROUP_CONCAT(PLANTE.name SEPARATOR "|") AS plantes
        FROM RECETTE
        INNER JOIN RECETTE_PLANTE ON RECETTE.idRecette = RECETTE_PLANTE.idRecette
        INNER JOIN PLANTE ON RECETTE_PLANTE.idPlante = PLANTE.idPlante
        INNER JOIN USER ON RECETTE.creatorId = USER.idUser
        GROUP BY RECETTE.idRecette');
        $req->execute();
        $recettes = $req->fetchAll();
    ?>
    <section>

    <?php
    if (!empty($_SESSION['id'])) {
        echo '<a class="relative top-0 my-5 mx-5 button-primary" href="/Recette/proposerRecette.php">Proposer une recette</a>';
    }
    ?>

    <div class="form-recette">
        <h2 class="bambino">Recettes</h2>
        <form class="recherche-recette" action="/User/resultatRechercheRecette.php" method="post">
            <input type="text" name="texte" placeholder="Que recherchez-vous ?">
            <button type="submit"><span class="material-symbols-outlined">search</span></button>
        </form>
    </div>
    
    <div class="mx-6 my-10 grid grid-cols-1 sm:grid-cols-4 grid-rows-auto grid-row-gap gap-16 mb-24 relative h-full">
        <?php
        foreach ($recettes as $recette) {
            echo '<div class="parcelle h-full parcelle-container">'; 
                echo '<div class="w-full h-[40%]">';
                    echo '<img class="object-cover w-full h-full" src="/assets/Uploads/' . htmlspecialchars($recette['img']) . '" alt="' . htmlspecialchars($recette['recetteName']) . '">';
                echo '</div>';
                echo '<div class="parcelle-infos">';
                    echo '<div class="parcelle-infos-1>';
                        echo '<h2 class="satoshi-bold text-2xl">' . htmlspecialchars($recette['recetteName']) . '</h2>';
                        echo '<h3 class="text-xl">' . htmlspecialchars($recette['userName']) . ' ' . htmlspecialchars($recette['userForname']) . '</h3>';
                    echo '</div>';
                    echo '<div class="parcelle-infos-2">';
                        echo '<h4 class="satoshi-medium text-xl">Plantes</h4>';
                        $plantes = explode('|', $recette['plantes']);
                        foreach ($plantes as $plante) {
                            echo '<h5 class="flex flex-col text-s w-full">' . htmlspecialchars($plante) . '</h5>';
                        }
                    echo '</div>';
                    echo '<div class="parcelle-infos-3">';
                        echo '<p>' . htmlspecialchars($recette['description']) . '</p>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
    </section>
    <?php
    if (isset($_SESSION['information'])) {
        echo '<p>' . $_SESSION['information'] . '</p>';
        unset($_SESSION['information']);
    }
    ?>

    <?php
    // require_once('../assets/conf/footer.inc.php');
    ?>

    <script src="/assets/js/recette.js"></script>
    <script src="/assets/js/popupDelete.js"></script>

</body>
