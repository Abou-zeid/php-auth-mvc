<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';

class Mailer {
    private $mail;
    private $config;

    public function __construct() {
        $this->config = require __DIR__ . '/../../config/email.php';

        $this->mail = new PHPMailer(true);
        try {
            // SMTP settings
            $this->mail->isSMTP();
            $this->mail->Host = $this->config['host'];
            $this->mail->SMTPAuth = true;
            $this->mail->Username = $this->config['username'];
            $this->mail->Password = $this->config['password'];
            $this->mail->SMTPSecure = $this->config['encryption'];
            $this->mail->Port = $this->config['port'];

            // Sender details
            $this->mail->setFrom($this->config['from_email'], $this->config['from_name']);
        } catch (Exception $e) {
            error_log("Mailer Error: " . $e->getMessage());
        }
    }

    public function sendMail($toEmail, $toName, $subject, $body) {
        try {
            $this->mail->addAddress($toEmail, $toName);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;

            return $this->mail->send();
        } catch (Exception $e) {
            error_log("Mailer Error: " . $this->mail->ErrorInfo);
            return false;
        }
    }
}
?>
