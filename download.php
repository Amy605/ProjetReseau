<?php
require 'config.php';
require 'documents.php';

if (isset($_GET['id'])) {
    $document = getDocumentById($_GET['id']);
    if ($document) {
        $file = '../' . $document['chemin'];
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: ' . $document['type']);
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        } else {
            die("Fichier introuvable.");
        }
    } else {
        die("Document non trouvé.");
    }
} else {
    die("ID du document non spécifié.");
}
