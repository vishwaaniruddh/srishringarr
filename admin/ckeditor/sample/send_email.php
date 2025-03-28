<?
$message = $_REQUEST['sa'];


$to       = 'vishwaaniruddh@gmail.com';
$subject  = 'Your email subject here';

// Carriage return type (RFC).
$eol = "\r\n";

$headers  = "Reply-To: Name <vishwaaniruddh@gmail.com>".$eol;
$headers .= "Return-Path: Name <vishwaaniruddh@gmail.com>".$eol;
$headers .= "From: Name <vishwaaniruddh@gmail.com>".$eol;
$headers .= "Organization: Hostinger".$eol;
$headers .= "MIME-Version: 1.0".$eol;
$headers .= "Content-type: text/html; charset=iso-8859-1".$eol;
$headers .= "X-Priority: 3".$eol;
$headers .= "X-Mailer: PHP".phpversion().$eol;


//mail($to, $subject, $message, $headers);

echo 'mail sent'; 
