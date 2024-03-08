import navigation from './navigation.js';
import cursor from './cursor.js';
import footerMobile from './footerMobile.js';



const app = {
    init: function(){
        footerMobile.init();
        navigation.init();
        cursor.init();
        
    }
}

document.addEventListener('DOMContentLoaded', app.init);