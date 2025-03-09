<?php
require 'config.php';

// Ajouter un client
function ajouterClient($nom, $email, $telephone, $adresse) {
    global $pdo;
    $sql = "INSERT INTO clients (nom, email, telephone, adresse) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$nom, $email, $telephone, $adresse]);
}

// Obtenir tous les clients
function getClients() {
    global $pdo;
    $sql = "SELECT * FROM clients";
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

// Obtenir un client par ID
function getClientById($id) {
    global $pdo;
    $sql = "SELECT * FROM clients WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Mettre à jour un client
function updateClient($id, $nom, $email, $telephone, $adresse) {
    global $pdo;
    $sql = "UPDATE clients SET nom = ?, email = ?, telephone = ?, adresse = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$nom, $email, $telephone, $adresse, $id]);
}

// Supprimer un client
function deleteClient($id) {
    global $pdo;
    $sql = "DELETE FROM clients WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}
 $sql = "ALTER TABLE clients AUTO_INCREMENT = 1"; // Remet l'auto-incrément à 1
    $pdo->query($sql);

