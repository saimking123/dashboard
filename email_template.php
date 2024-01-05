<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';  
require 'phpmailer/src/SMTP.php';


$to = "saimsachwnay@gmail.com";
$sub = "Testing the mail";
$msg = "";
$hed = 'MIME-Version : 1.0' . "\r\n";
$hed .= 'Content-type : text\html;
        charset=iso-8859-1' . "\r\n";
        mail($to,$sub,$msg,$hed); 
?>