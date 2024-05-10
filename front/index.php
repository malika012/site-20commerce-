<?php
ob_start();
include '../include/front_nav.php';
//session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <body>
    <div class="container py-2"></div>
    <h4 class="text-center"> <i class=" fa fa-solid fa-list py-2 my-2 me-2"></i>Liste des categorie</h4>

<?php
require_once '../include/database.php';
if(!isset($_SESSION['client'])) {
      
  header('location:connecter.php');
} 
$categories  = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO:: FETCH_OBJ);
?>
  <ul class="list-group">
  <?php
  foreach($categories as $categorie){
?>
<li class="list-group-item me-2 md-2 ">
  <a class="btn btn-light" href="categorie.php?id=<?php echo $categorie->id ?>">
  <i class=" fa me-2 <?php echo $categorie->icon ?> "></i><?php echo $categorie->labeler ?>
  </a>  
  </li>
<?php
  }
  ?>
</ul>
  </body>