<?php header('refresh:2;url=contact.php')?>
<?php
    $message= "Nom : ".$_POST['nom']." Prenom : ".$_POST['prenom']."\r\nMessage : ".$_POST['subject'];
    $retour = mail('toteworld.off@gmail.com', 'Envoi depuis la page Contact', $message, 'From: '.$_POST['mail']);
    if ($retour)
        echo '<p>Votre message a bien été envoyé.</p>';
    ?>