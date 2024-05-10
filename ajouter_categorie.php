<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Catégorie</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0%;
    padding: 0%;
}

h2 {
    color: #333;
}

form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

label {
    font-weight: bold;
    color: #333;
}

input[type="text"],
textarea,
input[type="date"],
input[type="submit"] {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

textarea {
    height: 100px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

input[type="submit"]:focus {
    outline: none;
}
.overlay {
    position: fixed;
    top: 25%;
    left: 25%;
    right: auto;
    width: 50%;
    height: 50%;
    background-color:#a9a9a9 ;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.close-icon {
    position: absolute;
    top: 0px;
    right: 10px;
    cursor: pointer;
    font-size: 24px;
    color: #fff;
}
#icon{
    width:100%;
    height: 50px;
}

</style>

<script>
    function closeOverlay() {
    var overlay = document.querySelector('.overlay');
    overlay.style.display = 'none';
}
</script>
<body>
<?php
if(isset($_POST['submit'])){
    // Récupération des données du formulaire
    $nom_categorie = $_POST['labeler'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];

    // Vérification de la présence de toutes les données nécessaires
    if(!empty($nom_categorie) && !empty($description) && !empty($icon)){
        require_once 'include/database.php'; // Inclure le fichier de configuration de la base de données

        // Insertion des données dans la base de données
        $sqlState = $pdo->prepare('INSERT INTO categorie(labeler, description,icon) VALUES(?, ?,?)');
        $sqlState->execute([$nom_categorie, $description, $icon]);
       
        // Affichage des informations de la catégorie ajoutée
        ?>
        <!-- Conteneur pour la superposition -->
        <div class="overlay">
            <div class="close-icon" onclick="closeOverlay()">&times;</div>
            <div class="category-info-container">
                <h3>Catégorie ajoutée avec succès :</h3>
                <p>Nom de la catégorie : <?php echo $nom_categorie; ?></p>
                <p>Description : <?php echo $description; ?></p>
                <p> icon : <?php echo $icon; ?></p>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-danger my-2" role="alert">
            Tous les champs sont obligatoires.
        </div>
        <?php
    }
}
?>
</head>
<?php include 
//ob_start();
'include/nav.php'?>
    <h2>Ajouter Catégorie</h2>
    <form action="ajouter_categorie.php" method="post">
        <div>
            <label for="libelle">Libellé :</label><br>
            <input type="text" id="libelle" name="labeler" required><br>
        </div>
        <div>
            <label for="description">Description :</label><br>
            <textarea id="description" name="description" rows="4" cols="50" required></textarea><br>
        </div>
        <div>
            <label for="icon">icon :</label><br>
            <input id="icon" name="icon" required><br>
        </div>
        <div>
            <input name='submit' type="submit" value="Ajouter Catégorie">
        </div>
    </form>
</body>
</html>
