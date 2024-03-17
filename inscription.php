<?php session_start();?><!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/proposition.css"/>
<link rel="stylesheet" type="text/css" href="css/base.css"/>
<link rel="stylesheet" type="text/css" href="css/recherche.css"/>
<title>Tote World</title>
</head>
<body>
    <?php include_once('header.inc') ?>

    <section class="newclient">
        <h3 id="titre">INSCRIPTION</h3>
    </section>

    <section class="formulaire">
        <form action="register.php" method="POST">
            <div class="email">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="password">
                <label for="pswd">Mot de passe :</label>
                <input type="password" id="pswd" name="pswd" required>
            </div>
            <div class="nom">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="prenom"> 
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="tel">
                <label for="tel">N° de téléphone :</label>
                <input type="text" id="tel" name="tel" required>
            </div>
            <div class="nrue">
                <label for="nrue">N° de voie :</label>
                <input type="text" id="nrue" name="nrue">
            </div>
            <div class="typevoie">
                <label for="typevoie">Type de voie :</label>
                <input type="text" id="typevoie" name="typevoie">
            </div>
            <div class="nomvoie">
                <label for="nomvoie">Nom de voie :</label>
                <input type="text" id="nomvoie" name="nomvoie">
            </div>            
            <div class="cp">
                <label for="cp">Code postal :</label>
                <input type="text" id="cp" name="cp" required>
            </div>
            <div class="ville">
                <label for="ville">Ville :</label>
                <input type="text" id="ville" name="ville" required>
            </div>
            <div class="pays">
                <label for="pays">Pays :</label>
                <input type="text" id="pays" name="pays" required>
            </div>
            
            <div class="bouton">
                <button id="bouton" type="submit">Je m'incris</button>
            </div>

        </form>
    </section>

    <?php include_once('footer.inc') ?>

</body>
</html>