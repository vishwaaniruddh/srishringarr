<?php session_start();
include('config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

function get_product($parameter,$type,$id){
    global $con;    
    
	if($type==1)
	{
	 $qrydt="select product_code,product_id from product where product_id='".$id."'";
	}
	else
	{
	   $qrydt="select gproduct_code,gproduct_id from garment_product where gproduct_id='".$id."'";
	}
	$qrypro=mysqli_query($con,$qrydt);
    $fetchp=mysqli_fetch_array($qrypro);
    
    return $fetchp[0];

}


$order_id = $_REQUEST['oid'];

$sql = mysqli_query($con , "SELECT * FROM Order_ent WHERE id = '".$order_id."'");

$sql_result = mysqli_fetch_assoc($sql);
$total_amount = $sql_result['amount'];
$txn_id = $sql_result['transaction_id'];
$shipping = $sql_result['shipping_charges'];
$userid = $sql_result['user_id'];
$date = $sql_result['date'];
$total_gst = $sql_result['cgst']+$sql_result['igst']+$sql_result['igst'];



// $shipping_charges = get_shipping_charges($total_amount);


 $date=date("d-M-Y h:i:s A", strtotime($date)); 

$user_sql = mysqli_query($con,"select * from Registration where registration_id = '".$userid."'");
$user_sql_result = mysqli_fetch_assoc($user_sql);

$fname = $user_sql_result['Firstname'];
$lname = $user_sql_result['Lastname'];
$address = $user_sql_result['address'];
$name = $fname.' '.$lname;
$mobile = $user_sql_result['Mobile'];









?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SHRINGAAR</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<script type="text/javascript" src="paging.js"></script>
<script type="text/javascript">     





        function PrintDiv() {    
           var divToPrint = document.getElementById('bill');
           var popupWin = window.open('', '_blank', 'width=800,height=500');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
           popupWin.document.close();
                }
		function rollback(){
			document.getElementById("bdy").innerHTML="Transaction is rolled back. Please refresh this page to complete the transaction!";
			//document.getElementById("pageNavPosition").innerHTML="";
			}
		
</script>
<body id="bdy">

<style>
body{
    font-size:10px;
}
td{
    padding:3px;
}
    .tnc li{
        font-size:12px;
    }
    p{
        margin:0;
        padding:0;
    }
    pre{
        display:none;
    }
</style>

<div id="bill">

        <p style="text-align:center;"><B><U> CONFIRMATION MEMO </U></B></font></p>
        
        
        
<table width="826" border="0" align="center">
<tr>
<td width="820" height="42">
    
    <table width="100%">
       <tr>
          
          <td style="padding:0px; margin:0px;">
              <div><u><b style="font-size:11px;">We Rent, Sell And Customise </b></u></div>
              <ul style="margin:0;font-size:10px;">
                  <li>Bridal Jewellery & Accessories</li>
                  <li>Lehenga, Evening Gowns, Blouse</li>
                  <li>All Kinds Of Jewellery & Outfits</li>
              </ul>
              <br>
              
              <div><b><u style="font-size:11px;">Bank Account Details</u></b></div>
              <div style="font-size:10px;">SRI SHRINGARR FASHION STUDIO</div>
              <div style="font-size:11px;">HDFC Bank A/C No : 50200010838727</div>
              <div style="font-size:11px;">IFSC: HDFC0000227. Vile Parle (E) Branch</div>
              <div style="font-size:11px;">Contact : Nipa Agrawal: +91-8928272568</div>
          </td>
          
          <td style="padding:0px; margin:0px;">
              <img src="sri_logo.jpg" width="250px"/>
          </td>
          
          <td style="padding:0px; margin:0px;" style="font-size:11px;">
              <div>Shyamkamal Building B,</div>
              <div>Wing B/1, Flat No.104,1st Floor,</div>
              <div>Agarwal Market, Vile Parle (East),</div>
              <div>Mumbai-400057, India.</div>
              <div>Phone - +91-9324243011/ +91-7400413163</div>
              <div>Email - rajanipodar@gmail.com</div>
              <div>GST - 27ADRPP988P1ZW</div>
              
          </td>
       
       </tr>
       </table>
       
       <hr style="margin:3px;border-top: 1px solid #000;">








    <table width="100%">
       <tr>
           <td>
            <div style="width: 300px; height:30px;"><b> Name :</b><?php echo $name ; ?>
            <br/><b>Contact No: </b><?php echo $mobile; ?>
            <br/><b> Address : </b><?php echo $address; ?> <br/>
            <b> Bill. No. </b><?php echo $order_id; ?><br/><b> Date: </b><?php echo $date; ?></div>
           </td>
           
           
           <td>
               
               <div style="width: 320px;">
                   <br>
                   <b><u>TERMS & CONDITION:</u></b>
          <ul style="padding: 0;">
              <li>Once An Order Is Booked, It Will Not Be Changed, Exchange Or Cancelled.</li>
              <li>No Money Will Be Refunded.</li>
              <li>The Full Amount Of Rent Is To Be Given On The Day Of Booking.</li>
              <li>Rental Is For 3 Days Only, 10% Extra For Each Day.</li>
              <li>Security Deposit Is Compulsory.</li>
              <li>Any Damage Done Will Be Deducted From The Security Deposit.</li>
              <li>Subject To Mumbai Jurisdiction.</li>
              <li>Fixed Price No Bargaining.</li>
            </ul>
               </div>
           </td>
        </tr>
        
    
</table>



  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <font size="2" >
  
  <table width="100%" border="1" cellpadding="4" cellspacing="0" id="results">
  <tr>
    <th style="padding:3px;" width="96"><font size="2"><u><center>SR NO.</center></u></font></th>
    <th style="padding:3px;" width="96"><font size="2"><u><center>ITEM CODE</center></u></font></th>
    <th style="padding:3px;" width="130"><u>Price</u></th>
    <th style="padding:3px;" width="96"><font size="2"><u><center>Quantity</center></u></font></th>
    <th style="padding:3px;" width="86"><font size="2"><u><center>Discount</center></u></font></th>
    <th style="padding:3px;" width="86"><font size="2"><u><center>Discount Per Item</center></u></font></th>
    <th style="padding:3px;" width="110"><font size="2"><u><center>GST %</center></u></font></th>
    <th style="padding:3px;" width="119"><font size="2"><u><center>Amount(inc gst)</center></u></font></th>
  </tr>
  
  <?php
$i=1;
$total_qty = 0 ;
$detail_sql = mysqli_query($con,"select* from order_details where order_id='".$order_id."'");
while($pro_sql_result = mysqli_fetch_assoc($detail_sql)){ 


    $pro_amount = $pro_sql_result['product_amt'];
    $pro_qty = $pro_sql_result['qty'];
    $pro_type = $pro_sql_result['product_type'];
    $product_id = $pro_sql_result['product_id'];
    
    $total_qty = $total_qty + $pro_qty ;
    if($pro_type ==1 ){
        $product_name = get_product('product_code',$pro_type,$product_id);        
    }
    else{
        $product_name = get_product('gproduct_name',$pro_type,$product_id);
    }
    
    if(!$product_name){
        $product_name = '--';
    }



?>
  
  <tr>
    <td align="center"><?php echo $i; ?></td>
    <td align="center"><?php echo $product_name; ?></td>
    <td align="center"><?php echo $pro_amount; ?></td>
    <td align="center"><?php echo $pro_qty; ?></td>
    <td align="center"><?php echo '--'; ?></td>
    <td align="center"><?php echo '--'; ?></td>
    <td align="center">
        <? if($pro_type==1){
    echo '3%';    
}
else{
    if($pro_amount<1060){
            echo '6%';    
    }
    else{
            echo '12%';    
    }
}
?>

        </td>
    <td align="center"><?php echo $pro_amount; ?></td>
  </tr>
 
 
   
<? $i++; } ?>
 
 <tr>
     <td colspan="7" style="text-align:right;">GST (Included in Total) </td>
     <td> <? echo $total_gst ; ?></td>
 </tr> 
 
 <tr>
     <td colspan="4">Total Quantity : <? echo $total_qty; ?></td>
     <td colspan="3">Total: </td>
     <td><? echo $total_amount . '.00'; ?></td>
 </tr>
 
 
</table>
</font>

</td>
</tr>
     
</tr>



</table>

<div style="width:826px; margin:auto; padding-top: 30px; text-align: right; padding-bottom: 11px;">
    <p><b>SRI SHRINGARR FASHION STUDIO</b></p>
</div>

<div style="width:826px; margin:auto; text-align: right; padding: 40px;"> 
    <p><b>AUTH. SIGNATORY</b></p>
</div>



</div>
<br/><br/>
<div id="pageNavPosition"></div>
<center><a href="#" onclick='PrintDiv();'>Print</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</center>
<br><br>
<br><br>
</body>
</html>