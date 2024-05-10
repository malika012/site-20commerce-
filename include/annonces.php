<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Annonces de Produits</title>
  <style>
    .carousel-container {
      width: 100%;
      overflow: hidden;
      position: relative;
    }
    .carousel-track {
      display: flex;
      transition: transform 0.5s ease;
    }
    .product-container {
      flex: 0 0 auto;
      width: 200px;
      text-align: center;
      margin: 10px;
      border: 3px solid #ccc;
      padding: 10px;
      border-radius: 20%;
      
    }
    .product-container:hover{
      background-color: #007bff;
    }
    .product-image {
      width: 120px;
      height: auto;
    }
    .button {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      margin: 0 10px;
      cursor: pointer;
    }
    .button:hover{
      background-color: blue;
    }
    #buy-button {
      display: block;
      margin-top: 10px;
      margin-left: 90%;
      background-color: limegreen;
      width: 100px;
      text-decoration:none 
      
    }
    #buy-button:hover{
      background-color: green;
    }
   
  </style>
  <!-- Ajoutez cette balise <script> avant la fermeture de la balise </body> -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Sélection du bouton "Acheter"
    var buyButton = document.getElementById("buy-button");
    
    // Ajout d'un gestionnaire d'événement pour le clic sur le bouton
    buyButton.addEventListener("click", function(event) {
        // Empêche le comportement par défaut du lien
        event.preventDefault();
        
        // Vérifie si l'utilisateur est connecté
        var isUserLoggedIn = <?php echo $connecter ? 'true' : 'false'; ?>;
        
        // Redirection en fonction de l'état de connexion de l'utilisateur
        if (isUserLoggedIn) {
            window.location.href = "index.php"; // Redirection vers produit.php
        } else {
            window.location.href = "connecter.php"; // Redirection vers connexion.php
        }
    });
});
</script>

</head>
<body>
  <div class="carousel-container">
    <div class="carousel-track" id="product-list">
      <div class="product-container">
        <img class="product-image" src="../Picture/61fjq9eujBL._AC_SL1500_1044x.webp" alt="">
        
        <p>61fjq9eujBL._AC_SL1500 _1044x</p>
      </div>

      <div class="product-container">
        <img class="product-image" src="../Picture\arrangement-collecte-stationnaire-moderne_23-2149309648.avif" alt="Product 2">
        
        <p>arrangement-collecte-stationnaire-moderne_23-2149309643</p>
      </div>

      <div class="product-container">
        <img class="product-image" src="../Picture\bureau-bleu-plat-ordinateur-portable-ecouteurs_977617-44009.avif" alt="Product 2">
       
        <p>bureau-bleu-plat-ordinateur-portable-ecouteurs_977617-44009</p>
      </div>
      <div class="product-container">
        <img class="product-image" src="../Picture\composition-bureau-moderne-dispositif-technologique_23-2147916723.avif" alt="Product 2">
        
        <p>composition-bureau-moderne-dispositif-technologique_23-2147916723</p>
      </div>
      <div class="product-container">
        <img class="product-image" src="../Picture\ensemble-clavier-et-souris-sans-fil-hp-235-1y4d0aa_1044x.webp" alt="Product 2">
        
        <p>ensemble-clavier-et-souris-sans-fil-hp-235-1y4d0aa_1044x</p>
      </div>
      <div class="product-container">
        <img class="product-image" src="../Picture\mise-plat-du-clavier-ecouteurs-espace-copie_23-2148397826.avif" alt="Product 2">
        <p>mise-plat-du-clavier-ecouteurs-espace-copie_23-2148397826</p>
      </div>
      <div class="product-container">
        <img class="product-image" src="../Picture\vue-configuration-du-bureau-jeu-eclaire-au-neon-clavier_23-2149529362.avif" alt="Product 2">
        <p>vue-configuration-du-bureau-jeu-eclaire-au-neon-clavier_23-214952936</p>
      </div>
      <div class="product-container">
        <img class="product-image" src="../Picture\vue-dessus-ensemble-gadgets-neon-violet-fond-rose-clavier-ordinateur-portable-ecouteurs-smartphone-ecran-noir-copyspace-pour-votre-publicite-tech-moderne-gadgets_155003-25550.avif" alt="Product 2">
        <p>vue-dessus-ensemble-gadgets-neon-violet-fond-rose-clavier-ordinateur-portable-ecouteurs-smartphone-ecran</p>
      </div>
      <div class="product-container">
        <img class="product-image" src="../Picture\vue-haut-angle-du-clavier-tablette-numerique-table_1048944-11895748.avif" alt="Product 2">
        <p>vue-haut-angle-du-clavier-tablette-numerique-table_1048944-1189574</p>
      </div>
      <div class="product-container">
        <img class="product-image" src="../Picture/ordinateur-portable-moderne-appareil-photo-fond-blanc_23-2148210385.avif" alt="Product 2">
        <p>ordinateur-portable-moderne-appareil-photo-fond-blanc_23-2148210385</p>
      </div>
      <div class="product-container">
        <img class="product-image" src="../Picture/ordinateur-portable-ouvert-ecran-blanc-feuilles-seches-automne_23-2148041406.avif" alt="Product 2">
        
        <p>ordinateur-portable-ouvert-ecran-blanc-feuilles-seches-automne_23-2148041406</p>
      </div>
      <div class="product-container">
        <img class="product-image" src="../Picture/images-illustratives-materiaux-conception-maquettes-ordinateurs-portables_810420-944.avif" alt="Product 2">
        
        <p>images-illustratives-materiaux-conception-maquettes-ordinateurs-portables_810420-944</p>
      </div>
      <div class="product-container">
        <img class="product-image" src="../Picture/ordinateur-portable-fond-monochrome-minimaliste_23-2150763336.avif" alt="Product 2">
        
        <p>ordinateur-portable-fond-monochrome-minimaliste_23-2150763336</p>
      </div>
      <div class="product-container">
        <img class="product-image" src="../Picture/ecran-ordinateur-portable-bureau-eclairage-colore_664601-12642.avif" alt="Product 2">
        
        <p>ecran-ordinateur-portable-bureau-eclairage-colore_664601-12642</p>
      </div>
      <div class="product-container">
        <img class="product-image" src="../Picture/ecran-blanc-pour-ordinateur-portable-table-bois_93675-28723.avif" alt="Product 2">
        <p>ecran-blanc-pour-ordinateur-portable-table-bois_93675-28723</p>
      </div>

    </div>
  </div>

  <div style="text-align: center; margin-top: 10px;">
    <a class="button" id="prev-btn">&lt; Précédent</a>
    <a class="button" id="next-btn">Suivant &gt;</a>
  </div>
  <div>
    <li>
 <!--a href="connexion.php"> <button class="buy-button"  >Acheter</button></a-->
 <a class="button" href="index.php" id="buy-button">Acheter</a>

  </li>
  </div>

  <script>
    const carouselTrack = document.querySelector('.carousel-track');
    const productContainers = document.querySelectorAll('.product-container');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    let currentIndex = 0;
    let intervalId;

    // Function to start automatic scrolling
    function startAutoScroll() {
      intervalId = setInterval(() => {
        currentIndex = (currentIndex + 1) % productContainers.length;
        scrollToProduct(currentIndex);
      }, 3000); // Change product every 3 seconds
    }

    // Function to stop automatic scrolling
    function stopAutoScroll() {
      clearInterval(intervalId);
    }

    // Function to scroll to a specific product
    function scrollToProduct(index) {
      const offset = index * productContainers[0].offsetWidth;
      carouselTrack.style.transform = `translateX(-${offset}px)`;
    }

    // Start automatic scrolling on load
    startAutoScroll();

    // Stop automatic scrolling on hover
    carouselTrack.addEventListener('mouseenter', stopAutoScroll);
    carouselTrack.addEventListener('mouseleave', startAutoScroll);

    // Go to next product on click
    nextBtn.addEventListener('click', () => {
      currentIndex = (currentIndex + 1) % productContainers.length;
      scrollToProduct(currentIndex);
    });

    // Go to previous product on click
    prevBtn.addEventListener('click', () => {
      currentIndex = (currentIndex - 1 + productContainers.length) % productContainers.length;
      scrollToProduct(currentIndex);
    });
  </script>
 
</body>
</html>

    