<?php
require 'config.php';
require 'documents.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (deleteDocument($id)) {
        header("Location: document.php");
        exit;
    } else {
        echo "Erreur lors de la suppression.";
    }
}
?>
