<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/contact.css"/>
<link rel="stylesheet" type="text/css" href="css/base.css"/>
<link rel="stylesheet" type="text/css" href="css/recherche.css"/>
<script src="//cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="//cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>

    <title>Tote World</title>
</head>
<body>
  <?php include_once('header.inc') ?>

    <section class="titre">
        <h2>Vous souhaitez nous contacter ?</h2>
    </section>

    <section class="contacter">
        <form action="mail.php" method="POST">
            <div id="nom">
                <label for="nom">Votre nom :</label>
                <input type="text" name="nom" placeholder="Dupont" required>
            </div>
            <div class="prenom"> 
                <label for="prenom">Votre prénom:</label>
                <input type="text" id="prenom" name="prenom" placeholder="Thibaut" required>
            </div>
            <div class="email">
                <label for="mail">Votre email :</label>
                <input type="email" id="mail" name="mail" placeholder="thibaut@dupont.fr" required>
            </div>

            <textarea id="message" name="subject" placeholder="Votre message" style="height:200px" required></textarea>

            <div id="bouton"><input type="submit" value="Envoyer"></div>    

        </form>


    </section>

  <?php include_once('footer.inc') ?>
  



</body>
</html>