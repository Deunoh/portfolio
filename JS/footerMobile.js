const footerMobile = {
    footerElem: null, // Ajout d'une propriété pour stocker l'élément du footer

    init: function(){
        // Sélectionner le footer
        footerMobile.footerElem = document.querySelector('footer');
        // Initialiser l'écouteur d'événements de redimensionnement
        window.addEventListener('resize', footerMobile.widthScreen);
        // Vérifier la largeur de l'écran au démarrage de l'application
        footerMobile.widthScreen();

    },

    widthScreen: function(){
        // Vérifier si le paragraphe existe déjà
        const existingParagraph = footerMobile.footerElem.querySelector('.footer-paragraphe');
        // Si la largeur de l'écran est inférieure ou égale à 950 pixels
        if(window.innerWidth <= 950){
             //Je selectionne la div swipe
            footerMobile.swipeElem = document.querySelector('.swipe-logo');
            setTimeout(() => {footerMobile.swipeElem.hidden = false}, 5000);
            // Si le paragraphe n'existe pas déjà, le créer
            if(!existingParagraph){
                const footerParagraphe = document.createElement('p');
                footerParagraphe.classList.add('footer-paragraphe');
                footerParagraphe.textContent = 'Site complet disponible sur ordinateur !';
                footerMobile.footerElem.appendChild(footerParagraphe);
            }
        } else {
            // Si la largeur de l'écran dépasse 950 pixels et que le paragraphe existe, le supprimer
            if(existingParagraph){
                footerMobile.swipeElem.hidden = true;
                existingParagraph.remove();
            }
        }
    },

}

export default footerMobile;


