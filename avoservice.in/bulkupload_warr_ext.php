<?php
include("config.php");

$date=date('Y-m-d');
//====Bahwan Punjab Police ==========
$sitedata= mysqli_query($con1,"select * from punjab_police_warr ");

while($row=mysqli_fetch_row($sitedata)) {
    
$invqry=mysqli_query($con1,"select po_id from so_order where inv_no='AVODEL222303367'" );
$invrow =mysqli_fetch_row($invqry);
$so_id=$invrow[0];

$saleqry=mysqli_query($con1,"select * from new_sales_order where so_trackid='".$so_id."'" );
$so=mysqli_fetch_row($saleqry);

$poqry=mysqli_query($con1,"select po_no, po_date from purchase_order where id='".$so[1]."'" );
$porow=mysqli_fetch_row($poqry);
$po=$porow[0];
$po_date=$porow[1];

$atm_id=$row[1];
$bank=$row[2];
$area=$row[3];  // if($area=='') { $area='NULL';}
$pin=$row[4]; if($pin=='') { $pin=0;}
$city=$row[5]; if($city=='') { $city='NULL';}
$state=$row[6];

$branch=$row[7]; // Branch_id
$address=$row[8];
//=====
$cust_id= $so[3]; // Customer Id
$start=$row[11];
$exp=$row[12];

$ref_id=$so[7];// Warehouse - atm_id in sales order

$atmqry=mysqli_query($con1,"select track_id from atm where atm_id='".$atm_id."'" );

if(mysqli_num_rows($atmqry) >0) {
/*
$atmup=mysqli_fetch_row($atmqry);
$track_id=$atmup[0];
$uatm="Update atm set cust_id = '".$cust_id."', so_id='".$so_id."', bank_name = '".$bank."', area='".$area."',city='".$city."', pincode='".$pin."', address = '".$address."',state1 = '".$state."', branch_id = '".$branch."', ref_id ='".$ref_id."', po = '".$po."', podate = '".$po_date."', active = 'Y', site_type= 'Bulk-Direct', start_date='".$start."', expdt = '".$exp."' where track_id='".$track_id."'";
echo $uatm."<br>";
$sql=mysqli_query($con1,$uatm);
*/
} else {

$atm="Insert into atm set atm_id = '".$atm_id."', so_id='".$so_id."', cust_id = '".$cust_id."', bank_name = '".$bank."', area='".$area."',city='".$city."', pincode='".$pin."', address = '".$address."',state1 = '".$state."', branch_id = '".$branch."', ref_id ='".$ref_id."', po = '".$po."', podate = '".$po_date."', active = 'Y', site_type= 'Bulk-Direct', start_date='".$start."', expdt = '".$exp."' ";
echo $atm."<br>";

$sql=mysqli_query($con1,$atm);
$track_id=mysqli_insert_id($con1);
}
if($sql) {

/*$assqry=mysqli_query($con1,"select * from new_sales_order_asset where so_trackid='".$so_id."'" );

while($asst=mysqli_fetch_row($assqry)) {

if($asst[3]=='UPS') { $qty=2; }
elseif($asst[3]=='Battery') {$qty=8; } else {$qty=1; }

$assetwry="insert into site_assets set cust_id ='".$cust_id."', po='".$po."', atmid='".$track_id."',so_id='".$so_id."', assets_name='".$asst[3]."', assets_spec='".$asst[4]."', valid='".$asst[6]."', quantity='".$qty."', status=1, po_date='".$po_date."', start_date='".$start."', exp_date='".$exp."', atm_trackid='".$track_id."', alert_id=0, type='Bulk'" ;
$insert=mysqli_query($con1,$assetwry);
echo $assetwry."<br>";   

} */
//=============UPS========
$valid='24,Months';
$spec = 1;
$qty = 1;

//$spec=$row[9]; // 3 kva master & slave
//$qty=$row[10]; // Qty


$assetwry="insert into site_assets set cust_id ='".$cust_id."', po='".$po."', atmid='".$track_id."',so_id='".$so_id."', assets_name='UPS', assets_spec='".$spec."', valid='".$valid."', quantity='".$qty."', status=1, po_date='".$po_date."', start_date='".$start."', exp_date='".$exp."', atm_trackid='".$track_id."', alert_id=0, type='Bulk'" ;
echo $assetwry."<br>";

$insert=mysqli_query($con1,$assetwry);



//=====Battery==============
$bvalid='24,Months';
$bspec=6; // 	
$bqty=3; // Qty

$battry="insert into site_assets set cust_id ='".$cust_id."', po='".$po."', atmid='".$track_id."',so_id=0, assets_name='Battery', assets_spec='".$bspec."', valid='".$bvalid."',quantity='".$bqty."', status=1, po_date='".$po_date."', start_date='".$start."', exp_date='".$exp."', atm_trackid='".$track_id."', alert_id=0, type='Bulk'" ;
$bqry= mysqli_query($con1,$battry);

echo $battry."<br>";
//echo $battry; 
}

}


?>