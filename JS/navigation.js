const navigation = {
    init: function (){
        //Je selectionne et je stock les boutons du footer
        navigation.btnOne = document.getElementById('btn__card__1');
        navigation.btnTwo = document.getElementById('btn__card__2');
        navigation.btnThree = document.getElementById('btn__card__3');
        navigation.btnFour = document.getElementById('btn__card__4');

        //Je selectionne et je stock les breaks points 
       
        navigation.cardOneBreakPoint = document.getElementById('un');
        navigation.cardTwoBreakPoint = document.getElementById('deux');
        navigation.cardThreeBreakPoint = document.getElementById('trois');
        navigation.cardFourBreakPoint = document.getElementById('quatre');

       navigation.changeColor();
       

    },

    changeColor: function(){
        //Je créer un nouvel objet observer
        const observer = new IntersectionObserver((entries) => {
           for (const entry of entries){
               if(entry.isIntersecting){
                   if (entry.target === navigation.cardOneBreakPoint) {
                       navigation.btnOne.style.backgroundColor = '#D9D9D9';
                       navigation.btnOne.style.border = "solid 1px #535456";
                   } else if (entry.target === navigation.cardTwoBreakPoint) {
                       navigation.btnTwo.style.backgroundColor = '#D9D9D9';
                       navigation.btnTwo.style.border = "solid 1px #535456"; 
                   } else if (entry.target === navigation.cardThreeBreakPoint) {
                       navigation.btnThree.style.backgroundColor = '#D9D9D9';
                       navigation.btnThree.style.border = "solid 1px #535456"; 
                   } else if (entry.target === navigation.cardFourBreakPoint) {
                       navigation.btnFour.style.backgroundColor = '#D9D9D9';
                       navigation.btnFour.style.border = "solid 1px #535456"; 
                       window.location.hash = "quatre";
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
            //Si l'element occupe au moins 80% de l'écran
           threshold: .8
        })
        observer.observe(navigation.cardOneBreakPoint);
        observer.observe(navigation.cardTwoBreakPoint);
        observer.observe(navigation.cardThreeBreakPoint);
        observer.observe(navigation.cardFourBreakPoint);
   },


}

export default navigation;

