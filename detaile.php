<?php
session_start();
require_once 'include/database.php';
$id = $_GET['id'];
    $sqlLivraison = $pdo->prepare('SELECT * FROM livraison WHERE id_commande = ?');
    $sqlLivraison->execute([$id]);
    $livraisons = $sqlLivraison->fetchAll(PDO::FETCH_OBJ);
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

    <hr class="btn-info">
    <h3>Livraison:</h3>
    <table class="table table-striped table-hover my-2">
        <tr>
            <th>#ID</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Code Postal</th>
            <th>Date de Commandes</th>
        </tr>
        <?php foreach($livraisons as $livraison):?>
            <tr>
                <td><?php echo $livraison->id; ?></td>
                <td><?php echo $livraison->nom; ?></td>
                <td><?php echo $livraison->adresse; ?></td>
                <td><?php echo $livraison->ville; ?></td>
                <td><?php echo $livraison->code_postal; ?></td>
                <td><?php echo $livraison->date; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>



    <!-- Affichage des informations de paiement -->
    <?php
    $sqltransaction = $pdo->prepare('SELECT * FROM transactions WHERE id_commande = ?');
    $sqltransaction->execute([$id]);
    $transaction = $sqltransaction->fetchAll(PDO::FETCH_OBJ);
    ?>

    <hr class="btn-info">
    <h3>Paiement :</h3>
    <table class="table table-striped table-hover my-2">
        <tr>
            <th>#ID</th>
            <th>Montant</th>
            <th>Type de carte</th>
            <th>Numéro de carte</th>
            <th>Date d'expiration</th>
            <th>Date de Commandes</th>
        </tr>
        <?php foreach($transaction as $transactions):?>
            <tr>
                <td><?php echo $transactions->id; ?></td>
                <td><?php echo $transactions->cardholder_name; ?></td>
                <td><?php echo $transactions->card_number; ?></td>
                <td><?php echo $transactions->expiry_date; ?></td>
                <td><?php echo $transactions->CVV; ?></td>
                <td><?php echo $transactions->date; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>


</body>
</html>