<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-QAtzIAvzA+UWSDV9nXHWKkh1n/Xf/j4Ah2FbIjw6E2imt9QehOsLH4x+Woy9d/GyXfOVX6R3rBRWYRWkm8FNTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css" integrity="sha384-Jqo5g7bMDYL8v4FjX4xvfDC/rxD0lz67yZYpSQijfwEg/K43cQyVgVVDQvHOmYtv" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
<div> 
    <?php
    $idclient = $_SESSION['client']['id'];
    $qty = isset($_SESSION['panier'][$idclient][$idProduit]) ? $_SESSION['panier'][$idclient][$idProduit] : 0;
    ?>
    <form method="post" class="counter d-flex" action="ajouterpanier.php">
        <button onclick="return false;" class="btn btn-primary mx-2">+</button>
        <input type="hidden" name="id" value="<?php echo $idProduit?>">
        <input class="form-control" type="number" name="qty" id="qty" max="99" value="<?php echo $qty?>">
        <button onclick="return false;" class="btn btn-primary mx-2">-</button>
        <!--<input class="btn btn-success" type="submit" value="<?php echo $button; ?>" name="ajouter"-->
        <?php
        if ($qty == 0) {
            ?>
           <button class="btn btn-success" type="submit" name="ajouter"> <i class="fas fa-plus"></i></button>
    
    
            <?php
        } else {
            ?>
            <button type="submit" class="btn btn-success " name="ajouter" ><i class="fas fa-pencil-alt"></i></button>
<?php
        }
        if($qty != 0){
        ?>
           <button formaction="supprimer_panier.php" class="btn btn-danger mx-2 c" type="submit" name="supprimer">
    <i class="fas fa-trash-alt"></i>
</button>

        <?php
        }
        ?>
    </form>
</div>

<style>
    #qty {
        width: 5rem;
    }

    .counter {
        width: 50%;
        margin: 0 auto;
        margin-right: 500px;
    }

    .btn {
        width: 100px;
    }

    .btn-danger {
        margin-left: 10px; /* Ajuster la marge pour positionner le bouton "Supprimer" */
        width: auto;
        margin-top:0px; /* Définir la largeur automatique pour s'adapter au contenu */
    }
</style>
