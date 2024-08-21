const animationCard = {
  init: function () {
    // Sélectionner tous les liens des projets
    const projectLinks = document.querySelectorAll('.img-link');
    // Selectionne le bouton retour
    const backBtn = document.querySelector('.back-button-projects');
    
    // Sélectionner la div à laquelle ajouter la classe
    const cardBox = document.querySelector('.custom-card-box-animate');
    
    // Ajouter un écouteur d'événements pour chaque lien
    projectLinks.forEach(function (link) {
      link.addEventListener('click', function (event) {
        // Empêcher le comportement par défaut (ouverture du lien)
        event.preventDefault();
        
        // Ajouter la classe 'flipped-card' à la div
        cardBox.classList.add('flipped-card');
      });
    });

    // écouteur d'évenement pour le bouton retour
    backBtn.addEventListener('click', (event) => {
      cardBox.classList.remove('flipped-card');
    });
  }
};

export default animationCard;
