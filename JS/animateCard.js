const animationCard = {
  init: function () {
    // Sélectionner tous les liens des projets
    const projectLinks = document.querySelectorAll('.img-link');
    
    // Sélectionner la div à laquelle ajouter la classe
    const cardBox = document.querySelector('.card-box-animate-three');
    
    // Ajouter un écouteur d'événements pour chaque lien
    projectLinks.forEach(function (link) {
      link.addEventListener('click', function (event) {
        // Empêcher le comportement par défaut (ouverture du lien)
        event.preventDefault();
        
        // Ajouter la classe 'flipped-card' à la div
        cardBox.classList.add('flipped-card');
        
        // Optionnel : ouvrir le lien dans un nouvel onglet après l'animation
        setTimeout(function () {
          window.open(link.href, '_blank');
        }, 500); // délai en millisecondes, ajustez selon la durée de votre animation
      });
    });
  }
};

export default animationCard;
