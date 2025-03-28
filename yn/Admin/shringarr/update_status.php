<?php
include('config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once 'phpmail/src/PHPMailer.php';
require_once 'phpmail/src/Exception.php';
require_once 'phpmail/src/SMTP.php';

$updatestatus=$_POST['status'];
$id = $_POST['id'];

$ordersupdatehistory = mysqli_query($con,"select * from `order_detail_history` where order_id = '".$id."' ");
while($ordersupdatehistory_details = mysqli_fetch_assoc($ordersupdatehistory))
{
    $orderid = $ordersupdatehistory_details['order_id'];
    $trackingid = $ordersupdatehistory_details['tracking_id'];
    $trackingurl = $ordersupdatehistory_details['tracking_url'];
    $mailadd = $ordersupdatehistory_details['mail_address'];
    $message = $ordersupdatehistory_details['message'];
    $timedate = $ordersupdatehistory_details['order_datetime'];
        $datetime_update = date('Y-m-d H:i:s',strtotime($timedate));
}

$ordersupdatestatus = mysqli_query($con,"select * from `order_status_update_history` where order_id = '".$id."' ");
while($ordersupdatestatus_details = mysqli_fetch_assoc($ordersupdatestatus))
{
    $date_time = $ordersupdatestatus_details['order_datetime'];
    $new_datetime = date('d/m/Y H:i:s',strtotime($date_time));
    // $status = $ordersupdatestatus_details['status'];
}


$updatesql = mysqli_query($con,"UPDATE `order_detail_history` SET `status`='".$updatestatus."' ");



if($updatesql)
{
    $ordersupdatehistory_insert = mysqli_query($con,"insert into `order_status_update_history` (order_id,tracking_id,tracking_url,status,mail_address,message,order_datetime) values ('".$orderid."','".$trackingid."','".$trackingurl."','".$updatestatus."','".$mailadd."','".$message."','".$datetime_update."') ");
    
    $status1 = str_replace("_"," ",$updatestatus);
           
    $EmailSubject="Courier Tracking Update !";
    
    $MESSAGE_BODY="";
    $MESSAGE_BODY.="Sincerely, "."\r\n";
    $MESSAGE_BODY.="Sri Shringarr Fashion Studio,"."\r\n";
    
    $message = $message."\r\n";
    $message .= "Tracking ID: ".$trackingid."\r\n";
    $message .= "Tracking URL: ".$trackingurl."\r\n";
    $message .= "Status: ".$status1."\r\n";
    $message .= "Date/Time: ".$new_datetime."\r\n";
    
    $mailheader = "From: ".$from."\r\n"; 
    $mailheader .= "To: ".$mailadd."\r\n";
    
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
    	$mail->addAddress=$mailadd;
    	$mail->mailheader=$mailheader;
    	
        $mail->addBCC('hellbinderkumar@gmail.com');
        $mail->addBCC('akruti.manjrekar96@gmail.com');
        
    	
    	$mail->isHTML(false);								
    	$mail->Subject = $EmailSubject."\r\n";
    	$mail->Body = $message."\r\n".$MESSAGE_BODY;
    
    	$mail->send();
            echo "<script>alert(!Updated Data!)</script>";
            echo '<script>window.location="https://srishringarr.com/yn/Admin/shringarr/orders.php"</script>';
        }
        catch (Exception $e) {
            echo "<script>alert(Error!!!)</script>";
            echo '<script>window.location="https://srishringarr.com/yn/Admin/shringarr/orders.php"</script>';
        }
}

?>
