<?php
session_start();
require_once '../include/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['valider'])) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $code_postal = $_POST['code_postal'];
    $id_commande = $_POST['id_commande']; // Récupérer l'id_commande depuis le formulaire

    // Connexion à la base de données (déjà inclus)

    // Préparation de la requête SQL
    $requete = $pdo->prepare("INSERT INTO livraison (nom, adresse, ville, code_postal, id_commande) VALUES (?, ?, ?, ?, ?)");

    // Exécution de la requête SQL avec les valeurs des champs de formulaire
    if ($requete->execute([$nom, $adresse, $ville, $code_postal, $id_commande])) {
        // Succès : redirection vers la confirmation de livraison
        header("Location: confirmation_livraison.php");
        exit();
    } else {
        // Erreur : affichage d'un message d'erreur ou redirection vers une page d'erreur
        echo "Une erreur s'est produite lors de l'enregistrement des données.";
        exit();
    }
} else {
    // Redirection si la requête n'est pas de type POST ou si le bouton "valider" n'a pas été soumis
    header("Location: livraison.php");
    exit();
}
?>
