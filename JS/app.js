import navigation from "./navigation.js";
import cursor from "./cursor.js";
import mobile from "./mobile.js";
import animationCard from "./animateCard.js";
import projectsModule from "./projectsModule.js";

const app = {
  init: function () {
    mobile.init();
    navigation.init();
    cursor.init();
    projectsModule.init();
    animationCard.init();
  },
};

document.addEventListener("DOMContentLoaded", app.init);
