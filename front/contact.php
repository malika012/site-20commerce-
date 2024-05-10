<?php include '..//include/front_nav.php'?>;
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - TechHaven</title>
    <!-- Inclure vos styles CSS ici -->
    <style>
        *{
            margin:0;
            padding:0;
        }
        body{
        background-color:weight;
        }
        /* Styles pour la section de contact */
.contact {
    padding: 50px 0; /* Espacement intérieur */
    background-color: #f9f9f9; /* Couleur de fond */
    text-align: center; /* Centrer le contenu horizontalement */
}

.contact h2 {
    margin-bottom: 30px; /* Espacement sous le titre */
    color: #333; /* Couleur du titre */
}

.contact-info {
    display: flex; /* Afficher les informations de contact en ligne */
    justify-content: center; /* Centrer horizontalement */
    align-items: center; /* Centrer verticalement */
}

.info-item {
    margin: 0 20px; /* Espacement entre les éléments */
}

.info-item img {
    width: 50px; /* Taille des logos */
    margin-bottom: 10px; /* Espacement sous les logos */
}

.info-item p {
    color: #666; /* Couleur du texte */
    font-size: 16px; /* Taille de la police */
    line-height: 1.6; /* Hauteur de ligne */
}
/* Styles pour la section de carte */
.map {
    padding: 50px 0; /* Espacement intérieur */
    background-color: #f9f9f9; /* Couleur de fond */
    text-align: center; /* Centrer le contenu horizontalement */
}

.map h2 {
    margin-bottom: 30px; /* Espacement sous le titre */
    color: #333; /* Couleur du titre */
}

/* Styles pour la section de commentaires */
.comments {
    padding: 50px 0; /* Espacement intérieur */
    background-color: #f6f6f6; /* Couleur de fond */
    text-align: center; /* Centrer le contenu horizontalement */
}

.comments h2 {
    margin-bottom: 30px; /* Espacement sous le titre */
    color: #333; /* Couleur du titre */
}

.comments form {
    margin-bottom: 30px; /* Espacement sous le formulaire */
}

.comments form label {
    display: block; /* Afficher les étiquettes sur une nouvelle ligne */
    margin-bottom: 10px; /* Espacement sous les étiquettes */
    font-weight: bold; /* Texte en gras */
}

.comments form input[type="text"],
.comments form input[type="email"],
.comments form textarea {
    width: 100%; /* Largeur de 100% */
    padding: 10px; /* Espacement intérieur */
    margin-bottom: 20px; /* Espacement sous les champs */
    border: 1px solid #ccc; /* Bordure grise */
    border-radius: 5px; /* Coins arrondis */
}

.comments form textarea {
    height: 100px; /* Hauteur de la zone de texte */
}

.comments form button {
    padding: 10px 20px; /* Espacement intérieur */
    background-color: #007bff; /* Couleur de fond */
    color: #fff; /* Couleur du texte */
    border: none; /* Pas de bordure */
    border-radius: 5px; /* Coins arrondis */
    cursor: pointer; /* Curseur pointeur */
}

.comments form button:hover {
    background-color: #0056b3; /* Couleur de fond au survol */
}

.comment-list {
    text-align: left; /* Alignement du texte à gauche */
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


    </style>
</head>
<body>

<!-- En-tête -->


<!-- Section de contact -->
<section class="contact">
    <div class="container">
        <h2>Contactez-nous</h2>
        <div class="contact-info">
            <div class="info-item">
                <img src="../Picture/telephone.png" alt="Téléphone">
                <p>Téléphone: (+123) 456-7890</p>
            </div>
            <div class="info-item">
                <img src="../Picture/mail.png" alt="Email">
                <p>Email: contact@techhaven.com</p>
            </div>
            <div class="info-item">
                <img src="../Picture/map.png   " alt="Adresse">
                <p>Adresse: 123 Rue Tech, Ville Tech, Pays Tech</p>
            </div>
        </div>
    </div>
</section>
<section class="map">
    <div class="container">
        <h2>Nous Trouver</h2>
        <!-- Inclure ici votre carte, par exemple une carte Google Maps -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3306.4065305768686!2d-4.979441224613671!3d34.03344151872329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9f8b5f7be79403%3A0x64ed183ba63abde7!2sFacult%C3%A9%20des%20Sciences%20Dhar%20El%20Mehraz!5e0!3m2!1sfr!2sma!4v1713174423081!5m2!1sfr!2sma" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<!-- Section de commentaires -->
<section class="comments">
    <div class="container">
        <h2>Commentaires</h2>
        <!-- Formulaire de commentaire -->
        <form action="submit_comment.php" method="post">
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="comment">Commentaire:</label><br>
            <textarea id="comment" name="comment" rows="4" required></textarea><br>
            <button type="submit">Soumettre</button>
        </form>
        <!-- Affichage des commentaires -->
        <div class="comment-list">
            <!-- Les commentaires seront affichés ici -->
        </div>
    </div>
</section>

<!-- Pied de page -->
<footer>
    <div class="container">
        <p>&copy; 2024 TechHaven. Tous droits réservés.</p>
    </div>
</footer>

<!-- Inclure vos scripts JavaScript ici -->

</body>
</html>
