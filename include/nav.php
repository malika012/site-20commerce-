<?php
session_start();
$connecter = false;
if(isset($_SESSION['utilisateur'])) { // Vérifie si l'utilisateur est connecté
 $connecter = true;
}
?>
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
    color: #007bff; 
}




</style>
</head>
<body>
<?php
            $currentPage = $_SERVER['PHP_SELF'];
 ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <p class="icon-container">
            <img class="navbar-brand" src="Picture/R.jfif" alt="Tech-Haven">
            <span class="brand-name">Tech-Haven</span>
        </p>

            <!-- Liens principaux de la barre de navigation -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown" onmouseover="showDropdownMenu('dropdownMenuAccueil')" onmouseout="hideDropdownMenu('dropdownMenuAccueil')">
    <a class="nav-link dropdown-toggle <?php if($currentPage=='/TecHaven/index.php') echo 'active'; ?>" href="index.php" role="button" aria-expanded="false"> Accueil <i class="fas fa-chevron-down"></i></a>

    <ul class="dropdown-menu" id="dropdownMenuAccueil">
        <li><a class="dropdown-item" href="#nosservice"><i class="fas fa-tools"></i> Nos Services</a></li>


                        <li><a class="dropdown-item" href="#Propos"><i class="fas fa-user"></i> À Propos</a></li>

                        </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link"<?php if($currentPage=='/TecHaen/produit.php')echo'active';?> href="produit.php"><i class="fas fa-box-open"></i> Produits</a>

                    </li>
                    
                    <li class="nav-item">
                    <a class="nav-link" href="categoris.php"<?php if($currentPage=='/TecHaven/categorie.php')echo'active';?>> <i class="fas fa-list"></i> Catégories</a>

                    </li>
                </ul>
            </div> <!-- Fermeture de la balise collapse navbar-collapse -->
            <!-- Liens "Ajouter", "Se Connecter" et "Déconnecter", et formulaire de recherche -->
            <ul class="navbar-nav">
                <?php if($connecter): ?>
                <li class="nav-item dropdown" onmouseover="showDropdownMenu('dropdownMenuAjouter')" onmouseout="hideDropdownMenu('dropdownMenuAjouter')">
                <a class="nav-link dropdown-toggle" href="#" role="button" aria-expanded="false"><i class="fas fa-plus"></i> Ajouter</a>

                    <ul class="dropdown-menu" id="dropdownMenuAjouter">
                    <li><a class="dropdown-item" href="ajouter_produit.php"><i class="fas fa-plus"></i> Ajouter Produit</a></li>

                        <li><a class="dropdown-item" href="ajouter_categorie.php"> <i class="fas fa-plus-circle"></i> Ajouter Catégorie</a></li>
</ul>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="commandes.php"><i class="fas fa-shopping-bag"></i> Commandes</a>

                </li>
                <li class="nav-item">
                <a class="nav-link" href="deconnexion.php"><i class="fas fa-sign-out-alt"<?php if($currentPage=='')echo'active';?>></i> Déconnecter</a>

                </li>
                <?php else: ?>
                <li class="nav-item">
                <a class="nav-link" href="connexion.php"> <i class="fas fa-sign-in-alt"<?php if($currentPage=='/TecHaven/connexion.php')echo'active';?>></i> Se Connecter</a>

                </li>
                <?php endif; ?>
            </ul>
        </div> <!-- Fermeture de la balise container-fluid -->
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




