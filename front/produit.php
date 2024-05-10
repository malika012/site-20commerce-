<?php
ob_start();
include '../include/front_nav.php';
?>
<?php
//session_start();
require_once '../include/database.php';
$id = $_GET['id'];
$sqlStat  = $pdo->prepare("SELECT * FROM produit WHERE id_produit=?");
$sqlStat->execute([$id]);
$produit = $sqlStat->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Produit | <?php echo $produit['nom_produit']?></title>
    <style>
        .card {
            max-width: 100%;
            margin-bottom: 20px; /* Espacement entre chaque carte */
        }

        .card img {
            max-height: 200px; /* Ajuster la hauteur des images */
        }

        
    </style>
</head>
<body>
    <div class="container py-2">
    <div class="row">
        <?php
         $promotion = $produit['promotion'];
         $prix = $produit['prix'];
        ?>
   
            <div class="col-md-6">
            <h3><?php echo $produit['nom_produit']?></h3>
                <img class="img img-fluid w-75 py-5" src="../<?php echo $produit['image_produit']?>" alt="<?php echo $produit['nom_produit']?>">
            </div>
            <div class="col-md-6 ">

            <div class="d-flex align-items-center">
        <h1 class="w-100"> <?php echo $produit['nom_produit']?></h1>
        <?php if(!empty( $promotion))
                {
                    ?>
                    <h5>
                        <span class="badge text-bg-success">-<?php echo $promotion?>%</span>
                </h5>
                    <?php
                }?>
                </div>
                <hr>
                <h5>
                <?php echo $produit['description']?>
            </h5>
        <?php
       if(!empty($promotion)){
        $total = $prix -(($prix*$promotion)/100);?>
       <h5><span class="badge text-bg-danger"> <strike><?php echo $prix ?>DH</strike></span></h5>
         
         <h3> <span class="badge text-bg-success"><?php echo $total ?>DH</span></h3>
        <?php
        
        
       }else{
        $total = $prix;
        ?>
        <h3> <span class="badge text-bg-success"><?php echo $total ?>DH</span></h3> 
        <?php
       }
        ?>
        <hr>
        <?php
        $idProduit = $produit['id_produit'];
        include '../include/front/counter.php'?>
                <hr>
                
            </div>
           
        </div>
    </div>
<script>
// Sélection de tous les boutons + et -
var addButtonList = document.querySelectorAll('.counter .btn.btn-primary.mx-2:nth-of-type(1)');
var subtractButtonList = document.querySelectorAll('.counter .btn.btn-primary.mx-2:nth-of-type(2)');

// Ajouter un gestionnaire d'événements à chaque bouton +
addButtonList.forEach(function(addButton) {
    addButton.addEventListener('click', function() {
        incrementQuantity(this);
    });
});

// Ajouter un gestionnaire d'événements à chaque bouton -
subtractButtonList.forEach(function(subtractButton) {
    subtractButton.addEventListener('click', function() {
        decrementQuantity(this);
    });
});

// Fonction pour incrémenter la quantité
function incrementQuantity(button) {
    // Récupérer l'élément d'entrée de quantité associé au bouton cliqué
    var quantityInput = button.parentElement.querySelector('.form-control');
    
    // Récupérer la valeur actuelle de la quantité
    var currentQuantity = parseInt(quantityInput.value);
    
    // Vérifier si la valeur est valide (inférieure à 99)
    if (currentQuantity < 99) {
        // Incrémenter la quantité
        quantityInput.value = currentQuantity + 1;
    }
}

// Fonction pour décrémenter la quantité
function decrementQuantity(button) {
    // Récupérer l'élément d'entrée de quantité associé au bouton cliqué
    var quantityInput = button.parentElement.querySelector('.form-control');
    
    // Récupérer la valeur actuelle de la quantité
    var currentQuantity = parseInt(quantityInput.value);
    
    // Vérifier si la valeur est supérieure à 0
    if (currentQuantity > 0) {
        // Décrémenter la quantité
        quantityInput.value = currentQuantity - 1;
    }
}


   </script>
</body>
</html>
