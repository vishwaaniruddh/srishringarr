<?php

include('config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once 'phpmail/src/PHPMailer.php';
require_once 'phpmail/src/Exception.php';
require_once 'phpmail/src/SMTP.php';

// include('sendmail.php');

$order = $_POST['orderid'];
$trackid =  $_POST['trackid'];
$trackurl =  $_POST['trackurl'];
$status =  "Ready_To_Dispatch";
$datetime = $_POST['date'];
$user_mail = $_POST['mailadd'];
$msg = $_POST['msg'];

$pickup_date = $_POST['pickupdate'];
$return_date = $_POST['returndate'];
$deposit_date = $_POST['depositdate'];
$return_deposit_amt = $_POST['ref_deposit_date'];
$sku = $_POST['sku'];
$name = $_POST['username'];

// $from = "yosshita.neha@gmail.com";
$from = "work.rajeshb@gmail.com";
$datetime = date('Y-m-d H:i:s',strtotime($datetime));

// $recipient = array(
//     $user_mail => $name
//     );


$insertsql = mysqli_query($con,"insert into order_detail_history (`order_id`, `tracking_id`, `tracking_url`, `status`,`mail_address`,`message`,`order_datetime`) value ('".$order."','".$trackid."','".$trackurl."','".$status."','".$user_mail."','".$msg."','".$datetime."')");

if($insertsql)
{
    $ordersupdatehistory_insert = mysqli_query($con,"insert into `order_status_update_history` (`order_id`, `tracking_id`, `tracking_url`, `status`,`mail_address`,`message`,`order_datetime`) values ('".$order."','".$trackid."','".$trackurl."','".$status."','".$user_mail."','".$msg."','".$datetime."') ");
    // send_mail($trackid, $trackurl,$msg,$mail);

    
    if($from!='')
    {
            $status1 = str_replace("_"," ",$status);
           
            $EmailSubject="Courier Tracking Details !";
            
            $MESSAGE_BODY=""."<br/>";
            $MESSAGE_BODY.="Sincerely, "."\r\n"."<br/>";
            $MESSAGE_BODY.="Sri Shringarr Fashion Studio"."\r\n";
            
            $message = "Hello ".'<b>'.$name.",".'</b>'."\r\n"."<br><br>";
            $message .= $msg."\r\n"."<br><br>";
            
            $message .= "Pickup Date : ".$pickup_date."\r\n"."<br/>";
            $message .= "Return Date : ".$return_date."\r\n"."<br/>";
            $message .= "Deposit Date : ".$deposit_date."\r\n"."<br/>";
            $message .= "Refundable Deposit Amount : ".$return_deposit_amt."\r\n"."<br/>";
            $message .= "SKU : ".$sku."\r\n"."<br/>";
            $message .= "\r\n"."<br/>";
            
            $message .= "Order ID : ".$order."\r\n"."<br/>";
            $message .= "Tracking ID : ".$trackid."\r\n"."<br/>";
            $message .= "Tracking URL : ".$trackurl."\r\n"."<br/>";
            $message .= "Status : ".$status1."\r\n"."<br/>";
            $message .= "Date/Time : ".$datetime."\r\n"."<br/>";
            
            $mailheader = "From: ".$from."\r\n"; 
            $mailheader .= "Reply-To: ".$user_mail."\r\n"; 
            
            
            
            $mail = new PHPMailer(true);
            
            try {
            // 	$mail->SMTPDebug = 2;									
            	$mail->isSMTP();											
            	$mail->Host	 = 'smtp.gmail.com;';					
            	$mail->SMTPAuth = true;							
            	$mail->Username = 'work.rajeshb@gmail.com';				
            	$mail->Password = 'rajesh@5672';						
            	$mail->SMTPSecure = 'tls';							
            	$mail->Port	 = 587;
            
            	$mail->setFrom('work.rajeshb@gmail.com', 'Sri Shringarr Fashion Studio');
            // 	foreach($recipient as $mail => $name){
            // 	    $mail->setAddress($mail,$name);
            // 	}
            	
            	$mail->mailheader=$mailheader;
            	$mail->AddReplyTo($user_mail);
                $mail->addCC('hellbinderkumar@gmail.com');
                $mail->addCC('akruti.manjrekar96@gmail.com');
            	
            	$mail->isHTML(true);
            	
            	$mail->Subject = $EmailSubject."\r\n";
            	$mail->Body = $message."\r\n".$MESSAGE_BODY;
            	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
            	$mail->send();
            	
            	echo '<script>alert("Inserted!!!")</script>';
                echo '<script>window.location="https://srishringarr.com/yn/Admin/shringarr/orders.php"</script>';
                } 
                
                catch (Exception $e) {
                // 	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                	echo '<script>alert("Error!!!")</script>';
                    echo '<script>window.location="https://srishringarr.com/yn/Admin/shringarr/orders.php"</script>';
                }
    }
}
?>