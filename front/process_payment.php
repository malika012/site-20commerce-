
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Paiement</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        /* Styles pour le conteneur du message de confirmation */
.container-message {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

/* Styles pour le message de confirmation */
.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
    padding: .75rem 1.25rem;
    margin-bottom: 20px;
}

/* Styles pour le bouton de retour à l'accueil */
.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #0056b3;
}

    </style>
<?php
// Vérification des données reçues du formulaire de paiement
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['payer'])) {
    // Récupération des données du formulaire
    $cardholder_name = $_POST['cardholder_name']; // Nom du titulaire de la carte
    $card_number = $_POST['card_number']; // Numéro de carte
    $expiry_date = $_POST['expiry_date']; // Date d'expiration (format YYYY-MM)
    $cvv = $_POST['cvv']; // Code de sécurité (CVV)

    // Traitement du paiement
    // Insérez ici votre logique de traitement de paiement, par exemple, enregistrer la transaction dans la base de données, contacter un service de paiement en ligne, etc.

    // Exemple : Enregistrement de la transaction dans la base de données
    require_once '../include/database.php'; // Inclure le fichier de connexion à la base de données si nécessaire
    $pdo->prepare("INSERT INTO transactions (cardholder_name, card_number, expiry_date, cvv) VALUES (?, ?, ?, ?)")->execute([$cardholder_name, $card_number, $expiry_date, $cvv]);

    // Affichage d'un message de succès
    echo "<div class='container-message py-5'>";
    echo "<div class='alert alert-success' role='alert'>";
    echo "Votre paiement a été effectué avec succès.";
    echo "</div>";
    echo "<div class='text-center'>";
    echo "<a href='accueil.php' class='btn btn-primary'>Retour à l'accueil</a>";
    echo "</div>";
    echo "</div>";
    
} else {
    // Redirection si la requête n'est pas de type POST ou si le bouton de paiement n'est pas cliqué
    header("Location: paiement.php");
    exit();
}
?>
