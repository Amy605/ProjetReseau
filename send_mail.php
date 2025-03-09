<?php
require 'config_mail.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function envoyerMail($to, $subject, $message) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;
        $mail->SMTPSecure = 'tls';
        $mail->Port = SMTP_PORT;

        $mail->setFrom(SMTP_FROM, SMTP_FROM_NAME);
        $mail->addAddress($to);
  
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Activer le mode debug
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';

        return $mail->send();
    } catch (Exception $e) {
        echo "Erreur d'envoi de mail : " . $mail->ErrorInfo;
        return false;
    }
}
?>
