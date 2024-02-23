<?php
$errorList = [];

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

        //A SUPPRIMER !!!
       var_dump('envoi du mail');
       $_POST = [];
    }
}

?>

<?php
        function showErrors($fieldName, $errorList = null) {
            if(isset($errorList) && !empty($errorList[$fieldName])) {
                    foreach($errorList[$fieldName] as $error) {
                        echo $error;
                    }
            }
        }
?>
<div class="card-box" id="quatre">
                <div class="card four">
                    <div class="label-fixed">
                        <h3>Contact</h3>
                    </div>
                    
                    <section class="mid-section">
                        <h2 class="title-card">Contact<span id="input-cursor">|</span></h2>
                       <p class="contact-text">Vous avez besoin d’obtenir d’autres informations ou de me rencontrer ?</p>
                       <p class="contact-text"> Remplissez ce formulaire !</p>
                    </section>

                    <section class="formulaire-section">
                        <div class="formulaire-box">
                            <form method="post">
                              
                                    <div class="inputbox <?= (isset($errorList['name'])) ? 'invalid' : ''; ?>">
                                    <input type="text" name="name" placeholder="<?php showErrors('name', $errorList); ?>" required>
                                        <label for="nom">Nom*</label>
                                    </div>
                                    <div class="inputbox <?= (isset($errorList['firstname'])) ? 'invalid' : ''; ?>">
                                        <input type="text" name="firstname" placeholder="<?php showErrors('firstname', $errorList); ?>" required>
                                        <label for="firstname">Prénom*</label>
                                    </div>
                                    <div class="inputbox <?= (isset($errorList['email'])) ? 'invalid' : ''; ?>">
                                        <input type="text" name="mail" placeholder="<?php showErrors('email', $errorList); ?>" required>
                                        <label for="mail">Email*</label>
                                    </div>
                                    <div class="inputbox <?= (isset($errorList['message'])) ? 'invalid' : ''; ?>" required>
                                        <textarea name="message" id="message" required></textarea>
                                        <label for="message">Votre message*</label>
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


          