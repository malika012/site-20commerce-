<?php
session_start();
require_once '../include/database.php';

// Vérifier si l'ID de la commande est passé en tant que paramètre dans l'URL
if (isset($_GET['id'])) {
    // Récupérer l'ID de la commande depuis l'URL
    $id_commande = $_GET['id'];

    // Récupérer les détails de la commande depuis la base de données en utilisant l'ID de la commande
    $requete_commande = $pdo->prepare("SELECT * FROM commandes WHERE id = ?");
    $requete_commande->execute([$id_commande]);
    $commande = $requete_commande->fetch(PDO::FETCH_ASSOC);
    $requete_commande->closeCursor();

    // Vérifier si la commande existe
    if ($commande) {
        // Afficher les détails de la commande et un message de confirmation
        $total_commande = $commande['total'];
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Confirmation de Paiement</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        </head>
        <body>
            <div class="container py-5">
                <div class="text-center mb-4">
                    <h2>Confirmation de Paiement</h2>
                </div>
                <div class="alert alert-success" role="alert">
                    Votre paiement a été effectué avec succès. Merci !
                    Le montant total de votre commande est <?php echo $total_commande; ?> DH.
                </div>
                <div class="text-center">
                    <a href="accuil.php" class="btn btn-primary">Retour à l'accueil</a>
                </div>
            </div>
        </body>
        </html>
        <?php
    } else {
        // Si la commande n'existe pas, afficher un message d'erreur
        echo "Erreur : Commande non trouvée.";
    }
} else {
    // Si l'ID de la commande n'est pas passé dans l'URL, afficher un message d'erreur ou rediriger l'utilisateur vers une autre page
    echo "Erreur : ID de commande non spécifié.";
}
?>
