<?php
require 'config.php';
require 'employes.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $poste = $_POST['poste'];
    $date_embauche = $_POST['date_embauche'];
    $salaire = $_POST['salaire'];
    
    if (ajouterEmploye($nom, $email, $telephone, $poste, $date_embauche, $salaire)) {
        header("Location: employe.php");
        exit;
    } else {
        $error = "Erreur lors de l'ajout de l'employé.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Employé</title>
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
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #2980b9;
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
        <h2>Ajouter un Employé</h2>
        <?php if (isset($error)) : ?>
            <div class="alert"><?= $error ?></div>
        <?php endif; ?>
        <form action="add_employe.php" method="post">
            <div class="mb-3">
                <label class="form-label">Prenom et Nom :</label>
                <input type="text" class="form-control" name="nom" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email :</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Téléphone :</label>
                <input type="text" class="form-control" name="telephone" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Poste :</label>
                <input type="text" class="form-control" name="poste" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date d'embauche :</label>
                <input type="date" class="form-control" name="date_embauche" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Salaire :</label>
                <input type="number" class="form-control" name="salaire" required>
            </div>
            <button type="submit">Ajouter</button>
            <a href="employe.php" class="btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>

