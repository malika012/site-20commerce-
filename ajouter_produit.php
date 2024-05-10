<?php
ob_start();
include 'include/nav.php'?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ajouter Produit</title>
    <style>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    padding: 0px;
}

h2 {
    color: #007bff;
}

form {
    max-width: 500px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="number"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="file"] {
    margin-bottom: 15px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}


.product-info-container {
    max-width: 600px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    text-align: center;
}

.product-info-container h3 {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
}

.product-info-container p {
    font-size: 16px;
    color: #666;
    margin-bottom: 5px;
}

.product-info-container img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.page-interface {
    /* Styles pour l'interface de la page */
}
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #a9a9a9;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.close-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    font-size: 24px;
    color: #fff;
}

#categorie{
    width: 100%;
    right: 50%;
    margin-top:20px;
    margin-bottom:20px;
}

/* Style de base pour le curseur */
input[type="range"] {
  /* Largeur du curseur */
  width: 100%;
  /* Hauteur du curseur */
  height: 10px;
  /* Couleur de la piste */
  background-color: #ddd;
  /* Bordure */
  border: none;
  /* Arrondir les coins */
  border-radius: 5px;
  /* Curseur personnalisé */
  cursor: pointer;
}

/* Style de la poignée */
input[type="range"]::-webkit-slider-thumb {
  /* Taille de la poignée */
  width: 20px;
  height: 20px;
  /* Couleur de fond de la poignée */
  background-color: #007bff;
  /* Bordure de la poignée */
  border: none;
  /* Arrondir les coins de la poignée */
  border-radius: 50%;
  /* Ombre */
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
}
.range-container {
  position: relative;
}

#promotion-value {
  position: absolute;
  top: 0;
  left: calc(100% + 10px); /* Position à côté du champ de saisie */
  transform: translateY(-50%);
}


    </style>
    <script>
        function closeOverlay() {
            var overlay = document.querySelector('.overlay');
            overlay.style.display = 'none';
        }
        


    </script>
</head>

<?php
require_once 'include/database.php';

if(isset($_POST['submit'])){
    $nom_produit = $_POST['nom_produit'];
    $description = $_POST['description'];
    $image = $_FILES['image_produit'];
    $prix = $_POST['prix'];
    $promotion = $_POST['promotion'];
    $categorie = $_POST['categorie'];

    // Vérification de la présence de toutes les données nécessaires
    if(!empty($nom_produit) && !empty($description) && !empty($image) && !empty($prix)  && !empty($categorie)){
        // Traitement de l'image (téléchargement et insertion dans le dossier de destination)
        // Chemin de destination pour enregistrer l'image
        //$destination = $_SERVER['DOCUMENT_ROOT'] . 'include/' . uniqid() . basename($image['name']);

        $destination = 'include/' . $image['name'];



// Déplacer l'image téléchargée vers le dossier de destination
if(move_uploaded_file($image['tmp_name'], $destination)) {

            // Insertion des données dans la base de données
            $sqlState = $pdo->prepare('INSERT INTO produit(categorie, image_produit, nom_produit, prix, description, promotion) VALUES(?,?,?,?,?,?)');
            $sqlState->execute([$categorie, $destination, $nom_produit, $prix, $description, $promotion]);
?>
            <!-- Conteneur pour la superposition -->
            <div class="overlay">
                <div class="close-icon" onclick="closeOverlay()">&times;</div>
                <div class="product-info-container">
                    <h3>Produit ajouté avec succès :</h3>
                    <p>Nom du produit : <?php echo $nom_produit; ?></p>
                    <p>Description : <?php echo $description; ?></p>
                    <p>Image : <img src="<?php echo $destination; ?>" alt="Image du produit"></p>
                    <p>Prix : <?php echo $prix; ?></p>
                    <p>Catégorie : <?php echo $categorie; ?></p>
                    <p>Promotion : <?php echo $promotion; ?></p>
                </div>
            </div>
            <!-- Interface de la page -->
            <div class="page-interface">
                <!-- Ajoutez ici le contenu de votre interface de page -->
            </div>
<?php
        } else {
            echo "Une erreur s'est produite lors du téléchargement de l'image.";
        }
    } else {
?>
        <div class="alert alert-danger my-2" role="alert">
            Tous les champs sont obligatoires.
        </div>
<?php
    }
}

?>

<body>
    <h2 class="my-2">Ajouter Produit</h2>
    <form action="ajouter_produit.php" method="post" enctype="multipart/form-data">
        <label for="nom_produit">Nom du Produit:</label><br>
        <input type="text" id="nom_produit" name="nom_produit" required><br><br>

        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image_produit" accept="image/*" required><br><br>

        <label for="prix">Prix:</label><br>
        <input type="number" id="prix" name="prix" min="0" step="0.5" required><br><br>

        <label for="promotion">Promotion:</label><br>
<div class="range-container">
    <input type="range" id="promotion" name="promotion" min="0" step="0.5" max="90" required>
    <span id="promotion-value">0%</span>
</div><br><br>

        <label for="categorie">Catégorie:</label><br>
        <select name="categorie" id="categorie" required>
            <option value="">Choisissez une catégorie</option>
            <?php
            $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
            foreach ($categories as $categorie ){
                echo "<option value='".$categorie['id']."'>".$categorie['labeler']."</option>";
            }
            ?>
        </select><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
       <input  type="submit" name="submit" value="Ajouter Produit">
    </form>
    <script>
        // Sélection de l'élément range et de l'élément pour afficher le pourcentage
var rangeInput = document.getElementById('promotion');
var rangeValue = document.getElementById('promotion-value');

// Mettre à jour la valeur du pourcentage lors du déplacement du curseur
rangeInput.addEventListener('input', function() {
    var value = rangeInput.value;
    rangeValue.textContent = value + '%';
});

    </script>
</body>
</html>


