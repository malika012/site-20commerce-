<?php include 'include/nav.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>www.TechHaven.ma</title>
    <style>

       /* Réinitialisation des styles par défaut */
/* Styles pour le diaporama */
/* Styles pour les titres des images */
.slideshow .slide {
    position: relative; /* Position relative pour que les titres soient positionnés par rapport à l'image */
}

.slideshow .slide img {
    width: 100%; /* Assurez-vous que les images occupent toute la largeur du conteneur */
    height: 500px; /* Pour maintenir le rapport hauteur/largeur */
    margin-top: 10px;
}

.slideshow .slide h2 {
    position: absolute; /* Position absolue pour positionner le titre sur l'image */
   bottom: 100px; /* Ajustez la position verticale selon vos préférences */
    left: 50%; /* Centrer horizontalement */
    transform: translateX(-50%); /* Centrer horizontalement */
    background-color: rgba(0, 0, 0, 0.7); /* Fond semi-transparent */
    color: #fff; /* Couleur du texte */
    padding: 10px 20px; /* Espacement intérieur */
    margin: 0; /* Réinitialiser les marges par défaut */
    font-size: 20px; /* Taille de la police */
    text-align: center; /* Centrer le texte */
}


/* Styles pour l'animation de fondu */
.fade {
    animation: fadeEffect 3s infinite;
}

@keyframes fadeEffect {
    0% {
        opacity: 0;
    }
    50% {
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}
h2{
    margin-bottom: 200px;
}

/* Styles pour la section des services */
.services {
    padding: 50px 0; /* Espacement intérieur pour les services */
    background-color: gray; /* Couleur de fond */
    text-align: center; /* Centrer le contenu horizontalement */
}

.services h1 {
    margin-bottom: 30px; /* Espacement sous le titre */
    color:white ;
    font-family: 'Courier New', Courier, monospace;
}

.service {
    display: inline-block; /* Afficher les services en ligne */
    width: 30%; /* Largeur des services */
    margin: 0 2%; /* Espacement entre les services */
    vertical-align: top; /* Alignement vertical en haut */
    background-color: #fff; /* Couleur de fond des services */
    border-radius: 5px; /* Coins arrondis */
    padding: 20px; /* Espacement intérieur */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
}

.service img {
    width: 80px; /* Taille de l'image */
    margin-bottom: 20px; /* Espacement sous l'image */
}

.service h2 {
    color: #333; /* Couleur du titre */
    font-size: 18px; /* Taille de la police du titre */
    margin-bottom: 10px; /* Espacement sous le titre */
}

.service p {
    color: #666; /* Couleur du texte */
    font-size: 18px; /* Taille de la police du texte */
    line-height: 1.5; /* Hauteur de ligne */
}
/* Styles pour la section "À propos de nous" */
.about {
    padding: 50px 0; /* Espacement intérieur */
    background-color: #f9f9f9; /* Couleur de fond */
    text-align: center; /* Centrer le contenu horizontalement */
}

.about h1 {
    margin-bottom: 30px; /* Espacement sous le titre */
    color: #333; /* Couleur du titre */
    font-family: 'Courier New', Courier, monospace;
}

.about p {
    color: #666; /* Couleur du texte */
    font-size: 20px; /* Taille de la police */
    line-height: 1.6; /* Hauteur de ligne */
    margin-bottom: 20px; /* Espacement sous les paragraphes */
}

.container {
    max-width: 1200px; /* Largeur maximale du contenu */
    margin: 0 auto; /* Centrer le contenu horizontalement */
    padding: 0 20px; /* Espacement intérieur */
}

footer{
    background-color: aquamarine; 
    height: 60px;

    }
    footer p{
        color: #000;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 25px;
    }
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.background-text {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.delete-btn {
    position: absolute;
    top: 5px;
    right: 5px;
    background-color: transparent;
    border: none;
    color: red;
    font-size: 20px;
    cursor: pointer;
}

.delete-btn:hover {
    color: darkred;
}
        /* Styles pour la boîte de dialogue personnalisée */
        .custom-alert {
            display: block;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 9999;
            max-width: 80%;
            text-align: center;
        }

        .custom-alert-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .alert-message {
            font-size: 18px;
            margin-right: 20px;
        }

        .close-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .close-button:hover {
            background-color: #0056b3;
        }
    
    </style>
</head>
<body>
<div class="custom-alert" id="custom-alert">
    <div class="custom-alert-content">
        <span class="alert-message">Bienvenue chez Tech-Haven ! Nous sommes ravis de vous accueillir sur notre site.</span>
        <button class="close-button" onclick="closeAlert()">Fermer</button>
    </div>
</div>

<section class="slideshow">
    <div class="container">
        <div class="slide">
            <figure>
                <img src="Picture/pecture1.avif" alt="Image 1">
                <h2>Presentoir </h2>
            </figure>
        </div>
        <div class="slide">
            <figure>
                <img src="Picture/bureau-bleu-plat-ordinateur-portable-ecouteurs_977617-44009.avif" alt="Image 2">
                <h2>Bienvenue chez Tech-Haven ! Nous sommes ravis de vous accueillir sur notre site</h2>
            </figure>
        </div>
        <div class="slide">
            <figure>
                <img src="Picture/vue-dessus-du-travail-maquette-depuis-maison_23-2148493402.avif" alt="Image 3">
                <h2>Bienvenue chez Tech-Haven ! Nous sommes ravis de vous accueillir sur notre site</h2>
            </figure>
        </div>
    </div>
</section>
<section class="services" id="nosservice">
    <div class="container">
        <h1>Nos Services</h1>
        <div class="service">
            <img src="Picture/livraison.png" alt="Livraison">
            <h2>Livraison</h2>
            <p>Nous offrons une livraison rapide et fiable de tous nos produits directement à votre porte.</p>
        </div>
        <div class="service">
            <img src="Picture/installation.png" alt="Installation">
            <h2>Installation</h2>
            <p>Nos experts en informatique peuvent installer et configurer vos nouveaux appareils pour une utilisation optimale.</p>
        </div>
        <div class="service">
            <img src="Picture/assistance.png" alt="Assistance">
            <h2>Assistance Technique</h2>
            <p>Notre équipe d'assistance technique est disponible pour répondre à toutes vos questions et résoudre vos problèmes.</p>
        </div>
        <!-- Ajoutez d'autres services avec des images selon vos besoins -->
    </div>
</section>

 <?php include 'include/annonces.php' ?>

<section class="about" id="Propos">
    <div class="container">
        <h1>À Propos de TechHaven</h1>
        <p>TechHaven est votre destination ultime pour tout ce qui concerne la technologie. Nous sommes passionnés par l'innovation et nous nous efforçons de fournir les derniers produits technologiques et les meilleures solutions à nos clients.</p>
        <p>Notre mission est de créer un environnement où les passionnés de technologie peuvent trouver tout ce dont ils ont besoin pour nourrir leur passion. Que vous soyez un amateur de gadgets, un professionnel de l'informatique ou un simple curieux, TechHaven est là pour vous aider à découvrir, à apprendre et à explorer le monde fascinant de la technologie.</p>
        <p>Nous croyons en l'excellence, en l'innovation et en un service client exceptionnel. Notre équipe d'experts est toujours à votre disposition pour répondre à vos questions, vous conseiller sur les meilleurs produits et vous offrir une expérience d'achat inégalée.</p>
        <p>Rejoignez-nous dans notre voyage pour repousser les limites de la technologie et créer un avenir meilleur et plus connecté pour tous.</p>
    </div>
</section>
<!-- Inclure jQuery avant d'utiliser ses fonctionnalités -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  // JavaScript pour le diaporama d'images
$(document).ready(function() {
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var slides = $(".slide");
        for (var i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 3000); // Change image every 3 seconds
    }
});

    function closeAlert() {
        var alertBox = document.getElementById("custom-alert");
        alertBox.style.display = "none";
    }


</script>
<footer>
    <div class="container">
        <p>&copy; 2024 TechHaven. Tous droits réservés.</p>
    </div>
</footer>
</body>
</html>

