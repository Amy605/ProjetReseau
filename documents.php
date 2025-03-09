<?php
require 'config.php';

// Ajouter un document
// Ajouter un document avec confirmation
function ajouterDocument($nom, $type, $taille, $chemin) {
    global $pdo;
    $sql = "INSERT INTO documents (nom, type, taille, chemin) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$nom, $type, $taille, $chemin])) {
        return "Document ajouté avec succès.";
    } else {
        return "Erreur lors de l'ajout du document.";
    }
}


// Obtenir tous les documents
function getDocuments() {
    global $pdo;
    $sql = "SELECT * FROM documents";
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

// Obtenir un document par ID
function getDocumentById($id) {
    global $pdo;
    $sql = "SELECT * FROM documents WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Supprimer un document
function deleteDocument($id) {
    global $pdo;
    $sql = "DELETE FROM documents WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}


 $sql = "ALTER TABLE employes AUTO_INCREMENT = 1"; // Remet l'auto-incrément à 1
    $pdo->query($sql);

