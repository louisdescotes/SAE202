
<?php 
    require_once('../assets/conf/head.inc.php');
    require_once('../assets/conf/conf.inc.php');
    require_once('../assets/conf/header.inc.php');
    ?>

<form class="formulaire" action="/Traitements/envoi_mail.php" method="post">
    <div id="en-tete">
    
    <div>
        <label class="ecriture" for="prenom"><span></span></label>
        <input type="text" name="prenom" id="prenom" placeholder="Votre Prénom" required>
    </div>
    
    <div>
        <label class="ecriture" for="nom"><span></span></label>
        <input type="text" name="nom" id="nom" placeholder="Votre Nom "required>
    </div>
    </div>

    <label class="ecriture" for="email"><span></span></label>
    <input type="text" name="email" id="email" placeholder="Votre Email" required>

    <div id="buttoncontact">

    <label for="radio_choice">Préciser votre demande <span>*</span></label>
                <div class="radio_button">
                    <input required type="radio" id="information" name="radio" value="information">
                    <label for="information"> Information</label>
                </div>
                <div class="radio_button">
                    <input required type="radio" id="devis" name="radio" value="devis">
                    <label for="devis"> Demande de devis</label>
                </div>
                <div class="radio_button">
                    <input required type="radio" id="reclamation" name="radio" value="reclamation">
                    <label for="reclamation"> Réclamation</label>
                </div>

    </div>

    <label class="ecriture" for="message"><span></span></label>
    <textarea name="message" id="message" placeholder="Votre Message" required>
    </textarea>
    <input class="send" type="submit" value="Envoyer">
</form>

<?php 
    require_once('../assets/conf/footer.inc.php');
    ?>