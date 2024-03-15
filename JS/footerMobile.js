const footerMobile = {
    footerElem: null, // Ajout d'une propriété pour stocker l'élément du footer

    init: function(){
         //Je selectionne la div swipe
        footerMobile.swipeElem = document.querySelector('.swipe-logo');
        footerMobile.swipeElem.hidden = true
        //je selectionne le formulaire
        footerMobile.form = document.querySelector('form');
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
            setTimeout(() => {footerMobile.swipeElem.hidden = false}, 5000);
           }else{
            footerMobile.swipeElem.hidden = true
           }
            
    },

}
export default footerMobile;


