import { projects } from './data.js';

const projectsModule = {
  init: function() {
    const projectsContainer = document.getElementById('projects-container');
    const projectDetailImg = document.getElementById('project-detail-img');
    const projectDetailTitle = document.getElementById('project-detail-title');
    const projectDetailDescription = document.getElementById('project-detail-description');
    const projectTechnos = document.getElementById('project-technos');
    const websiteLink = document.getElementById('website-link');
    const githubLink = document.getElementById('github-link');
    const projectsLinksDiv = document.querySelector('.projects-links');
    
    projects.forEach(project => {
      // Créer le lien pour l'image
      const imgLink = document.createElement('a');
      imgLink.href = project.link;
      imgLink.target = '_blank';
      imgLink.className = 'img-link';
      
      // Créer l'image du projet
      const img = document.createElement('img');
      img.src = project.image;
      img.alt = project.alt;
      img.className = 'projects__img';
      
      // Ajouter l'image au lien
      imgLink.appendChild(img);
      
      // Ajouter le lien au container des projets
      projectsContainer.appendChild(imgLink);

      // Ajouter un événement pour afficher les détails du projet
      imgLink.addEventListener('click', (event) => {
        event.preventDefault(); // Empêcher le lien d'ouvrir une nouvelle page
        
        // Mettre à jour l'image, le titre et la description du projet
        projectDetailImg.src = project.image;
        projectDetailImg.alt = project.alt;
        projectDetailTitle.textContent = project.title;
        projectDetailDescription.innerHTML = project.description;

        // Vider les technologies précédentes
        projectTechnos.innerHTML = '';
        
        // Ajouter les technologies utilisées
        project.technos.forEach(techno => {
          const imgTechno = document.createElement('img');
          imgTechno.src = `img/${techno}-logo.png`; // Exemple : img/react-logo.png
          imgTechno.alt = `${techno} logo`;
          imgTechno.className = "projects-technos--img";

          projectTechnos.appendChild(imgTechno);
        });

        // Vérifier si les deux liens sont présents
        if (project.link && project.github) {
          // Si les deux liens existent, on met à jour les href et on affiche la div
          websiteLink.href = project.link;
          githubLink.href = project.github;
          projectsLinksDiv.style.display = 'block';
        } else {
          // Si l'un ou les deux liens sont absents, on cache la div
          projectsLinksDiv.style.display = 'none';
        }
      });
    });
  }
};

export default projectsModule;
