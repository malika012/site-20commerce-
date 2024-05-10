<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Catégorie</title>
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
<body>
</head>
<?php
ob_start();
include 'include/nav.php';
?>

    <h2>Modifier Catégorie</h2>
<?php
require_once 'include/database.php';
$sqlStart= $pdo->prepare('SELECT * FROM categorie WHERE id=?');
$id = $_GET['id'];
$sqlStart->execute([$id]);

$category = $sqlStart->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['modifier'])){

      // Récupération des données du formulaire
      $nom_categorie = $_POST['labeler'];
      $description = $_POST['description'];
      $icon = $_POST['icon'];
      // Vérification de la présence de toutes les données nécessaires
      if(!empty($nom_categorie) && !empty($description) && !empty($icon)){
         
          // Insertion des données dans la base de données
          $sqlState = $pdo->prepare('UPDATE categorie
                          SET labeler = ?,
                              description = ?,
                              icon = ?
                          WHERE id = ?
                         ');
$sqlState->execute([$nom_categorie, $description,$icon, $id]);

            header('location: categoris.php');
          // Affichage des informations de la catégorie ajoutée
      }
     } ?>

    <form  method="post">
    <div>
            <input type="hidden" id="libelle" name="id" required  value="<?php echo $category['id']?>" ><br>
        </div>
        <div>
            <label for="libelle">Libellé :</label><br>
            <input type="text" id="libelle" name="labeler" required value="<?php echo $category['labeler']?>"><br>
        </div>
       
        <div>
            <label for="description">Description :</label><br>
            <textarea id="description" name="description" rows="4" cols="50" required><?php echo $category['description']?></textarea><br>
        </div>
        <div>
            <label for="icon">icon :</label><br>
            <input id="icon" name="icon" required value="<?php echo $category['icon']?>"><br>
        </div>
        <div>
            <input name='modifier' type="submit" value="Modifier Catégorie">
        </div>
    </form>
</body>
</html>