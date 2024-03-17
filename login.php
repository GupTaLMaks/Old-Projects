<?php
    require_once('model/Client.class.php');
    $mail=$_POST['email'];
    $mdp=$_POST['pswd'];
    Client::login($mail,$mdp);
?>
<?php header('refresh:0;url=compte.php')?>
