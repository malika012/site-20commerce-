<?php
session_start();
require_once '../include/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['valider'])) {
    // Récupérer l'ID du client depuis la session
    $id_client = $_SESSION['client']['id'];

    // Récupérer les détails du panier depuis la session
    $panier = $_SESSION['panier'][$id_client];

    // Vérifier si le panier n'est pas vide
    if (!empty($panier)) {
        // Calculer le total de la commande
        $total_commande = 0;
        foreach ($panier as $id_produit => $quantite) {
            $requete_produit = $pdo->prepare("SELECT prix FROM produit WHERE id_produit = ?");
            $requete_produit->execute([$id_produit]);
            $prix_produit = $requete_produit->fetchColumn();
            $requete_produit->closeCursor();
            $total_commande += $prix_produit * $quantite;
        }

        // Insérer la commande dans la table "commandes"
        $date_commande = date("Y-m-d");
        $requete_commande = $pdo->prepare("INSERT INTO commandes (id_client, total, date) VALUES (?, ?, ?)");
        $requete_commande->execute([$id_client, $total_commande, $date_commande]);
        $id_commande = $pdo->lastInsertId(); // Récupérer l'ID de la commande insérée
        $requete_commande->closeCursor();

        // Insérer les détails de la commande dans la table "details_commande"
        foreach ($panier as $id_produit => $quantite) {
            $requete_insert_detail = $pdo->prepare("INSERT INTO ligne_commande (id_commande, id_produit, prix, date, quantite, total) VALUES (?, ?, ?, ?, ?, ?)");
            $requete_insert_detail->execute([$id_commande, $id_produit, $prix_produit, $date_commande, $quantite, $prix_produit * $quantite]);
            $requete_insert_detail->closeCursor();
        }

        // Vider le panier après validation de la commande
        $_SESSION['panier'][$id_client] = [];

        // Rediriger l'utilisateur vers une page de confirmation ou une autre page appropriée
        header('Location: confirmation_commande.php?id=' . $id_client);
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        // Si le panier est vide, afficher un message d'erreur ou rediriger l'utilisateur vers une page appropriée
        $_SESSION['erreur'] = "Votre panier est vide.";
        header('Location: panier.php');
        exit(); // Arrêter l'exécution du script après la redirection
    }
} else {
    // Si la requête n'est pas de type POST ou si le bouton "valider" n'a pas été soumis, rediriger l'utilisateur vers une page appropriée
    header('Location: panier.php');
    exit(); // Arrêter l'exécution du script après la redirection
}
?>
