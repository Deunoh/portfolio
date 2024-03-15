import navigation from './navigation.js';
import cursor from './cursor.js';
import mobile from './mobile.js';



const app = {
    init: function(){
        mobile.init();
        navigation.init();
        cursor.init();
        
    }
}

document.addEventListener('DOMContentLoaded', app.init);