<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Se usi Composer
composer require phpmailer/phpmailer

$mail = new PHPMailer(true);

try {
    // Configurazione SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'angelodelpiano2317@gmail.com'; // Sostituisci con la tua email Gmail
    $mail->Password = 'hvsk ccgx mcgi ifah'; // Usa la password per app generata
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Usa STARTTLS
    $mail->Port = 587;

    // Destinatario
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('angelodelpiano2317@gmail.com', 'Angelo Del Piano');

    // Contenuto dell'email
    $mail->isHTML(true);
    $mail->Subject = 'Nuovo Messaggio dal Form di Contatto';
    $mail->Body    = "
        <h2>Nuovo Messaggio</h2>
        <p><strong>Nome:</strong> {$_POST['name']}</p>
        <p><strong>Email:</strong> {$_POST['email']}</p>
        <p><strong>Messaggio:</strong><br>{$_POST['message']}</p>
    ";

    // Invia l'email
    $mail->send();
    echo "Messaggio inviato con successo!";
} catch (Exception $e) {
    echo "Errore nell'invio del messaggio: {$mail->ErrorInfo}";
}
?>
