<?php session_start();?><!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/proposition.css"/>
<link rel="stylesheet" type="text/css" href="css/base.css"/>
<link rel="stylesheet" type="text/css" href="css/recherche.css"/>
<title>Tote World</title>
</head>
<body>
    <?php include_once('header.inc');
    if (!isset($_SESSION['numclient']) || $_SESSION['numclient']=="") {echo "<script type='text/javascript'>document.location.replace('connexion.php');</script>";}
    ?>

    <section class="avous">
        <h3 id="titre" style="text-transform: uppercase;">à vous de jouer</h3>
        <p class="texte">Vous aimez dessiner, vous souhaitez voir vos dessins sur un tote bag. Envoyez-les-nous. Notre équipe se fera un plaisir d’étudier votre proposition.</p>
    </section>

    <section class="image">
        <img src="images/imgs/img7.jpg" style="width: 100%;clip-path: inset(45% 0 20% 0);transform: translate(0, -45%);"/>
    </section>

    <section class="formulaire">
        <form action="inscription.php" method="POST">
            <div class="nom">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" placeholder="Dupont" required>
            </div>
            <div class="prenom"> 
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" placeholder="Thibaut" required>
            </div>
            <div class="pseudo">
                <label for="pseudo">Pseudo :</label>
                <input type="text" id="pseudo" name="pseudo" placeholder="Hoppy" required>
            </div>
            <div class="email">
                <label for="mail">Email :</label>
                <input type="email" id="mail" name="mail" placeholder="thibaut@dupont.fr" required>
            </div>
            <div class="fichier">
                <label for="fichier">Déposer votre design ici :</label>
                <input type="file" id="fichier" name="avatar" accept="image/png, image/jpeg, .zip" required>
            </div>
            <div class="bouton">
                <button id="bouton" type="submit">J'envoie mon design</button>
            </div>

        </form>
    </section>

    <?php include_once('footer.inc') ?>

</body>
</html>