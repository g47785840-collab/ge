<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;

        // -----------------------------------------
        // ضع بيانات Gmail الخاصة بك هنا
        // -----------------------------------------
        $mail->Username = 'agog2988@gmail.com'; 
        $mail->Password = 'eewafakfqgzafqzb';
 // الباسورد اللي ظهر لك من غير مسافات
        // -----------------------------------------

        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Sender
        $mail->setFrom($email, $name);

        // Receiver (إيميلك)
        $mail->addAddress('agog2988@gmail.com');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Message From Your Website';
        $mail->Body    = "
            <h3>You received a new message</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong><br>$message</p>
        ";

        $mail->send();
        echo "Message sent successfully!";

    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
}
?>
