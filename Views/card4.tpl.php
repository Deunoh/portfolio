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
      $errorList['email'][] = 'E-mail invalide';
   }
   // Nettoyage de l'email pour des raisons de sécurité
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   } else {
    $errorList['email'][] = 'L\'e-mail est obligatoire';
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

   //Pour le message 
   if($message === ''){
    $errorList['message'][] = 'Le message est obligatoire';
   }

 
    
}; ?>

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
                                    <input type="text" name="name" value="<?php showErrors('name', $errorList); ?>" required>
                                        <label for="nom">Nom*</label>
                                    </div>
                                    <div class="inputbox">
                                        <input type="text" name="firstname" required>
                                        <label for="firstname">Prénom*</label>
                                    </div>
                                    <div class="inputbox">
                                        <input type="text" name="mail" required>
                                        <label for="mail">Email*</label>
                                    </div>
                                    <div class="inputbox" required>
                                        <textarea name="message" id="message" required ></textarea>
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


            <?php //if(isset($errorList['name']) && !empty($errorList['name'])){echo $errorList['name'];} ?>