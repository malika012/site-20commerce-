<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>liste des categorie</title>
</head>
<body>
<body>
<?php
ob_start(); 
include 'include/nav.php'?>
<div class="container py-2">
    <?php 
     
   //session_start(); 
   if(!isset($_SESSION['utilisateur'])) {
      
         header('location: connexion.php');
   } 

   ?>
    <h6><i class="fa-solid fa-hands-clapping alert "></i> Hi :<?php 
   echo $_SESSION['utilisateur']['nom'], ' ', $_SESSION['utilisateur']['prenom'];
   
?>
</h6>
</div>
<h4 class="my-2 me-2 control-center"> Liste des categorie</h4>

<a href="ajouter_categorie.php" class="btn btn-primary my-2 py-2 me-2"> Ajouter Categorie</a>
<table class="table table-striped table-hover my-2">
    
  <tr>
  <th>#ID</th>
  <th>libelie</th>
  <th>Description</th>
  <th>date</th>
  <th>icon</th>
  <th>option</th>
  </tr>

<?php
require_once 'include/database.php';
$categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
foreach ($categories as $categorie){
    ?>
     <tr>
  <td><?php echo $categorie['id']?></td>
  <td><?php echo $categorie['labeler']?></td>
  <td><?php echo $categorie['description']?></td>
  <td><?php echo $categorie['dat_criation']?></td>
  <td><i class="fa <?php echo $categorie['icon']?>"></i></td>
  <td>
    <a href="modifier_categorie.php?id=<?php echo $categorie['id']?>" class="btn btn-primary btn-sm ">Modifier</a>
    <a href="suprimer_categorie.php?id=<?php echo $categorie['id']?>" onclick="return confirm('Voulez vous vraiment suprimer la categorée <?php echo $categorie['labeler']?>');" class="btn btn-danger btn-sm">Supprimie</a>
  </td>
  </tr>
    <?php
}?>
</table>