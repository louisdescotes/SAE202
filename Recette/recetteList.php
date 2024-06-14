<body>
    <?php
    require_once('../assets/conf/head.inc.php');
    require_once('../admin/conf.inc.php');
    require_once('../assets/conf/header.inc.php');
    // require_once('../assets/conf/grid.inc.php');

    if (!empty($_SESSION['id'])) {
        echo '<a class="relative top-5 my-5 mx-5 button-primary" href="/Recette/proposerRecette.php">Proposer une recette</a>';
    }
    ?>
    <section class=" grid grid-cols-2 my-10 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-5 mx-5">
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

        <form class="col-start-1 col-end-8 " action="/User/resultatRechercheRecette.php" method="post">
        <input type="text" name="texte" placeholder="Nom de la recette">
        <button type="submit" >Rechercher</button>

        <div class="satoshi-regular h-min grid grid-cols-2 my-10 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-5 mx-5">
            <div class=" grid grid-cols-9 gap-5 col-start-1 col-end-9 row-start-1 border-main border-b-2">
                <span class="col-start-1 col-end-5 bambino text-xl">Titre</span>
                <span class="col-start-5 col-end-8 bambino text-xl">Créateur</span>

            </div>
        <?php
        foreach ($recettes as $recette) {
            echo '<div class="open_menu relative border-main border-b grid grid-cols-9 gap-5 row-span-2 col-start-1 col-end-9 pb-4">';
            echo '<span class="col-start-1 col-end-5">' . htmlspecialchars($recette['recetteName']) . '</span>';
            echo '<span class="col-start-5 col-end-8">' . htmlspecialchars($recette['userName']) . ' ' . htmlspecialchars($recette['userForname']) . '</span>';
            echo '<span class="cross_menu col-start-9 col-end-10 text-end">+</span>';

            echo '<div class="recette_menu active col-start-1 col-end-9 grid grid-cols-9 gap-5">';
            echo '<img class="object-cover h-full w-full col-start-1 col-end-3 row-span-8" src="/assets/Uploads/' . $recette['img'] . '" alt="' . htmlspecialchars($recette['recetteName']) . '">';
            echo '<span class="col-start-3 col-end-7">' . htmlspecialchars($recette['description']) . '</span>';
            echo '<div class="col-start-8 col-end-10 flex flex-col">';
            echo '<span class="satoshi-bold">Plantes</span>';
            $plantes = explode('|', $recette['plantes']);
            foreach ($plantes as $plante) {
                echo '<span class="w-full">' . htmlspecialchars($plante) . '</span>';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
        </div>
        <div>
    <?php
    if(isset($_SESSION['information'])) {
        echo '<p>' . $_SESSION['information'] . '</p>';
        unset($_SESSION['information']);
    }
    ?>
</div>

        </section>
        <?php
        require_once('../assets/conf/footer.inc.php');
        ?>

        <script src="/assets/js/recette.js"></script>
        <script src="/assets/js/popupDelete.js"></script>

</body>