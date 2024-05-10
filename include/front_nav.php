<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
 .icon-container {
    display: flex;
    align-items: center;
}

.navbar-brand {
    max-width: 100px; /* largeur maximale de l'image */
    max-height: 100px; /* hauteur maximale de l'image */
    transition: box-shadow 0.3s ease, transform 0.3s ease; /* transition pour l'effet de box-shadow et de mouvement */
}

.brand-name {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Choisissez une police moderne */
    font-size: 20px; /* Taille de police */
    color: #333; /* Couleur du texte */
    transition: box-shadow 0.3s ease, transform 0.3s ease; /* transition pour l'effet de box-shadow et de mouvement */
}

.icon-container:hover .navbar-brand {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Effet de box-shadow sur l'icône au survol */
    transform: scale(1.05); /* Léger agrandissement de l'icône au survol */
}

.icon-container:hover .brand-name {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Effet de box-shadow sur le texte au survol */
    transform: translateY(5px); /* Léger décalage vers le bas du texte au survol */
}

.icon-container:hover .brand-name {
    color: #007bff; /* Couleur du texte au survol */
}




</style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <p class="icon-container">
            <img class="navbar-brand" src="../Picture/R.jfif" alt="Tech-Haven">
            <span class="brand-name">Tech-Haven</span>
        </p>
    

        <!-- Bouton de bascule -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

            <!-- Liens principaux de la barre de navigation -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown" onmouseover="showDropdownMenu('dropdownMenuAccueil')" onmouseout="hideDropdownMenu('dropdownMenuAccueil')">
                        <a class="nav-link dropdown-toggle" href="accuil.php" role="button" aria-expanded="false"><i class="fa-solid fa-house my-2 me-2"></i>Accueil</a>
                        <ul class="dropdown-menu" id="dropdownMenuAccueil">
                            <li><a class="dropdown-item" href="#nosservice">Nos Services</a></li>
                            <li><a class="dropdown-item" href="#Propos">À Propos</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fa fa-duotone fa-list my-2 me-2"></i>Liste de categorie</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="connecter.php"> <i class="fas fa-sign-in-alt my-2 me-2"></i> Se connecter</a>

                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="contact.php"><i class="fas fa-envelope my-2 me-2"></i> Contactez</a>

                    </li>
              </ul>
                <ul>
                <?php
session_start(); // Assurez-vous que la session est démarrée
$idclient = isset($_SESSION['client']['id']) ? $_SESSION['client']['id'] : null; 

if(isset($_SESSION['panier'][$idclient])){
    define('PRODUCTS_COUNT', count($_SESSION['panier'][$idclient]));
} else {
    define('PRODUCTS_COUNT', 0);
}
?>
<a class="btn flaot-end" href="panier.php"><i class="fa-solid fa-cart-shopping me-1"></i>Panier (<?php echo PRODUCTS_COUNT; ?>)</a>

            </li>
            </ul> 
            </div>

        </div> 
    </nav>

    <script>
        // Fonction pour afficher le menu déroulant
        function showDropdownMenu(menuId) {
            var dropdownMenu = document.getElementById(menuId);
            dropdownMenu.style.display = "block";
        }

        // Fonction pour masquer le menu déroulant
        function hideDropdownMenu(menuId) {
            var dropdownMenu = document.getElementById(menuId);
            dropdownMenu.style.display = "none";
        }
    </script>
</body>
</html>
