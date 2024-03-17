<?php
    require_once('model/Client.class.php');
    $mail=$_POST['email'];
    $mdp=$_POST['pswd'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $tel=$_POST['tel'];
    $nrue=$_POST['nrue'];
    $tv=$_POST['typevoie'];
    $nv=$_POST['nomvoie'];
    $cp=$_POST['cp'];
    $ville=$_POST['ville'];
    $pays=$_POST['pays'];

    Client::register($mail,$mdp,$nom,$prenom,$tel,$nrue,$tv,$nv,$cp,$ville,$pays);
    Client::login($mail,$mdp);
?>
<?php header('refresh:0;url=compte.php')?>
