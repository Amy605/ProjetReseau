<?php
require 'config.php';
require 'employes.php';
$employes = getEmployes();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Employés</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ06K3uQhEO7eR3feMZ44mDGR59r2o6y5mdYBzV>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        /* Couleurs modernes */
        :root {
            --primary-color: #6a11cb;
            --secondary-color: #2575fc;
            --accent-color: #ff6f61;
            --background-color: #f4f4f9;
            --text-color: #333;
            --light-text-color: #fff;
            --table-header-bg: #6a11cb;
            --table-header-color: #fff;
            --table-row-hover: #f8f9fa;
        }

        /* Global */
        body {
            background-color: var(--background-color);
            color: var(--text-color);
            font-family: 'Poppins', sans-serif;
        }

        .container {
            max-width: 1100px;
            margin-top: 30px;
        }

        h2 {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-color);
            text-align: left;
            margin-bottom: 30px;
            position: relative;
            display: inline-block;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50%;
            height: 4px;
            background: var(--accent-color);
            border-radius: 2px;
        }

        /* Boutons */
        .btn-custom {
            display: inline-block;
            background: var(--accent-color);
            color: var(--light-text-color);
            font-size: 1rem;
            padding: 10px 20px;
            border: none;
            border-radius: 50px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 15px rgba(255, 111, 97, 0.4);
        }

        .btn-custom:hover {
            background: darken(var(--accent-color), 10%);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 111, 97, 0.6);
        }

        .btn-custom:focus, .btn-custom:active {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(255, 111, 97, 0.5);
        }

        .btn-success {
            background: var(--primary-color);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background: darken(var(--primary-color), 10%);
            transform: translateY(-3px);
        }

        .btn-warning, .btn-danger {
            transition: all 0.3s ease;
        }

        .btn-warning:hover, .btn-danger:hover {
            transform: translateY(-3px);
        }

        /* Table */
        .table {
            background-color: var(--light-text-color);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .table thead {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--table-header-color);
        }

        .table th {
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: var(--table-row-hover);
            transform: scale(1.02);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .table td, .table th {
            padding: 15px;
            vertical-align: middle;
        }

        /* Footer */
        footer {
            background-color: var(--primary-color);
            color: var(--light-text-color);
            padding: 15px;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Animations */
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .table tbody tr {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Liste des Employés</h2>
            <a href="add_employe.php" class="btn btn-success btn-custom">Ajouter un Employé</a>
        </div>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Prénom et Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Poste</th>
                    <th>Date d'embauche</th>
                    <th>Salaire</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employes as $employe) : ?>
                    <tr>
                        <td><?= $employe['id'] ?></td>
                        <td><?= $employe['nom'] ?></td>
                        <td><?= $employe['email'] ?></td>
                        <td><?= $employe['telephone'] ?></td>
                        <td><?= $employe['poste'] ?></td>
                        <td><?= $employe['date_embauche'] ?></td>
                        <td><?= $employe['salaire'] ?> FCFA</td>
                        <td>
                            <a href="edit_employe.php?id=<?= $employe['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="delete_employe.php?id=<?= $employe['id'] ?>" class="btn btn-danger btn-sm">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="index.php" class="btn btn-secondary btn-custom">Retour à l'Accueil</a>
    </div>

    <footer>
        &copy; 2025 SmartTech - Tous droits réservés
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb+Yk7tR5L7bXJbF5s6YqEX6E1n7p6P7ATc6QO06LV>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqJtv7f7pQ4n39vw0bdrhjm8E9hVJY+jj6/zZQ9vbn>

</body>
</html>
