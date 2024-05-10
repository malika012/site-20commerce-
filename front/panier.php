<?php
ob_start();
include '../include/front_nav.php';
?>
<?php
//session_start();
require_once '../include/database.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Panier</title>
    <style>
   .col .style{
   margin-left:10px;
   }        
    </style>
</head>
<body>
    <div class="container py-2">
        <h4 class="text-center">Panier</h4>
        <div class="row">
            <?php

            $idclient = $_SESSION['client']['id'];
            $panier = $_SESSION['panier'][$idclient];
            if(isset($_POST['vider'])){
                $_SESSION['panier'][$idclient]=[];
                header('location:panier.php');
            }
            
    
           if(empty($panier)){
            ?>
            <div class="alert alert-warning" role="alert">
                Votre panier est vide
            </div>
            <?php
           }
           else{
            $idProduits = array_keys($panier);
            // Créer une chaîne de placeholders pour les ID de produits
            $placeholders = rtrim(str_repeat('?,', count($idProduits)), ',');

            // Préparer la requête SQL avec les placeholders
            $sqlState = $pdo->prepare("SELECT * FROM produit WHERE id_produit IN ($placeholders)");

            // Exécuter la requête avec les ID de produits comme paramètres
            $sqlState->execute($idProduits);

            // Récupérer les résultats de la requête
            $produits = $sqlState->fetchAll(PDO::FETCH_OBJ);
           
           
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nom_produit</th>
                        <th scope="col me-2">Image</th>
                        <th scope="col">Prix</th>
                        <th scope="col style">Quantité</th>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach($produits as $produit){
                        $idProduit = $produit->id_produit;
                        $quantite = $panier[$idProduit];
                        $totalProduit = $produit->prix * $quantite;
                        $total += $totalProduit;
                        ?>
                        <tr>
                            <td><?php echo $produit->nom_produit;?></td>
                            <td><img src="../<?php echo $produit->image_produit?>" alt="Image du produit" style="max-width: 100px; height: auto;"></td>
                            <td><?php echo $produit->prix;?> DH</td>
                            <td>
                                <div class="counter">
                                    <button onclick="incrementQuantity(this); return false;" class="btn btn-primary mx-2">+</button>    
                                    <input type="hidden" name="id" value="<?php echo $idProduit?>">
                                    <input  style="max-width: 100px; height: auto;" class="form-control form-control-sm" type="number" name="qty" id="qty" max="99" value="<?php echo $quantite?>">
                                    <button onclick="decrementQuantity(this); return false;" class="btn btn-primary mx-2">-</button>
                                </div>
                            </td>
                            <td><?php echo $totalProduit;?> DH</td>
                            <td>
                                <form method="post" action="ajouterpanier.php">
                                    <input type="hidden" name="id" value="<?php echo $idProduit?>">
                                    <input type="hidden" name="qty" value="<?php echo $quantite?>">
                                    <button class="btn btn-success" type="submit" name="ajouter">
                                    <?php echo ($quantite == 0) ? '<i class="fas fa-plus"></i>' : '<i class="fas fa-edit"></i>'; ?></button>

                                </form>
                                <form method="post" action="supprimer_panier.php">
                                    <input type="hidden" name="id" value="<?php echo $idProduit?>">
                                    <button type="submit" class="btn btn-danger" name="supprimer"><i class="fas fa-trash-alt"></i></button>

                                </form>
                            </td>
                            
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" align="right"><strong>Total</strong></td>
                        <th><?php echo $total;?> DH</th>
                        
                    </tr>
                    
                </tfoot>
            </table>
            <div class="text-center">
            <form action="valider_commande.php" method="post">

                    <input type="submit" class="btn btn-success" name="valider" value="Valider la commande">
                </form>
                <form method="post">
                    <input onclick="return confirm('Voulez-vous vraiment vider le panier ?')" type="submit" class="btn btn-danger" name="vider" value="Vider le panier">
                </form>
            </div>
            <?php
           }
            ?>
        </div>
    </div>
    <script>
    // Fonction pour incrémenter la quantité
    function incrementQuantity(button) {
        var quantityInput = button.parentElement.querySelector('.form-control');
        var currentQuantity = parseInt(quantityInput.value);
        if (currentQuantity < 99) {
            quantityInput.value = currentQuantity + 1;
            updateTotals(); // Mettre à jour les totaux lorsque la quantité est modifiée
        }
    }

    // Fonction pour décrémenter la quantité
    function decrementQuantity(button) {
        var quantityInput = button.parentElement.querySelector('.form-control');
        var currentQuantity = parseInt(quantityInput.value);
        if (currentQuantity > 0) {
            quantityInput.value = currentQuantity - 1;
            updateTotals(); // Mettre à jour les totaux lorsque la quantité est modifiée
        }
    }

    // Fonction pour mettre à jour les totaux
    function updateTotals() {
        var productRows = document.querySelectorAll('tbody tr');
        var total = 0;
        productRows.forEach(function(row) {
            var price = parseFloat(row.querySelector('td:nth-of-type(3)').textContent);
            var quantity = parseInt(row.querySelector('.form-control').value);
            var productTotal = price * quantity;
            row.querySelector('td:nth-of-type(5)').textContent = productTotal.toFixed(2) + " DH";
            total += productTotal;
        });
        document.querySelector('tfoot th').textContent = total.toFixed(2) + " DH";
    }

    // Ajouter un gestionnaire d'événements pour détecter les changements de quantité
    document.querySelectorAll('.form-control').forEach(function(input) {
        input.addEventListener('change', function() {
            updateTotals(); // Mettre à jour les totaux lorsque la quantité est modifiée
        });
    });
</script>


</body>
</html>
