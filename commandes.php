<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>liste des Commandes</title>
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
<h4 class="my-2 me-2 control-center"> Liste des Cammandes</h4>

<a href="ajouter_categorie.php" class="btn btn-primary my-2 py-2 me-2"> Ajouter Categorie</a>
<table class="table table-striped table-hover my-2">
    
  <tr>
  <th>#ID</th>
  <th>Client</th>
  <th>Total</th>
  <th>date</th>
  <th></th>
  <th></th>
  </tr>

<?php
require_once 'include/database.php';
$commandes = $pdo->query('SELECT commandes.*, client.nom AS "NOM", client.prenom AS "PRENOM" FROM commandes INNER JOIN client ON commandes.id_client = client.id ORDER BY commandes.date DESC')->fetchAll(PDO::FETCH_ASSOC);

foreach ($commandes as $commande) {
    ?>
    <tr>
        <td><?php echo $commande['id']?></td>
        <td><?php echo $commande['NOM'] . ' ' . $commande['PRENOM']?></td>
        <td><?php echo $commande['total']?> DH</td>
        <td><?php echo $commande['date']?></td>
        <td><a href="command.php?id=<?php echo $commande['id']?>" class="btn btn-primary btn-sm">Afficher détails</a></td>
       <td><a href="supprimer_commande.php?id=<?php echo $commande['id']?>" onclick="return confirm('Voulez vous vraiment suprimer la commande de <?php echo $commande['NOM'] . ' ' . $commande['PRENOM']?>');" class="btn btn-danger btn-sm">Supprimie</a>
</td> 
      </tr>

    <?php
}?>
</table>