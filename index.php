<?php
    require 'config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartTech - Accueil</title>
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
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            font-family: 'Poppins', sans-serif;
        }

        /* Section Hero */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 100px 0;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
            color: var(--light-text-color);
            overflow: hidden;
            position: relative;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1), transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .hero-section h1 {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 30px;
            animation: fadeInUp 1.5s ease-out;
        }

        .hero-section p {
            font-size: 1.3rem;
            margin-bottom: 40px;
            animation: fadeInUp 1.8s ease-out;
        }

        /* Boutons modernes */
        .btn-custom {
            display: inline-block;
            background: var(--accent-color);
            color: var(--light-text-color);
            font-size: 1.1rem;
            padding: 15px 30px;
            margin: 15px;
            border: none;
            border-radius: 50px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 15px rgba(255, 111, 97, 0.4);
            position: relative;
            overflow: hidden;
        }

        .btn-custom::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.3), transparent 70%);
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0.5s ease;
        }

        .btn-custom:hover {
            background: darken(var(--accent-color), 10%);
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(255, 111, 97, 0.6);
        }

        .btn-custom:hover::after {
            transform: translate(-50%, -50%) scale(1);
        }

        .btn-custom:focus, .btn-custom:active {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(255, 111, 97, 0.5);
        }

        /* Footer */
        footer {
            background-color: var(--primary-color);
            color: var(--light-text-color);
            padding: 20px;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Animations */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Effets de survol supplémentaires */
        .hero-section h1:hover, .hero-section p:hover {
            transform: scale(1.02);
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body>

    <div class="container hero-section">
        <h1>Bienvenue sur SmartTech</h1>
        <p>Gérez facilement vos employés, clients et documents avec notre plateforme moderne.</p>
        <a href="employe.php" class="btn btn-custom">Gestion des Employés</a>
        <a href="client.php" class="btn btn-custom">Gestion des Clients</a>
        <a href="document.php" class="btn btn-custom">Gestion des Documents</a>
    </div>

    <footer>
        &copy; 2025 SmartTech - Tous droits réservés
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb+Yk7tR5L7bXJbF5s6YqEX6E1n7p6P7ATc6QO06LV>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqJtv7f7pQ4n39vw0bdrhjm8E9hVJY+jj6/zZQ9vbn>

</body>
</html>
