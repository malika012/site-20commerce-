<?php
ob_start();
include '../include/front_nav.php';
?>
<?php
//session_start();
require_once '../include/database.php';
$id = $_GET['id'];
$sqlStat  = $pdo->prepare("SELECT * FROM categorie WHERE id=?");
$sqlStat->execute([$id]);
$categorie = $sqlStat->fetch(PDO::FETCH_ASSOC);

$sqlStat = $pdo->prepare("SELECT * FROM produit WHERE categorie=?");
$sqlStat->execute([$id]);
$produits = $sqlStat->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Categorie | <?php echo $categorie['labeler']?></title>
  <style>
    .container .py-2 {
        max-height: 200px; /* Ajuster la hauteur des images */
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Ajouter une transition pour le mouvement et l'ombre */
    }

    .card:hover {
        transform: scale(1.05); /* Zoom sur la carte au survol */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Ajouter une ombre portée au survol */
    }
</style>

</head>
<body>
    <div class="container py-2" >
        <h4 class="text-center"><span class="fa <?php echo $categorie['icon'] ?>"></span> <?php echo $categorie['labeler']?></h4>
        <div class="row">
            <?php foreach($produits as $produit):
                $idProduit = $produit->id_produit;
                ?>

                <div class="card col-md-3 me-2">
                    <img  src="../<?php echo $produit->image_produit ?>" class="card-img-top" alt="Image du produit">
                    <div class="card-body">
                    <a href="produit.php?id=<?php echo   $idProduit ?>" class="btn stretched-link">Afficher détails</a>

                        <h5 class="card-title"><?php echo $produit->nom_produit ?></h5>
                        <!--p class="card-text"><?php/* echo $produit->description*/ ?></p-->
                        <p class="card-text"><small class="text-muted">Ajouter le: <?php echo date_format(date_create($produit->date_cration),'Y/m/d') ?></small></p>
                       </div>
                <div class="card-footer "style="z-index:10">
                <?php include '../include/front/counter.php'?>
                
                </div>
                </div>
            <?php endforeach; ?>
            
            </div>
            <?php if(empty($produits)): ?>
                <div class="alert alert-info my-2 text-center" role="alert">
                    Pas de Produit pour l'instant
                </div>
            <?php endif; ?>
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

        

