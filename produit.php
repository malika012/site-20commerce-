<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Liste des produits</title>
</head>
<body>
<?php
ob_start();
include 'include/nav.php'?>
<div class="container py-2">
    <?php 
     
   //session_start(); 
   if(!isset($_SESSION['utilisateur'])) {
      
         header('location:connexion.php');
   } 

   ?>
  <div class="alert bg-antiquewhite d-flex align-items-center" role="alert">
    <h6 class="mb-0">
    Bonjour, <i class="fa-solid fa-hands-clapping alert  "></i><?php echo $_SESSION['utilisateur']['nom'], ' ', $_SESSION['utilisateur']['prenom']; ?>
    </h6>
</div>



<h3 class="my-2 py-5"> Liste des produits</h3>

<a href="ajouter_produit.php" class="btn btn-primary"> Ajouter Produit</a>
<table class="table table-striped table-hover my-2">
    
  <tr>
  <th>#ID</th>
  <th>Catégorie</th>
  <th>Image</th>
  <th>Nom du produit</th>
  <th>Prix</th>
  <th>Description</th>
  <th>Date</th>
  <th>Promotion</th>
  <th>Options</th>
  </tr>

  <?php
require_once 'include/database.php';
$produits = $pdo->query('SELECT produit.*, categorie.labeler AS categorie_label FROM produit INNER JOIN categorie ON produit.categorie = categorie.id')->fetchAll(PDO::FETCH_ASSOC);
foreach ($produits as $produit) {
?>

     <tr>
  <td><?php echo $produit['id_produit']?></td>
  <td><?php echo $produit['categorie_label']?></td>
  <td><img src="<?php echo $produit['image_produit']?>" alt="Image du produit" style="max-width: 100px; height: auto;"></td>

  <td><?php echo $produit['nom_produit']?></td>
  <td><?php echo $produit['prix'] ?>DH</td>
  <td><?php echo $produit['description']?></td>
  <td><?php echo $produit['date_cration']?></td>
  <td><?php echo $produit['promotion']?>%</td>
  <td>
  <a href="modifier_produit.php?id=<?php echo $produit['id_produit']?>" class="btn btn-primary btn-sm ">Modifier</a>
    <a href="suprimer_produit.php?id_produit=<?php echo $produit['id_produit']?>" onclick="return confirm('Voulez vous vraiment suprimer le produit <?php echo $produit['nom_produit']?>');" class="btn btn-danger btn-sm">Supprimie</a>
   
  </td>
  </tr>

<?php
} // Fin de la boucle foreach
?>
</table>
</body>
</html>
