<?php
// include("connection.php");
// include("function.php");
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'phpmailer/src/Exception.php';
// require 'phpmailer/src/PHPMailer.php';  
// require 'phpmailer/src/SMTP.php';

// $status = "ins";
// $subject = "";
// $body = "";

// emailsending($status);  
// {
//     $mail = new PHPMailer(true);

//     $mail->isSMTP();
//     $mail->Host       = 'smtp.gmail.com';
//     $mail->SMTPAuth   = true;
//     $mail->Username   = 'saimsachwany@gmail.com'; // Replace with your Gmail email
//     $mail->Password   = 'uejc nlpt myun tdpm'; // Replace with the App Password generated from your Google Account
//     $mail->Port       = 587;

//     $mail->setFrom('saimsachwany@gmail.com'); // Replace with your Gmail email
//     $mail->addAddress($email);
//     $mail->isHTML(true);
//     $mail->Subject = $SUBJECT;

//     if ($status == "ins") {
//         $mail->Body    = "Hello Update $name,<br><br>This is the update body.";
//     } else {
//         $mail->Body    = "Hello $name,<br><br>Thank you for signing up on Your Website!";
//     }

//     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     if ($mail->send()) {
//         // Redirect based on the role after successful signup
//         if ($role == 0) {
//             // User dashboard redirect
//             echo "
//                 <script>
//                     alert('Signup successful. Confirmation email sent.');
//                     document.location.href='../user/home.php';
//                 </script>
//             ";
//         } elseif ($role == 1) {
//             // Admin dashboard redirect
//             echo "
//                 <script>
//                     alert('Signup successful. Confirmation email sent.');
//                     document.location.href='../index.php';
//                 </script>
//             ";
//         }
//     } else {
//         echo "Email not sent. Error: {$mail->ErrorInfo}";
//     }
// }

// Assuming $conn is your database connection

?>
