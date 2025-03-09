<?php
require 'config.php';
require 'employes.php';

if (!isset($_GET['id'])) {
    header("Location: employe.php");
    exit;
}

$employe = getEmployeById($_GET['id']);

if (!$employe) {
    header("Location: employe.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = !empty($_POST['nom']) ? $_POST['nom'] : $employe['nom'];
    $email = !empty($_POST['email']) ? $_POST['email'] : $employe['email'];
    $telephone = !empty($_POST['telephone']) ? $_POST['telephone'] : $employe['telephone'];
    $poste = !empty($_POST['poste']) ? $_POST['poste'] : $employe['poste'];
    $date_embauche = !empty($_POST['date_embauche']) ? $_POST['date_embauche'] : $employe['date_embauche'];
    $salaire = !empty($_POST['salaire']) ? $_POST['salaire'] : $employe['salaire'];
    
    if (updateEmploye($_GET['id'], $nom, $email, $telephone, $poste, $date_embauche, $salaire)) {
        header("Location: employe.php");
        exit;
    } else {
        $error = "Erreur lors de la modification de l'employé.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Employé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ06K3uQhEO7eR3feMZ44mDGR59r2o6y5mdYBzV" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <style>
        /* Global */
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 2rem;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 30px;
        }

        .alert {
            font-size: 1rem;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 12px;
            font-size: 1rem;
        }

        .form-label {
            font-weight: 600;
            color: #343a40;
            font-size: 1.1rem;
        }

        .btn-custom {
            width: 100%;
            padding: 12px;
            font-size: 1.1rem;
            text-transform: uppercase;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #fff;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .mb-3 {
            margin-bottom: 1.5rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            h2 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Modifier un Employé</h2>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"> <?= $error ?> </div>
        <?php endif; ?>

        <form action="edit_employe.php?id=<?= $employe['id'] ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Nom :</label>
                <input type="text" class="form-control" name="nom" value="<?= $employe['nom'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email :</label>
                <input type="email" class="form-control" name="email" value="<?= $employe['email'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Téléphone :</label>
                <input type="text" class="form-control" name="telephone" value="<?= $employe['telephone'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Poste :</label>
                <input type="text" class="form-control" name="poste" value="<?= $employe['poste'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date d'embauche :</label>
                <input type="date" class="form-control" name="date_embauche" value="<?= $employe['date_embauche'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Salaire (FCFA) :</label>
                <input type="number" class="form-control" name="salaire" value="<?= $employe['salaire'] ?>" required>
            </div>

            <button type="submit" class="btn btn-warning btn-custom">Modifier</button>
            <a href="employes.php" class="btn btn-secondary btn-custom">Annuler</a>
        </form>
    </div>

</body>
</html>
