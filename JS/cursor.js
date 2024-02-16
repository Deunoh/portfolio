const cursor = {
    init: function() {
        // Sélectionnez et stockez tous les éléments avec l'ID 'input-cursor'
        cursor.cursorsElems = document.querySelectorAll('#input-cursor');
       
        for (const cursorElem of cursor.cursorsElems) {
            // Pour chaque élément, démarrez un intervalle d'animation
            setInterval(function() {
                cursor.cursorAnimation(cursorElem);
            }, 500);
        }
    },

    cursorAnimation: function(elem) {
        // Toggle the display of the cursor element
        if (elem.style.display === 'none') {
            elem.style.display = '';
        } else {
            elem.style.display = 'none';
        }
    }
}

export default cursor;
