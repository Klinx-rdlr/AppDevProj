<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/vendor/autoload.php";

define('MALHOST', "smtp.gmail.com");
define('USERNAME', "202210865@fit.edu.ph");
define('PASSWORD', "lzce vscs azst wwae");

$mail = new PHPMailer(true);

$mail->isSMTP();

$mail->SMTPAuth = true;

$mail->Host = MALHOST;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->Username = USERNAME;
$mail->Password = PASSWORD;

$mail->isHTML(true);

return $mail;