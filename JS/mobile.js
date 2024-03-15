const mobile = {
    footerElem: null, // Ajout d'une propriété pour stocker l'élément du footer

    init: function(){
         
        //je selectionne le formulaire
        mobile.form = document.querySelector('form');
        // Sélectionner le footer
        mobile.footerElem = document.querySelector('footer');
        // Initialiser l'écouteur d'événements de redimensionnement
        window.addEventListener('resize', mobile.widthScreen);
        // Vérifier la largeur de l'écran au démarrage de l'application
        mobile.widthScreen();

    },

    widthScreen: function(){
       
        // Si la largeur de l'écran est inférieure ou égale à 950 pixels
        if(window.innerWidth <= 950){
            
           }else{
            
           }
            
    },

}
export default mobile;


