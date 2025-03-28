<?php
$from  = "rajeshrungta719@gmail.com";
 $header = "From:".$from." \r\n";
       //  $header .= "Cc:prabir.d06@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";

mail ("hellbinderkumar@gmail.com","test","test",$header);
function send_mail($trackid, $trackurl,$msg,$mail){
    $to = $mail;
    $subject = "Tracking Details";
         //$message = "<b>Details of the Interested person.</b>";
         $message .= "<h1>Tracking Id :".$trackid."<br>Tracking URL : ".$trackurl."<br>Message : ".$message."  </h1>";
         $header = "From:".$from." \r\n";
       //  $header .= "Cc:prabir.d06@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";

         $retval = mail ($to,$subject,$message,$header);
         if($retval == true ){
            
             echo '<script>alert("Message Sent!!!")</script>';
             
         }
}




?>