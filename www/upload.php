<?php
require 'auth.php';
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Neplatný token.");
    }

    $project = $_POST['project'] ?? '';
    if (!$project) {
        die("Vyberte projekt.");
    }

    $target_dir = "projekty/$project/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    $file = $_FILES['image'];
    $target_file = $target_dir . basename($file['name']);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image
    $check = getimagesize($file['tmp_name']);
    if ($check === false) {
        die("Soubor není obrázek.");
    }

    // Check file size < 5MB
    if ($file['size'] > 5000000) {
        die("Soubor je příliš velký.");
    }

    // Allow certain formats
    if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        die("Pouze JPG, JPEG, PNG & GIF soubory jsou povoleny.");
    }

    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        echo "Obrázek byl úspěšně nahrán.";
    } else {
        echo "Chyba při nahrávání.";
    }
} else {
    header('Location: dashboard.php');
}
?>