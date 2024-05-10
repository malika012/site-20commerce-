


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modifier Produit</title>
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
}
    </style>
</head>
<body>
<?php
ob_start();
include 'include/nav.php';
?>
    <h2 class="my-2">Modifier Produit</h2>
    <?php
    require_once 'include/database.php';

    $sqlStart = $pdo->prepare('SELECT * FROM produit WHERE id_produit=?');
    $id = $_GET['id'];
    $sqlStart->execute([$id]);
    $produits = $sqlStart->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST['modifier'])){
        $nom_produit = $_POST['nom_produit'];
        $description = $_POST['description'];
        $image = $_FILES['image_produit']['name'];
        $prix = $_POST['prix'];
        $promotion = $_POST['promotion'];
        $categorie = $_POST['categorie'];

        // Assurez-vous que le répertoire de destination existe
        $destination = 'include/' . $image; // Chemin relatif par rapport au répertoire de votre fichier database.php


        // Déplacez le fichier téléchargé vers le répertoire de destination
        if(move_uploaded_file($_FILES['image_produit']['tmp_name'], $destination)) {
            // Si le déplacement réussit, exécutez la mise à jour dans la base de données
            $sqlState = $pdo->prepare('UPDATE produit
                                       SET nom_produit = ?,
                                           description = ?,
                                           image_produit = ?,
                                           prix = ?,
                                           promotion = ?,
                                           categorie = ?
                                       WHERE id_produit = ?');
            $sqlState->execute([$nom_produit, $description, $destination, $prix, $promotion, $categorie, $id]);
            header('location: produit.php');
        } else {
            echo "Erreur lors du déplacement du fichier.";
        }
    }
    ?>

    <form method="post" enctype="multipart/form-data">
        <input type="hidden" id="id_produit" name="id_produit" required value="<?php echo $produits['id_produit']; ?>"><br> <!-- Ajout d'un champ caché pour l'ID du produit -->
        <label for="nom_produit">Nom du Produit:</label><br>
        <input type="text" id="nom_produit" name="nom_produit" required value="<?php echo $produits['nom_produit']; ?>"><br><br>

        <label for="image">Image actuelle:</label><br>
        <img src="<?php echo $produits['image_produit']; ?>" alt="Image actuelle" style="max-width: 200px; max-height: 200px;"><br><br>

        <label for="image_produit">Nouvelle image:</label><br>
        <input type="file" id="image_produit" name="image_produit" accept="image/*" required><br><br>

        <label for="prix">Prix:</label><br>
        <input type="number" id="prix" name="prix" min="0" step="0.01" required value="<?php echo $produits['prix']; ?>"><br><br>

        <label for="promotion">Promotion:</label><br>
        <input type="number" id="promotion" name="promotion" min="0" step="0.01"  value="<?php echo $produits['promotion']; ?>"><br><br>

        <select name="categorie" id="categorie" required>
            <option value="">Choisissez une catégorie</option>
            <?php
            $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
            foreach ($categories as $categorie) {
                $selected = ($categorie['id'] == $produits['categorie']) ? 'selected' : '';
                echo "<option value='".$categorie['id']."' $selected>".$categorie['labeler']."</option>";
            }
            ?>
        </select><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required><?php echo $produits['description']; ?></textarea><br><br>

     <input name="modifier" type="submit" value="Modifier Produit">
        
    </form>
</body>
</html>




