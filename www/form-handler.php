<?php
require 'db.php';

// Sanitize inputs
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

if (!$name || !$email || !$message) {
    http_response_code(400);
    echo "Neplatné údaje.";
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO formular (jmeno, email, zprava) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $message]);

    // Send email notification
    $to = 'info@jlstrechy.cz';
    $subject = 'Nová kontaktní zpráva';
    $body = "Jméno: $name\nE-mail: $email\nZpráva: $message";
    $headers = "From: $email";

    mail($to, $subject, $body, $headers);

    echo "Děkujeme za zprávu!";
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    http_response_code(500);
    echo "Chyba serveru. Zkuste to později.";
}
?>