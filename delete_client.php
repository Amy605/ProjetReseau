<?php
require 'config.php';
require 'clients.php';

// Vérifier si l'ID est présent dans l'URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: client.php");
    exit;
}

$id = $_GET['id'];

// Appeler la fonction de suppression du client
if (deleteClient($id)) {
    // Rediriger vers la liste des clients après la suppression
    header("Location: client.php");
    exit;
} else {
    // Si la suppression échoue, afficher une erreur
    echo "Erreur lors de la suppression du client.";
}


?>
