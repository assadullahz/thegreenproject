<?php
include 'db_connection.php';
include 'mailer.php';

include "dotenv.php";
(new DotEnvEnvironment)->load(__DIR__);

if ($_POST["download-buspro"]) {
    try {
        $conn = OpenCon();
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $company = $_POST['company'];
        $description = $_POST['description'];

        $mail = new SendMail;
        $body = "<div><p>Name : " . $name . "</p>" . "<p>Phone : " . $phone . "</p>" . "<p>Email : " . $email . "</p>" . "<p>Company : " . $company . "</p>" . "<p>Description : " . $description . "</p></div>";

        include_once 'mock.php';
        $mail->send($email, $name, "Business Proposal The Green Project", $mock, false);
        $mail->send("assadullah.muzu@gmail.com", "Marketing The Green Project", "Data Download Business Proposal", $body);

        $conn->query('INSERT INTO tgp_buspro ( email, name, phone, company, description) VALUES ("' . $email . '","' . $name . '","' . $phone . '","' . $company . '","' . $description . '")');

        CloseCon($conn);
        header("Location: /");
        die();
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
        die();
    }
} elseif ($_POST["contact"]) {
    try {
        $conn = OpenCon();
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $description = $_POST['description'];

        $mail = new SendMail;
        $body = "<div><p>Name : " . $name . "</p>" . "<p>Phone : " . $phone . "</p>" . "<p>Email : " . $email . "</p>" . "<p>Subject : " . $subject . "</p>" . "<p>Description : " . $description . "</p></div>";

        $mail->send("assadullah.muzu@gmail.com", "Marketing The Green Project", "Data Contact", $body);

        $conn->query('INSERT INTO tgp_contact ( email, name, phone, subject, description) VALUES ("' . $email . '","' . $name . '","' . $phone . '","' . $subject . '","' . $description . '")');

        CloseCon($conn);
        header("Location: /");
        die();
    } catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
        die();
    }
} else {
    die();
}
