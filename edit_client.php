<?php
require 'config.php';
require 'clients.php';

if (!isset($_GET['id'])) {
    header("Location: clients.php");
    exit;
}

$client = getClientById($_GET['id']);

if (!$client) {
    header("Location: client.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = !empty($_POST['nom']) ? $_POST['nom'] : $client['nom'];
    $email = !empty($_POST['email']) ? $_POST['email'] : $client['email'];
    $telephone = !empty($_POST['telephone']) ? $_POST['telephone'] : $client['telephone'];
    $adresse = !empty($_POST['adresse']) ? $_POST['adresse'] : $client['adresse'];
    
    if (updateClient($_GET['id'], $nom, $email, $telephone, $adresse)) {
        header("Location: client.php");
        exit;
    } else {
        $error = "Erreur lors de la modification du client.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Client</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Arial', sans-serif;
            padding-top: 50px;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        h2 {
            color: #2c3e50;
            font-size: 24px;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: bold;
            color: #34495e;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
            width: 100%;
            margin-bottom: 15px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #3498db;
            outline: none;
        }

        button[type="submit"] {
            background-color: #f39c12;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #e67e22;
        }

        .btn-secondary {
            background-color: #7f8c8d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            text-align: center;
            margin-top: 10px;
        }

        .btn-secondary:hover {
            background-color: #95a5a6;
        }

        .alert {
            background-color: #e74c3c;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Modifier un Client</h2>
        <?php if (isset($error)) : ?>
            <div class="alert"><?= $error ?></div>
        <?php endif; ?>
        <form action="edit_client.php?id=<?= $client['id'] ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Nom :</label>
                <input type="text" class="form-control" name="nom" value="<?= $client['nom'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email :</label>
                <input type="email" class="form-control" name="email" value="<?= $client['email'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Téléphone :</label>
                <input type="text" class="form-control" name="telephone" value="<?= $client['telephone'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Adresse :</label>
                <input type="text" class="form-control" name="adresse" value="<?= $client['adresse'] ?>" required>
            </div>
            <button type="submit">Modifier</button>
            <a href="client.php" class="btn btn-secondary btn-custom">Annuler</a>
       
 </form>
    </div>
</body>
</html>
