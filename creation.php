<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Crée le compte</title>
</head>
<body>
<?php
ob_start();
include 'include/nav.php'?>
<div class="container">
    <?php 
    if(isset($_POST['ajouter'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        if(!empty($nom) && !empty( $prenom) && !empty( $pwd ) && !empty( $tel ) && !empty( $email) && !empty($pwd )){
         
        require_once 'include/database.php'; 
        $date = date( 'Y-m-d');
        $sqlState = $pdo->prepare('INSERT INTO utilisateur VALUES(null,?,?,?,?,?,?)');

        $sqlState->execute([$nom,$prenom,$email,$tel,$pwd,$date]);
        header('location: produit.php');
       
        }else{
          ?>
          <div class="alert alert-danger my-2" role="alert">
          nom , prenom , password , télephone , email sont obligatoire
</div>

          <?php
          
        }
    }
    
        ?>
        <div class = "container">
<form method="post">
    
  <div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Nom *</label>
    <input type="nom" class="form-control"   name="nom">
    <label for="exampleInputEmail1" class="form-label">Prenom *</label>
    <input type="prenom" class="form-control"   name="prenom">
    <label for="exampleInputEmail1" class="form-label">Télephone</label>
    <input type="nombre" class="form-control" name="tel">
    <label for="exampleInputEmail1" class="form-label">Email address *</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password *</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <input type="submit" value="Crée un compte" class="btn btn-primary my-2" name="ajouter" >
  
</form>
</div>


</body>
</html>