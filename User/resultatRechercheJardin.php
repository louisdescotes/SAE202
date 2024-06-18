<?php
require_once('../assets/conf/head.inc.php');
require_once('../admin/conf.inc.php');
require_once('../assets/conf/header.inc.php');
?>

<body>
    <div class="form-jardin">
        <form class="recherche-jardin" action="/User/resultatRechercheJardin.php" method="post">
            <input type="text" name="texte" placeholder="Que recherchez-vous ?">
            <button type="submit"><span class="material-symbols-outlined">search</span></button>
        </form>
    </div>

    <div class="flex w-full items-center h-content justify-end -mx-5 gap-2">
        <input type="checkbox" name="show" id="show">
        <label for="show">Afficher les jardins non disponibles</label>
    </div>
    <h2 class="jardin-h2 bambino">Jardins</h2>
    <div class="jardins">
    <?php
    try {
        if (isset($_POST['texte']) && !empty($_POST['texte'])) {
            $nom = htmlspecialchars($_POST['texte']);
            
            $req = $db->prepare('SELECT JARDIN.idJardin, JARDIN.ownerId, JARDIN.name AS jardinName, JARDIN.ville, JARDIN.CP, JARDIN.adresse, JARDIN.taille, JARDIN.max, JARDIN.img, 
                                        USER.name AS userName, USER.forname AS userForname, USER.email AS userEmail, 
                                        COUNT(PARCELLE.occupantId) AS countParcelles, PARCELLE.occupantId
                                        FROM JARDIN 
                                        INNER JOIN USER 
                                        ON JARDIN.ownerId = USER.idUser
                                        LEFT JOIN PARCELLE
                                        ON PARCELLE.jardinId = JARDIN.idJardin
                                        WHERE JARDIN.name LIKE :Jnom
                                        GROUP BY JARDIN.idJardin');

            $searchTerm = '%' . $nom . '%';
            $req->bindParam(':Jnom', $searchTerm, PDO::PARAM_STR);
            $req->execute();
            $jardins = $req->fetchAll();

            foreach ($jardins as $jardin) {
                echo '<div class="parcelle parcelle-container">';
                echo '<img src="/assets/Uploads/' . htmlspecialchars($jardin['img']) . '" alt="Image de ' . htmlspecialchars($jardin['jardinName']) . '">';
                echo '<div class="parcelle-infos">';
                echo '<div class="parcelle-infos-1">';
                if (!empty($jardin['userName']) && !empty($jardin['userForname']) && !empty($jardin['userEmail'])) {
                    echo '<p>' . htmlspecialchars($jardin['userName']) . ' ' . htmlspecialchars($jardin['userForname']) . ' - ' . htmlspecialchars($jardin['userEmail']) . '</p>';
                } else {
                    echo '<p>Responsable: Inconnu</p>';
                }
                echo '<p>' . htmlspecialchars($jardin['ville']) . ' - ' . htmlspecialchars($jardin['CP']) . ' - ' . htmlspecialchars($jardin['adresse']) . '</p>';
                echo '</div>';
                echo '<div class="parcelle-infos-2">';
                echo '<h2 class="satoshi-bold">' . htmlspecialchars($jardin['jardinName']) . '</h2>';
                echo '<p>' . htmlspecialchars($jardin['taille']) . 'm²</p>';
                echo '<p>Parcelles occupées : ' . htmlspecialchars($jardin['countParcelles']) . '/' . htmlspecialchars($jardin['max']) . '</p>';
                echo '</div>';
                echo '<div class="parcelle-infos-3">';
                if (!empty($_SESSION['id'])) {
                    if ($jardin['countParcelles'] < $jardin['max'] && $jardin['ownerId'] != $_SESSION['id'] && $jardin['occupantId'] != $_SESSION['id']) {
                        echo '<a class="button-primary" href="rejoindreJardin.php?idJardin=' . htmlspecialchars($jardin['idJardin']) . '&idUser=' . htmlspecialchars($_SESSION['id']) . '">Rejoindre</a>';
                    } else {
                        echo '<span class="parcelle-full">Parcelles pleines</span>';
                    }
                } else {
                    echo '<span>Connectez-vous pour rejoindre une parcelle</span>';
                }
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    } catch (PDOException $e) {
        echo 'Erreur lors de la récupération des jardins: ' . $e->getMessage();
    }
    ?>
    </div>

    <script src="/assets/js/jardin.js"></script>
</body>
