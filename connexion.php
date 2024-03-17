<!DOCTYPE html>
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
        <h3 id="titre">CONNEXION</h3>
    </section>

    <section class="formulaire">
        <form action="login.php" method="POST">
            <div class="email">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="password">
                <label for="pswd">Mot de passe :</label>
                <input type="password" id="pswd" name="pswd" required>
            </div>
            
            <div class="bouton">
                <button id="bouton" type="submit">Je me connecte</button>
            </div>

        </form>
        <a id="ins" href="inscription.php">Pas de compte ? Incrivez-vous</a>
    </section>

    <?php include_once('footer.inc') ?>

</body>
</html>