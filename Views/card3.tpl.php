<?php
// Tableau contenant les informations des projets
$projects = [
    [
        'link' => 'https://github.com/Deunoh/homepage-liegeois',
        'image' => 'img/projects/promoliegeois.png',
        'alt' => 'projet promoliegeois',
    ],
    [
        'link' => 'https://github.com/Deunoh/ne_m-insulte_pas',
        'image' => 'img/projects/ne_m-insulte_pas.png',
        'alt' => 'projet React Ne m\'insulte pas',
    ],
    [
        'link' => '#',
        'image' => 'img/projects/portfolio.png',
        'alt' => 'image portfolio',
    ],
];
?>

<div class="card-box custom-animate-box" id="trois">
    <div class="card three custom-card-box-animate">
        <div class="label-fixed">
            <h3>Projets</h3>
        </div>
        <section class="section_projects custom-animate-card-front">
            <div class="projects-box">
                <?php foreach ($projects as $project): ?>
                    <a href="#" class="img-link" target="_blank">
                        <img src="<?php echo $project['image']; ?>" alt="<?php echo $project['alt']; ?>" class="projects__img">
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="section_projects custom-animate-card-back">
            <div class="projects-box-detail">
               <img class="project-img-detail" src="img/projects/promoliegeois.png" alt="projet promoliegeois">
               <div class="glass__paragraphe">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut dicta perferendis pariatur in quisquam architecto veniam eveniet dolorem. Pariatur eum similique impedit! Rerum dolorem possimus cupiditate fugiat pariatur repellat harum provident optio voluptatibus minus! Sit cum provident odit, impedit magni quis excepturi laudantium harum consectetur, expedita praesentium. Assumenda, voluptates odit.</p>
               </div>
            </div>
        </section>
    </div>
</div>

<!-- Il faut supprimer les liens dans le front de la carte, ajouter les liens github et lien vers le site dans le tableau puis dynamisé le back de la carte -->