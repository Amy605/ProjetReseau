<?php
require 'config.php';

// Ajouter un employé
function ajouterEmploye($nom, $email, $telephone, $poste, $date_embauche, $salaire) {
    global $pdo;
    $sql = "INSERT INTO employes (nom, email, telephone, poste, date_embauche, salaire) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$nom, $email, $telephone, $poste, $date_embauche, $salaire]);
}

// Obtenir tous les employés
function getEmployes() {
    global $pdo;
    $sql = "SELECT * FROM employes";
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

// Obtenir un employé par ID
function getEmployeById($id) {
    global $pdo;
    $sql = "SELECT * FROM employes WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Mettre à jour un employé
function updateEmploye($id, $nom, $email, $telephone, $poste, $date_embauche, $salaire) {
    global $pdo;
    $sql = "UPDATE employes SET nom = ?, email = ?, telephone = ?, poste = ?, date_embauche = ?, salaire = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$nom, $email, $telephone, $poste, $date_embauche, $salaire, $id]);
}

// Supprimer un employé
function deleteEmploye($id) {
    global $pdo;
    $sql = "DELETE FROM employes WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}

 $sql = "ALTER TABLE employes AUTO_INCREMENT = 1"; // Remet l'auto-incrément à 1
    $pdo->query($sql);

