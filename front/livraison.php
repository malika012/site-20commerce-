<?php
session_start();
require_once '../include/database.php';

// Vérifie si l'index id_commande est défini dans $_GET
if(isset($_GET['id_commande'])) {
    // Récupère la valeur de id_commande depuis $_GET
    $id_commande = $_GET['id_commande'];

    // Préparation de la requête SQL pour récupérer les informations de la commande
    $sqlStat  = $pdo->prepare("SELECT * FROM ligne_commande WHERE id_commande=?");
    $sqlStat->execute([$id_commande]);
    $livraison = $sqlStat->fetch(PDO::FETCH_ASSOC);
} else {
    // Si id_commande n'est pas défini dans $_GET, vous pouvez gérer l'erreur ici
    // Par exemple, rediriger l'utilisateur vers une autre page ou afficher un message d'erreur
    echo "ID de commande non spécifié.";
    exit(); // Arrête l'exécution du script
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraison</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container py-5">
        <h2 class="text-center">Livraison</h2>
        <form action="traitement_livraison.php" method="post">
            <div class="mb-3">
            <input type="hidden" name="id_commande" value="<?php echo $id_commande ; ?>">

                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse :</label>
                <textarea class="form-control" id="adresse" name="adresse" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="ville" class="form-label">Ville :</label>
                <input type="text" class="form-control" id="ville" name="ville" required>
            </div>
            <div class="mb-3">
                <label for="code_postal" class="form-label">Code Postal :</label>
                <input type="text" class="form-control" id="code_postal" name="code_postal" required>
            </div>
            <button type="submit" name ="valider" class="btn btn-primary">Valider</button>
        </form>
    </div>
</body>
</html>
