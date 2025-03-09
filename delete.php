<?php
require '../backend/config.php';
require '../backend/employes.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (deleteEmploye($id)) {
        header("Location: employe.php");
        exit;
    } else {
        echo "<script>alert('Erreur lors de la suppression de l\'employé'); window.history.back();</script>";
    }
} else {
    header("Location: employe.php");
    exit;
}
