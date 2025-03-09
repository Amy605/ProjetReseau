<?php
require 'config.php';
require 'clients.php';
$clients = getClients();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Clients</title>
    <!-- Lien vers Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3s4Wz6iJgD/+ub2oU" crossorigin="anonymous">
    <style>
        /* Couleurs modernes */
        :root {
            --primary-color: #6a11cb; /* Violet */
            --secondary-color: #2575fc; /* Bleu */
            --accent-color: #ff6f61; /* Corail */
            --background-color: #f8f9fa; /* Gris clair */
            --text-color: #333; /* Noir */
            --light-text-color: #fff; /* Blanc */
        }

        /* Global */
        body {
            background-color: var(--background-color);
            color: var(--text-color);
            font-family: 'Arial', sans-serif;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        /* Titre */
        h2 {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 20px;
            text-align: center;
        }

        /* Tableau */
        .table {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .table thead {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--light-text-color);
        }

        .table th, .table td {
            padding: 15px;
            text-align: center;
            vertical-align: middle;
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
            background-color: #f1f3f5;
            transform: scale(1.02);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Boutons */
        .btn {
            font-size: 0.9rem;
            padding: 8px 16px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-warning {
            background-color: #ffc107;
            color: var(--text-color);
        }

        .btn-warning:hover {
            background-color: #e0a800;
            transform: translateY(-2px);
        }

        .btn-danger {
            background-color: #dc3545;
            color: var(--light-text-color);
        }

        .btn-danger:hover {
            background-color: #c82333;
            transform: translateY(-2px);
        }

        .btn-success {
            background-color: var(--primary-color);
            color: var(--light-text-color);
        }

        .btn-success:hover {
            background-color: #5a0c8b;
            transform: translateY(-2px);
        }

        /* Conteneur */
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">SmartTech</a>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container">
        <h2>Liste des Clients</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Prenom et Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client) : ?>
                    <tr>
                        <td><?= $client['id'] ?></td>
                        <td><?= htmlspecialchars($client['nom']) ?></td>
                        <td><?= htmlspecialchars($client['email']) ?></td>
                        <td><?= htmlspecialchars($client['telephone']) ?></td>
                        <td><?= htmlspecialchars($client['adresse']) ?></td>
                        <td>
                            <a href="edit_client.php?id=<?= $client['id'] ?>" class="btn btn-warning">Modifier</a>
                            <a href="delete_client.php?id=<?= $client['id'] ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
       
 <a href="add_client.php" class="btn btn-success">Ajouter un Client</a>

    </div>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb+Yk7tR5L7bXJbF5s6YqEX6E1n7p6P7ATc6QO06LV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqJtv7f7pQ4n39vw0bdrhjm8E9hVJY+jj6/zZQ9vbn" crossorigin="anonymous"></script>
</body>
</html>
