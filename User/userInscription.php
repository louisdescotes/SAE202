<?php
require_once('../assets/conf/head.inc.php');
require_once('../admin/conf.inc.php');
require_once('../assets/conf/header.inc.php');
?>

<section class="flex flex-col items-center justify-between h-[90%] gap-2">
    <aside class="flex flex-col items-center sm:items-start text-center sm:text-start h-full gap-4">
    <form action="/User/validationInscription.php" method="post" class="h-[90%] w-full flex-col flex mx-5 sm:justify-center">
    <h2 class="text-2xl text-main bambino">Bonjour !</h2>
    <div class="flex flex-col w-full">
        <label class="text-main satoshi-medium text-s" for="name">Nom</label>
        <input class="input" type="text" name="name" placeholder="nom">
    </div>
    <div class="flex flex-col w-full">
        <label class="text-main satoshi-medium text-s" for="prenom">Prénom</label>
        <input class="input" type="text" name="forname" placeholder="prenom">
    </div>
    <div class="flex flex-col w-full">
        <label class="text-main satoshi-medium text-s" for="email">email</label>
        <input class="input" type="text" name="email" placeholder="email">
    </div>
    <div class="flex flex-col w-full">
        <label class="text-main satoshi-medium text-s" for="password">Mot de passe</label>
        <input type="password" name="password" placeholder="mot de passe">
    </div>
    <input class="button-primary mt-4" type="submit" value="S'inscrire">

    </form>
</aside>
<aside class="flex justify-end w-full">
<div class="flex justify-center sm:justify-end mx-2">
        <img class="w-[40%]" src="/assets/img/panier.png" alt="dessin de panier">
    </div>
</aside>
    </section>
    


    