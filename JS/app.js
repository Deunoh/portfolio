import navigation from './navigation.js';
import cursor from './cursor.js';



const app = {
    init: function(){
        navigation.init();
        cursor.init();
        
    }
}

document.addEventListener('DOMContentLoaded', app.init);