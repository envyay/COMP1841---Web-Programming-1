<?php

namespace services;

require __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailService
{
    public function sendEmail(string $subject, string $body, string $toEmail, string $toName)
    {

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'vian.mt9000@gmail.com';
            $mail->Password = 'hvin btnu fbjg nyzo';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('vian.mt9000@gmail.com', 'An Nguyen');
            $mail->addAddress($toEmail, $toName);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();
        } catch (Exception $e) {
            echo "Không gửi được email. Lỗi: {$mail->ErrorInfo}";
        }
    }
}