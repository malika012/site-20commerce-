<?php
session_start();
require_once '../include/database.php';
require_once '../SendMail-1.3.0/send_email.php'; // Inclure le fichier qui contient la fonction sendConfirmationEmail()

// Récupérer l'ID de la commande depuis l'URL ou d'où vous le récupérez
$id_client = $_GET['id']; // Par exemple, récupéré à partir de l'URL

// Récupérer le total de la commande depuis la base de données
$requete_commande = $pdo->prepare("SELECT total FROM commandes WHERE id = ?");
$requete_commande->execute([$id_client]);
$total_commande = $requete_commande->fetchColumn();
$requete_commande->closeCursor();
// Récupérer l'ID du client associé à la commande depuis la base de données
$requete_client = $pdo->prepare("SELECT id_client FROM commandes WHERE id = ?");
$requete_client->execute([$id_client]);
$id_commande = $requete_client->fetchColumn();
$requete_client->closeCursor();

// Appeler la fonction sendConfirmationEmail() avec les informations nécessaires
sendConfirmationEmail($total_commande, $id_client);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de commande</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container py-5">
        <div class="text-center mb-4">
            <h2>Confirmation de commande</h2>
        </div>
        <div class="alert alert-success" role="alert">
            Votre commande a été validée avec succès. Un email de confirmation vous a été envoyé. Merci !
            Le montant total de votre commande est <?php echo $total_commande; ?> DH.
        </div>

            <div class="text-center">
        <a href="accuil.php" class="btn btn-primary">Retour à l'accueil</a>
        <!-- Bouton pour le paiement en ligne -->
        <a href="paiement.php?id_commande=<?php echo $id_client?>" class="btn btn-success">Paiement en ligne</a>
        <!-- Bouton pour la livraison -->
        <a href="livraison.php?id_commande=<?php echo $id_client?>" class="btn btn-info">Livraison</a>

        </div>
    </div>
</body>
</html>
