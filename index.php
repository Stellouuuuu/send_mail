<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Récupérer les données en toute sécurité
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

// Vérifier que tous les champs sont remplis
if ($name && $email && $message) {
    $mail = new PHPMailer(true);

    try {
    // Configuration SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ademaketingdigital@gmail.com'; 
    $mail->Password = 'ohky jaga rlqq fgke';          
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Email vers toi
    $mail->setFrom($email, $name);
    $mail->addAddress('stellagbaguidi68@gmail.com'); 
    $mail->Subject = "Nouveau message de contact";
    $mail->Body = "Nom: $name\nEmail: $email\nMessage:\n$message";
    $mail->send();

    // Confirmation à l'utilisateur
    $mail->clearAddresses();
    $mail->addAddress($email);
    $mail->Subject = "Confirmation de réception de votre message";
    $mail->Body = "Bonjour $name,\n\nNous avons bien reçu votre message et vous répondrons dès que possible.\n\nMerci de nous avoir contactés.\n\n— L'équipe Bessan Arch";
    $mail->send();

    // ✅ Redirection après succès
    header("Location: https://mellon-portfolio.onrender.com/?status=success");
    exit();
} catch (Exception $e) {
    // ❌ Redirection avec erreur
    header("Location: https://mellon-portfolio.onrender.com/?status=error");
    exit();
}
} else {
    echo "Veuillez remplir tous les champs.";
}
