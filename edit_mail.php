<?php
require 'config.php';
require 'clients.php';
require 'send_mail.php';

if (!isset($_GET['id'])) {
    header("Location: client.php");
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
        // Envoyer un e-mail de notification de modification
        $subject = "Mise à jour de votre profil chez SmartTech";
        $message = "Bonjour $nom,<br><br>Vos informations ont été mises à jour avec succès.<br>Adresse: $adresse<br>Téléphone: $telephone.<br><br>Cordialement,<br>SmartTech";
        envoyerMail($email, $subject, $message);
        
        header("Location: client.php");
        exit;
    } else {
        $error = "Erreur lors de la modification du client.";
    }
}
?>
