const navigation = {
    init: function (){
        //Je selectionne et je stock les boutons du footer
        navigation.btnOne = document.getElementById('btn__card__1');
        navigation.btnTwo = document.getElementById('btn__card__2');
        navigation.btnThree = document.getElementById('btn__card__3');
        navigation.btnFour = document.getElementById('btn__card__4');

        //Je selectionne et je stock les breaks points 
        //Pour la carte 1 
        navigation.cardOneBreakPoint = document.getElementById('title-name');
        navigation.cardTwoBreakPoint = document.querySelector('.cv-text');
        navigation.cardThreeBreakPoint = document.querySelector('.right_section_projects');
        navigation.cardFourBreakPoint = document.querySelector('.formulaire-section');

       navigation.changeColor();
       

    },

    changeColor: function(){
        //Je créer un nouvel objet observer
        const observer = new IntersectionObserver((entries) => {
           for (const entry of entries){
               if(entry.isIntersecting){
                   if (entry.target === navigation.cardOneBreakPoint) {
                       navigation.btnOne.style.backgroundColor = '#D9D9D9'; 
                   } else if (entry.target === navigation.cardTwoBreakPoint) {
                       navigation.btnTwo.style.backgroundColor = '#D9D9D9'; 
                   } else if (entry.target === navigation.cardThreeBreakPoint) {
                       navigation.btnThree.style.backgroundColor = '#D9D9D9'; 
                   } else if (entry.target === navigation.cardFourBreakPoint) {
                       navigation.btnFour.style.backgroundColor = '#D9D9D9'; 
                   }
               } else {
                   if (entry.target === navigation.cardOneBreakPoint) {
                       navigation.btnOne.style.backgroundColor = ''; 
                   } else if (entry.target === navigation.cardTwoBreakPoint) {
                       navigation.btnTwo.style.backgroundColor = ''; 
                   } else if (entry.target === navigation.cardThreeBreakPoint) {
                       navigation.btnThree.style.backgroundColor = ''; 
                   } else if (entry.target === navigation.cardFourBreakPoint) {
                       navigation.btnFour.style.backgroundColor = ''; 
                   }
               }
           }
        }, {
           threshold: .5
        })
        observer.observe(navigation.cardOneBreakPoint);
        observer.observe(navigation.cardTwoBreakPoint);
        observer.observe(navigation.cardThreeBreakPoint);
        observer.observe(navigation.cardFourBreakPoint);
   },


}

export default navigation;

