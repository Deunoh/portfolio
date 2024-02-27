<?php
if(!empty($_POST)){
   $errorList = [];
  
   $name = "";
   $firstname = "";
   $email = "";
   $message = "";
   // Je recupère les infos du formulaire
   if(isset($_POST['name']) && !empty($_POST['name'])){
      $name = htmlspecialchars($_POST['name']);
   }

   if(isset($_POST['firstname']) && !empty($_POST['firstname'])){
      $firstname = htmlspecialchars($_POST['firstname']);
   }

   if(isset($_POST['mail']) && !empty($_POST['mail'])){
      $email = htmlspecialchars($_POST['mail']);
          // Vérification de la validité de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errorList['email'][] = 'L\'adresse e-mail est invalide';
   }
   // Nettoyage de l'email pour des raisons de sécurité
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   } else {
    $errorList['email'][] = 'L\'adresse e-mail est obligatoire';
   }

   if(isset($_POST['message']) && !empty($_POST['message'])){
      $message = htmlspecialchars($_POST['message']);
   }

   //Verification des données et si besoin a jouter au tableau d'erreur 

   //Pour le nom
   if($name === false || $name === '') {
   $errorList['name'][] = 'Le nom est invalide et obligatoire';
   }

   if(strlen($name) < 2) {
      $errorList['name'][] = 'Le nom est trop court';
   }
  if(strlen($name) > 15) {
   $errorList['name'][] = 'Le nom est trop long';
   }

   //Pour le prénom

   if($firstname === false || $firstname === '') {
   $errorList['firstname'][] = 'Le prénom est invalide et obligatoire';
   }

   if(strlen($firstname) < 2) {
      $errorList['firstname'][] = 'Le prénom est trop court';
   }
   if(strlen($firstname) > 15) {
   $errorList['firstname'][] = 'Le prénom est trop long';
   }

   


   if(empty($errorList)){
            // Envoi de l'e-mail
   $to = "denovann@live.fr";
   $subject = "Nouveau message du formulaire de contact";
   $messageBody = "Nom: " . utf8_encode($name) . "\n";
   $messageBody .= "Prenom: $firstname\n";
   $messageBody .= "Email: $email\n";
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

   }

    
}; ?>





<?php 
//ENVOI DU MAIL

if(empty($errorList)){
   // Envoi de l'e-mail
   $to = "denovann@live.fr";
   $subject = "Nouveau message du formulaire de contact";
   $messageBody = "Nom: " . utf8_encode($name) . "\n";
   $messageBody .= "Prenom: $firstname\n";
   $messageBody .= "Email: $email\n";
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

   if($success){
       echo "Votre message a été envoyé avec succès.";
       header("Location: " . $_SERVER['PHP_SELF']);
       exit();
   } else {
       echo "Il y a eu une erreur lors de l'envoi de votre message.";
   }

}



?>

<?php
//FORMULAIRE EN COURS 
$errorList = [];
$textContent1 = 'Vous avez besoin d’obtenir d’autres informations ou de me rencontrer ?';
$textContent2 = ' Remplissez ce formulaire !';

if(!empty($_POST)){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Vérification des données et ajout au tableau d'erreurs
    if(!$name || strlen($name) < 2 || strlen($name) > 15) {
        $errorList['name'][] = 'Le nom est invalide';
    }

    if(!$firstname || strlen($firstname) < 2 || strlen($firstname) > 15) {
        $errorList['firstname'][] = 'Le prénom est invalide';
    }

    if(!$email) {
        $errorList['email'][] = 'E-mail invalide';
    }

    if(empty($email)){
      $errorList['email'][] = 'E-mail obligatoire';
    }

    if(!$message) {
        $errorList['message'][] = 'Le message n\est pas correct';
    }
    if(empty($message)) {
      $errorList['message'][] = 'Le message est obligatoire';
  }

    // Si aucune erreur n'est détectée, traiter le formulaire (envoi d'email, etc.)
    if(empty($errorList)) {
        $to = "denovann.belloir@oclock.school";
        $subject = "Nouveau message du formulaire de contact";
        $messageBody = "Nom: " . utf8_encode($name) . "\n";
        $messageBody .= "Prenom: $firstname\n";
        $messageBody .= "Email: $email\n";
        $messageBody .= "Message:\n$message";
        $headers = "Content-Type: text/plain; charset=utf-8";
        // Envoi du mail
        $success = mail($to, $subject, $messageBody, $headers);
        
         if($success){
            $textContent1 = "Votre message a été envoyé avec succès.";
            $textContent2 = "";
            
        } else {
            $textContent1 = "Il y a eu une erreur lors de l'envoi de votre message.";
            $textContent2 = "";
            $styleAlert = true;
        }

        if (filter_has_var(INPUT_POST, 'copy')) {
            $to = $email;
            $subject = "Votre message pour Denovann";
            $messageBody = "Voici le message que vous m'avez envoyé : " . $message;
            $headers = "From: denovann.belloir@oclock.school\r\n";
            $headers .= "Reply-To: denovann.belloir@oclock.school\r\n";
            $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

            $successExped = mail($to, $subject, $messageBody, $headers);
            
            if($successExped){
            $textContent1 = "Votre message a été envoyé avec succès. Pensez à regarder vos spams";
            $textContent2 = "";
            
            } else {
                $textContent1 = "Il y a eu une erreur lors de l'envoi de votre message de copie.";
                $textContent2 = "";
                $styleAlert = true;
            }
        }
    }
}

function showErrors($fieldName, $errorList = null) {
    $errors = '';
    if(isset($errorList) && !empty($errorList[$fieldName])) {
        $errors .= implode(' ', $errorList[$fieldName]);
    }
    return $errors;
}


?>
