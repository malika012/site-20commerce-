<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Livraison</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container py-5">
        <h2 class="text-center">Confirmation de Livraison</h2>
        <?php
        require_once '../include/database.php';
        $livraisons = $pdo->query('SELECT * FROM livraison')->fetchAll(PDO::FETCH_ASSOC);

        // Vérifier si des données de livraison ont été trouvées
        if ($livraisons) {
            // Boucler sur les résultats
            foreach ($livraisons as $livraison) {
                ?>
                <div class="alert alert-success" role="alert">
                    Votre commande sera livrée à l'adresse suivante :
                    <br>
                    <strong>Nom :</strong> <?php echo $livraison['nom']; ?>
                    <br>
                    <strong>Adresse :</strong> <?php echo $livraison['adresse']; ?>
                    <br>
                    <strong>Ville :</strong> <?php echo $livraison['ville']; ?>
                    <br>
                    <strong>Code Postal :</strong> <?php echo $livraison['code_postal']; ?>
                </div>
                <?php
            }
        } else {
            // Afficher un message si aucune donnée de livraison n'est trouvée
            echo '<div class="alert alert-warning" role="alert">Aucune information de livraison trouvée.</div>';
        }
        ?>
        <div class="text-center">
            <a href="accuil.php" class="btn btn-primary">Retour à l'accueil</a>
        </div>
    </div>
</body>
</html>
