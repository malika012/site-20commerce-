<?php
ob_start();
include '../include/front_nav.php';

// Fonction pour envoyer un e-mail d'activation
function envoyer_email_activation($destinataire, $nom, $prenom) {
    $sujet = "Activation de votre compte";
    $corps = "Bonjour $prenom $nom,\n\nVotre compte a été créé avec succès. Veuillez cliquer sur le lien suivant pour l'activer : http://exemple.com/activation\n\nCordialement,\nVotre entreprise";
    $en_tete = 'From: votre_adresse@gmail.com' . "\r\n" .
               'Reply-To: votre_adresse@gmail.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    mail($destinataire, $sujet, $corps, $en_tete);
}

// Traitement du formulaire de création de compte
if(isset($_POST['ajouter'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $email = $_POST['adress'];
    $pwd = $_POST['password'];
    if( !empty($email) && !empty($nom) && !empty($prenom) && !empty($pwd) && !empty($tel)) {
        // Insérer les données dans la base de données
        require_once '../include/database.php'; 
        $date = date('Y-m-d');
        $sqlState = $pdo->prepare('INSERT INTO client VALUES(null,?,?,?,?,?,?)');
       // Session_start();
        $sqlState->execute([$email,$nom,$prenom,$tel,$pwd,$date]);
        
        // Envoyer l'e-mail d'activation
        envoyer_email_activation($email, $nom, $prenom);

        // Redirection vers la page d'accueil
        header('location: index.php');
        exit;
    } else {
        ?>
        <div class="alert alert-danger my-2" role="alert">
            Tous les champs sont obligatoires
        </div>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Crée le compte</title>
</head>
<body>
<div class="container">
    <div class="container">
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom *</label>
                <input type="text" class="form-control" name="nom">
                <label for="exampleInputEmail1" class="form-label">Prenom *</label>
                <input type="text" class="form-control" name="prenom">
                <label for="exampleInputEmail1" class="form-label">Télephone</label>
                <input type="tel" class="form-control" name="tel">
                <label for="exampleInputEmail1" class="form-label">Email address *</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="adress">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password *</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <input type="submit" value="Créer un compte" class="btn btn-primary my-2" name="ajouter" >
        </form>
    </div>
</div>
</body>
</html>
