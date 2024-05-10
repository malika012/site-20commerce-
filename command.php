<?php
session_start();
require_once 'include/database.php';

// Récupération de l'ID de la commande depuis l'URL
$idcommande = $_GET['id'];

// Requête pour récupérer les informations de la commande et du client associé
$sqlStaet = $pdo->prepare('SELECT commandes.*, client.nom AS "NOM", client.prenom AS "PRENOM" FROM commandes 
         INNER JOIN client ON commandes.id_client = client.id
         WHERE commandes.id=?
          ORDER BY commandes.date DESC');
$sqlStaet->execute([$idcommande]);
$commande = $sqlStaet->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Styles CSS personnalisés */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .control-center {
            color: #007bff;
        }

        /* Styles Bootstrap */
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            vertical-align: top;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #0069d9;
            border-color: #0062cc;
        }
    </style>
</head>
<body>

<div class="container py-2">
    <?php
    // Redirection si l'utilisateur n'est pas connecté
    if (!isset($_SESSION['utilisateur'])) {
        header('location: connexion.php');
        exit; // Arrête l'exécution du script pour éviter l'affichage du reste de la page
    }
    ?>
    <h6><i class="fa-solid fa-hands-clapping alert "></i> Bonjour : <?php echo $_SESSION['utilisateur']['nom'], ' ', $_SESSION['utilisateur']['prenom']; ?></h6>
</div>

<h4 class="my-2 me-2 control-center">Détails de la Commande</h4>

<a href="commandes.php" class="btn btn-primary my-2 py-2 me-2"> les commandes</a>

<table class="table table-striped table-hover my-2">
    <tr>
        <th>#ID</th>
        <th>Client</th>
        <th>Total</th>
        <th>Date</th>
        <th></th>
    </tr>
    <tr>
        <td><?php echo $commande['id']; ?></td>
        <td><?php echo $commande['NOM'] . ' ' . $commande['PRENOM']; ?></td>
        <td><?php echo $commande['total']; ?> DH</td>
        <td><?php echo $commande['date']; ?></td>
        <td>
            <?php if ($commande['valider'] == 0): ?>
                <a class="btn btn-success btn-sm" href="valid_commande.php?id=<?php echo $commande['id'];?>&etat=1">Valider la commande</a>
            <?php else: ?>
                <a class="btn btn-danger btn-sm" href="valid_commande.php?id=<?php echo $commande['id'];?>&etat=0">Annuler la commande</a>
            <?php endif; ?>
        </td>
    </tr>
</table>

<hr>

<h3>Produits:</h3>

<table class="table table-striped table-hover my-2">
    <tr>
        <th>#ID</th>
        <th>Produit</th>
        <th>Prix unitaire</th>
        <th>Quantité</th>
        <th>Total</th>
    </tr>
    <?php
    // Récupération des produits de la commande
    $sqlStatelignecommande = $pdo->prepare('SELECT ligne_commande.*, produit.nom_produit, produit.image_produit FROM ligne_commande
                             INNER JOIN produit ON ligne_commande.id_produit=produit.id_produit
                             WHERE id_commande=?');
    $sqlStatelignecommande->execute([$idcommande]);
    $lignecommande = $sqlStatelignecommande->fetchAll(PDO::FETCH_OBJ);
    foreach($lignecommande as $lignecommandes):?>
        <tr>
            <td><?php echo $lignecommandes->id; ?></td>
            <td><?php echo $lignecommandes->nom_produit; ?></td>
            <td><?php echo $lignecommandes->prix; ?> DH</td>
            <td>x<?php echo $lignecommandes->quantite; ?></td>
            <td><?php echo $lignecommandes->total; ?> DH</td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="detaile.php?id=<?php echo $commande['id_client']?>" class="btn btn-primary my-2 py-2 me-2"> Plus détails</a>
</body>
</html>
