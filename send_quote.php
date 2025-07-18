<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mailer/Exception.php';
require 'mailer/PHPMailer.php';
require 'mailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $interest = htmlspecialchars($_POST["interest"]);
    $message = htmlspecialchars($_POST["message"]);

    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'patrasagarika654@gmail.com';
        $mail->Password   = 'yder qkfe hbng lfcj'; // App Password here
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Sender and recipient
        $mail->setFrom('patrasagarika654@gmail.com', 'Anand Watch Co Website');
        $mail->addAddress('patrasagarika654@gmail.com'); // Send to same email or another

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Quote Request from Website';
   $mail->Body = '
    <div style="max-width: 600px; margin: auto; padding: 20px; border: 2px solid #d4af37; border-radius: 10px; font-family: Arial, sans-serif; font-size: 16px; color: #333;">
        <h2 style="text-align: center; color: #d4af37; margin-bottom: 20px;">🕰️ New Watch Quote Request</h2>
        <p><strong>Name:</strong> ' . $name . '</p>
        <p><strong>Email:</strong> ' . $email . '</p>
        <p><strong>Phone:</strong> ' . $phone . '</p>
        <p><strong>Watch Interest:</strong> ' . $interest . '</p>
        <p><strong>Message:</strong><br>' . nl2br($message) . '</p>
    </div>
';


        $mail->send();
        echo "success";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
?>
