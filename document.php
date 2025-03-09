<?php
require 'config.php';
require 'documents.php';
$documents = getDocuments();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Documents</title>
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

        .btn-primary {
            background-color: var(--primary-color);
            color: var(--light-text-color);
        }

        .btn-primary:hover {
            background-color: #5a0c8b;
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
        <h2>Liste des Documents</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Taille</th>
                    <th>Date d'upload</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($documents as $document) : ?>
                    <tr>
                        <td><?= $document['id'] ?></td>
                        <td><?= htmlspecialchars($document['nom']) ?></td>
                        <td><?= htmlspecialchars($document['type']) ?></td>
                        <td><?= htmlspecialchars($document['taille']) ?> Ko</td>
                        <td><?= htmlspecialchars($document['date_upload']) ?></td>
                        <td>
                            <a href="download.php?id=<?= $document['id'] ?>" class="btn btn-primary">Télécharger</a>
                            <a href="delete_document.php?id=<?= $document['id'] ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce document ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="upload.php" class="btn btn-success">Uploader un Document</a>
    </div>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb+Yk7tR5L7bXJbF5s6YqEX6E1n7p6P7ATc6QO06LV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqJtv7f7pQ4n39vw0bdrhjm8E9hVJY+jj6/zZQ9vbn" crossorigin="anonymous"></script>
</body>
</html>
x
