<?php
$errorList = [];
$textContent1 = 'Vous avez besoin d’obtenir d’autres informations ou de me rencontrer ?';
$textContent2 = ' Remplissez ce formulaire !';
if(!empty($_POST)){
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $firstname = isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '';
    $email = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    // Vérification des données et ajout au tableau d'erreurs

    if(empty($name) || strlen($name) < 2 || strlen($name) > 15) {
        $errorList['name'][] = 'Le nom est invalide';
    }

    if(empty($firstname) || strlen($firstname) < 2 || strlen($firstname) > 15) {
        $errorList['firstname'][] = 'Le prénom est invalide';
    }

    if(empty($email)) {
        $errorList['email'][] = 'L\'e-mail est obligatoire';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorList['email'][] = 'E-mail invalide';
    }

    if(empty($message)) {
        $errorList['message'][] = 'Le message est obligatoire';
    }

    // Si aucune erreur n'est détectée, traiter le formulaire (envoi d'email, etc.)
    if(empty($errorList)) {

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
            $textContent1 = "Votre message a été envoyé avec succès.";
            $textContent2 = "";
            header("Location: " . $_SERVER['PHP_SELF'] . "#quatre");
            exit();
        } else {
            $textContent1 = "Il y a eu une erreur lors de l'envoi de votre message.";
            $textContent2 = "";
            $styleAlert = true;
        };
            
            }
}

?>

<?php
function showErrors($fieldName, $errorList = null) {
    $errors = '';
    if(isset($errorList) && !empty($errorList[$fieldName])) {
        foreach($errorList[$fieldName] as $error) {
            $errors .= $error . ' ';
        }
    }
    return $errors;
   
}
?>
<div class="card-box" id="quatre">
                <div class="card four">
                    <div class="label-fixed">
                        <h3>Contact</h3>
                    </div>
                   
                    <section class="mid-section">
                        <h2 class="title-card">Contact<span id="input-cursor">|</span></h2>
                        <p class="contact-text <?= isset($styleAlert) && $styleAlert === true ? 'red_text' : '' ?>"><?= $textContent1 ?></p>
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
                                    <div class="inputbox <?= (isset($errorList['message'])) ? 'invalid' : ''; ?>" required>
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


        
          
