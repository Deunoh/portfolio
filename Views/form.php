<?php
if(!empty($_POST)){
    $name = "";
    $email = "";
    $entreprise = "";
    $message = "";
    // Je recupère les infos du formulaire
    if(isset($_POST['name']) && !empty($_POST['name'])){
       $name = htmlspecialchars($_POST['name']);
    }
    if(isset($_POST['mail']) && !empty($_POST['mail'])){
        $email = htmlspecialchars($_POST['mail']);
     }
     if(isset($_POST['entreprise']) && !empty($_POST['entreprise'])){
        $entreprise = htmlspecialchars($_POST['entreprise']);
     }
     if(isset($_POST['message']) && !empty($_POST['message'])){
        $message = htmlspecialchars($_POST['message']);
     }
     
    

  
        // Envoi de l'e-mail
    $to = "denovann@live.fr";
    $subject = "Nouveau message du formulaire de contact";
    $messageBody = "Nom: " . utf8_encode($name) . "\n";
    $messageBody .= "Email: $email\n";
    $messageBody .= "Entreprise: $entreprise\n";
    $messageBody .= "Message:\n$message";
    $headers = "Content-Type: text/plain; charset=utf-8";
    // Envoi du mail
    $success = mail($to, $subject, $messageBody, $headers);

    if (filter_has_var(INPUT_POST, 'copy')) {
        $to = $email;
        $subject = "Votre message pour Denovann";
        $messageBody = "Voici le message que vous m'avez envoyé : " . $message;
        $headers = "From: denovann@live.fr\r\n";
        $headers .= "Reply-To: denovann@live.fr\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

       $successExped = mail($to, $subject, $messageBody, $headers);
      }

    // Affichage d'un message de confirmation
     
    
};