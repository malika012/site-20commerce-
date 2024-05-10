<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>connection</title>
</head>
<body>
<?php
ob_start();
include '../include/front_nav.php';
?>

<div class = "container">
  <?php
  if(isset($_POST['connexion'])){
    $email = $_POST['adress'];
    $pwd = $_POST['password'];
    if(!empty($email) && !empty($pwd)){
      require_once '../include/database.php';
      $sqlState = $pdo->prepare('SELECT * FROM client
                                  WHERE adress =?
                                  AND password=?');
     $sqlState->execute([$email,$pwd]);
     if($sqlState->rowCount()>=1){
     //Session_start();
   $_SESSION['client'] = $sqlState->fetch();
   header('location: index.php');
     }
     else{

   
      ?>
      <div class="alert alert-danger my-2" role="alert">
      email ou password incorrectes.
    </div>
    <?php
    }
    }
    else{

   
  ?>
  <div class="alert alert-danger my-2" role="alert">
  password , email sont obligatoire
</div>
<?php
}
  }
  
  if(isset($_POST['ajouter'])){
   
  header('location: creier.php');
  }
 
  ?>
 
<form method="post">
<h4 class="my-4">Connexion</h4> 
  <div class="mb-3">
  
    <label for="exampleInputEmail1" class="form-label">Email address </label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="adress">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password </label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">

  </div>
  <div>
 
  <input type="submit" value="Connexion" class="btn btn-primary my-2" name="connexion" >
  
  <a href="creier.php"><input  type="submit" value="Crée un compte" class="btn btn-primary my-2" name="ajouter" ></a>
  
</form>
</div>


</body>
</html>
