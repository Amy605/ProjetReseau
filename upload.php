<?php
require 'config.php';
require 'documents.php';

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['document'])) {
    $nom = $_FILES['document']['name'];
    $type = $_FILES['document']['type'];
    $taille = $_FILES['document']['size'];
    $chemin = 'uploads/' . basename($nom);

    if ($_FILES['document']['error'] == UPLOAD_ERR_OK) {
        if (move_uploaded_file($_FILES['document']['tmp_name'], $chemin)) {
            $result = ajouterDocument($nom, $type, $taille, $chemin);
            if ($result === "Document ajouté avec succès.") {
    $success = $result;

    // Exécuter le script Python pour envoyer les emails
    $nom_document = escapeshellarg($nom);  // Sécuriser le nom du document
    $commande = "python3 /var/www/html/smarttech/upload_mail.py $nom_document";
    exec($commande . " > /dev/null 2>&1 &");  // Lancer en arrière-plan

    header("Location: document.php"); // Redirige vers la liste
    exit;
}
if ($result === "Document ajouté avec succès.") {
    $success = $result;

    // Exécuter le script Python pour envoyer les emails
    $nom_document = escapeshellarg($nom);  // Sécuriser le nom du document
    $commande = "python3 /var/www/html/smarttech/email_upload_document.py $nom_document";
    exec($commande . " > /dev/null 2>&1 &");  // Lancer en arrière-plan

    header("Location: document.php"); // Redirige vers la liste
    exit;
}

            } else {
                $error = $result;
            }
        } else {
            $error = "Erreur lors du déplacement du fichier.";
        }
    } else {
        $error = "Erreur lors de l'upload : " . $_FILES['document']['error'];
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Uploader un Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #4CAF50;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .alert {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
        }
        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
        }
        .alert-error {
            background-color: #f2dede;
            color: #a94442;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input[type="file"] {
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .btn-secondary {
            display: inline-block;
            padding: 10px 20px;
            background-color: #aaa;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        .btn-secondary:hover {
            background-color: #888;
        }
    </style>
</head>
<body>
    <h2>Uploader un Document</h2>
    <div class="container">
        <?php if (!empty($error)) : ?>
            <div class="alert alert-error"><?= $error ?></div>
        <?php endif; ?>
        <?php if (!empty($success)) : ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="document">Sélectionner un fichier :</label>
            <input type="file" name="document" required>
            <button type="submit">Uploader</button>
            <a href="document.php" class="btn-secondary">Retour</a>
        </form>
    </div>
</body>
</html>
