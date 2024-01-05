<?php
include("connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';  
require 'phpmailer/src/SMTP.php';
// function emailsending($status){

//     if($status == 'Update')
//     {
//         // Code to handle update email
//         echo "Update email sent";
//     }
//     else if($status == 'add')
//     {
//         echo "add email sent";
//     }
//     else if($status == 'ins')
//     {
//         echo "insert email sent";   
//     }
//     else if($status == 'add')
//     {
//         echo "Update email sent";
//     }
//     else{
//         echo "Invalid status";
//     }
   
// }
// switch ($query_param) {
//     case 'update':
//         emailsending('update');
//         break;
//     case 'add':
//         emailsending('add');
//         break;
//     case 'ins':
//         emailsending('add'); // Assuming 'ins' should trigger the 'add' email
//         break;
//     default:
//         // Handle other cases if needed
//         echo "Unknown param";
//         break;
// }




// $status = "";

//     if($status == 'Update')
//         {
//             // Code to handle update email
//             echo "Update email sent";
//         }
//         else if($status == 'add')
//         {
//             echo "add email sent";
//         }
//         else if($status == 'insert')
//         {
//             echo "insert email sent";   
//         }
//         else if($status == 'add')
//         {
//             echo "Update email sent";
//         }
//         else{
//             echo "Invalid status";
//         }

function attechment_mailer($to, $subject, $status, $attachmentPath)


{
    $mail = new PHPMailer(true);
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'saimsachwany@gmail.com';                     //SMTP username
    $mail->Password   = 'hxib ksay lbbk tbzt';                               //SMTP password
    $mail->SMTPSecure = 'tls';                                  //Enables TLS encryption; `PHPMailer::ENCRY
                                                      //Enable implicit TLS encryption
    $mail->Port       = 587;   
                                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->addAttachment($attachmentPath);
    
    //Recipients
    $mail->setFrom('saimsachwany@gmail.com');
    $mail->addAddress($to);
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $status;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();

}



        //Only form the mail
            function stmp_mailer($to, $subject, $status)
            {
            $mail = new PHPMailer(true);
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'saimsachwany@gmail.com';                     //SMTP username
            $mail->Password   = 'hxib ksay lbbk tbzt';                               //SMTP password
            $mail->SMTPSecure = 'tls';                                  //Enables TLS encryption; `PHPMailer::ENCRY
                                                              //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('saimsachwany@gmail.com');
            $mail->addAddress($to);
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $status;
            
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $message = file_get_contents("../form/email_page.php");
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: saimsachwany@gmail.com' . "\r\n";
        
            // Send the email
            mail($to, $subject, $message, $headers);
            // $htmlContent = file_get_contents("email_template.html");
            $mail->send();

// echo stmp_mailer('saim2109d@aptechgdn.net','test subject',$status);
}
?>
