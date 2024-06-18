<body class="contact">

<?php 
    require_once('../assets/conf/head.inc.php');
    require_once('../admin/conf.inc.php');
    require_once('../assets/conf/header.inc.php');
    ?>

    <div class="margin">

    <div id="h1contact">
        <h1 class="h1contact">CONTACT</h1>
    </div>

    <div class="flexcon">
        
        <div class="form-con">

    <form class="formulaire" action="/Traitements/envoi_mail.php" method="post">

        <div id="en-tete-con">

                    <div id="nom">
                        <label class="text-main satoshi-medium text-sm" for="prenom">Prenom</label>
                        <input class="input-con" type="text" name="prenom" id="prenom" placeholder="Votre Prénom" required>
                    </div>
                    
                    <div id="nom2">
                    <label class="text-main satoshi-medium text-sm" for="nom">Nom</label>
                        <input class="input-con" type="text" name="nom" id="nom" placeholder="Votre Nom "required>
                    </div>
        </div>
        <label class="text-main satoshi-medium text-sm" for="email">Email</label>
                    <input class="input-mail" type="text" name="email" id="email" placeholder="Votre Email" required>

    <div id="buttoncontact">

                <div id="button-con">
                    <input class="button-con" type="radio" id="devis" name="fav_language" value="Problème de parcelles">
                    <label class="ecriture" for="devis">Problème de parcelles</label>
                </div>
                <div id="button-con">
                    <input class="button-con" type="radio" id="information" name="fav_language" value="Renseignement">
                    <label class="ecriture" for="information">Renseignements</label>
                </div>

                <div id="button-con">
                    <input class="button-con" type="radio" id="reclamation" name="fav_language" value="Bug">
                    <label class="ecrituree" for="bug">Bug sur le site</label>
                </div>
    </div>
    <label class="text-main satoshi-medium text-sm" for="message">Message</label>

                    <textarea name="message" id="message" placeholder="Votre Message" required>
                    </textarea>
    <div id="send">
    <input class="send cursor-pointer" type="submit" value="Envoyer">
    </div>

    </div>

    <div class="motif">
        <img src="../assets/img/motif.png" alt="motif de plante" class="motif-con">
    </div>

</form>

</div>

</div>
<div>
<?php
    if(isset($_SESSION['information'])) {
        echo '<p>' . $_SESSION['information'] . '</p>';
        unset($_SESSION['information']);
    }
    ?>
</div>


<?php 
    require_once('../assets/conf/footer.inc.php');
    ?>
            <script src="/assets/js/popupDelete.js"></script>

    </body>