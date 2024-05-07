<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


class SendMail
{
    public function __construct()
    {
        $this->includes();
    }

    public function send($email, $name, $subject, $html_content, $cc = true)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug  = 0;
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = getenv('SMTP_PORT');
        $mail->Host       = getenv('SMTP_HOST');
        $mail->Username   = getenv('SMTP_USER');
        $mail->Password   = getenv('SMTP_PASS');

        $mail->IsHTML(true);
        $mail->AddAddress($email, $name);
        $mail->SetFrom('website@thegreenproject.co.id', "Website The Green Project");
        // $mail->AddReplyTo(SMTP_USER, SMTP_NAME);
        if ($cc) $mail->AddCC("assadullah.cep@gmail.com", "Zidan CEP");
        $mail->Subject = $subject;

        $mail->MsgHTML($html_content);

        if (!$mail->Send()) {
            # you are having some trouble
            return false;
        } else {
            return true;
        }
    }

    private function includes()
    {

        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';
    }
}
