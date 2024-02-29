<?php
//FORMULAIRE EN COURS 
$errorList = [];
$textContent1 = 'Vous avez besoin d’obtenir d’autres informations ou de me rencontrer ?';
$textContent2 = ' Remplissez ce formulaire !';

if(!empty($_POST)){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

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
        $to = "denovann@live.fr";
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
            $styleValidate = true;
            
        } else {
            $textContent1 = "Il y a eu une erreur lors de l'envoi de votre message.";
            $textContent2 = "";
            $styleAlert = true;
        }

        if (filter_has_var(INPUT_POST, 'copy')) {
            $to = $email;
            $subject = "Votre message pour Denovann";
            $messageBody = "Voici le message que vous m'avez envoyé : " . $message;
            $headers = "From: denovann@live.fr\r\n";
            $headers .= "Reply-To: denovann@live.fr\r\n";
            $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

            $successExped = mail($to, $subject, $messageBody, $headers);
            
            if($successExped){
            $textContent1 = "Votre message a été envoyé avec succès. Pensez à regarder vos spams";
            $textContent2 = "";
            $styleValidate = true;
            
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

//TODO <?= $_POST['title'] ?? $pokemon->getTitle() EN VALUE 
?>


<div class="card-box" id="quatre">
                <div class="card four">
                    <div class="label-fixed">
                        <h3>Contact</h3>
                    </div>
                    <section class="mid-section">
                        <p class="contact-text  <?php if (isset($styleAlert) && $styleAlert === true) {echo "red_text";} elseif (isset($styleValidate) && $styleValidate === true) {echo "green_text";} else {echo '';} ?>"><?= $textContent1 ?></p>
                        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 

    <dotlottie-player src="https://lottie.host/1543f523-0bf1-4b91-b03b-7b5f5ebf7e95/CwMZf45UQa.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
                       <p class="contact-text"><?= $textContent2 ?></p>
                    </section>

                    <section class="formulaire-section">
                        <div class="formulaire-box">
                            <form method="post">
                              <span class="champs_obligatoires"><span class="yellow_star">*</span> champs obligatoires</span>
                                    <div class="inputbox <?= (isset($errorList['name'])) ? 'invalid' : ''; ?>">
                                    <input type="text" name="name" <?php if (!empty($errorList)) { echo 'placeholder="' . showErrors('name', $errorList) . '"';} ?> required>
                                        <label for="nom">Nom<span class="yellow_star">*</span></label>
                                    </div>
                                    <div class="inputbox <?= (isset($errorList['firstname'])) ? 'invalid' : ''; ?>">
                                        <input type="text" name="firstname" <?php if (!empty($errorList)) { echo 'placeholder="' . showErrors('firstname', $errorList) . '"';} ?> required>
                                        <label for="firstname">Prénom<span class="yellow_star">*</span></label>
                                    </div>
                                    <div class="inputbox <?= (isset($errorList['email'])) ? 'invalid' : ''; ?>">
                                        <input type="text" name="mail" <?php if (!empty($errorList)) { echo 'placeholder="' . showErrors('email', $errorList) . '"';} ?> required>
                                        <label for="mail">Email<span class="yellow_star">*</span></label>
                                    </div>
                                    <div class="inputbox <?= (isset($errorList['message'])) ? 'invalid' : ''; ?>">
                                        <textarea name="message" id="message" required></textarea>
                                        <label for="message">Votre message<span class="yellow_star">*</span></label>
                                    </div>
                                    <div class="btn-check-form">
                                        <input  type="checkbox" value="" id="copy" name="copy">
                                        <label  for="copy">
                                        Recevoir une copie du message
                                        </label>
                                    </div>
                                    <button type="submit" id="submit" name="submit">Envoyer</button> 


                            </form>
                        </div>
                    </section>
                </div>
            </div>


        
          
