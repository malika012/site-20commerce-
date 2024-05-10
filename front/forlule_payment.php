<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Paiement</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h2 class="text-center">Formulaire de Paiement</h2>
        <form action="process_payment.php" method="post">
            <div class="mb-3">
            <input type="hidden" name="id_commande" value="<?php echo $id_commande; ?>">
                <label for="cardholder_name" class="form-label">Nom du Titulaire de la Carte :</label>
                <input type="text" id="cardholder_name" name="cardholder_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="card_number" class="form-label">Numéro de Carte :</label>
                <input type="text" id="card_number" name="card_number" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="expiry_date" class="form-label">Date d'Expiration :</label>
                <input type="text" id="expiry_date" name="expiry_date" class="form-control" placeholder="MM/YY" required>
            </div>
            <div class="mb-3">
                <label for="cvv" class="form-label">Code de Sécurité (CVV) :</label>
                <input type="text" id="cvv" name="cvv" class="form-control" required>
            </div>
            <button name="payer" type="submit" class="btn btn-primary">Payer</button>
        </form>
    </div>
</body>
</html>




