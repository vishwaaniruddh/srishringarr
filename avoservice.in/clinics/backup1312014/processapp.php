<?php 
include('config.php');

$id=$_POST['patient_id'];
$name=$_POST['name'];
$appdate=$_POST['appdate'];
//$hr=$_POST['hour'];
//$min=$_POST['min'];
//$time= $hr.":".$min;
$type=$_POST['type'];
$hosp=$_POST['hos'];
$new=$_POST['new'];
$rema=$_POST['rem'];
//$ch1=$_POST['ch1'];
$block_id=$_POST['block_id'];
$slot=$_POST['sl'];
$ch=$_POST['ch'];
if(isset($_POST['submit']))
{

$sq12=mysql_query("select * from `machine_code` where machine_name='Net'");
$max12=mysql_fetch_row($sq12);

//till here
$sq=mysql_query("select max(app_id) from `appoint`");
$max=mysql_fetch_row($sq);
//echo $max[0];
$newpatid=$max[0]+1;
$newsrno=$max12[0]."-".$newpatid;
$center=$_POST['center'];
$sql="insert into `appoint`(name,no,type,hospital,app_date,new_old,remarks,block_id,slot,app_real_id,app_id,center,confirmstat) values('$name','$id','$type','$hosp',STR_TO_DATE('".$appdate."','%d/%m/%Y'),'$new','$rema','$block_id','$slot','$newsrno','$newpatid','".$center."','c')";
$result=mysql_query($sql);
if($result)
{
	
header("location: view_patient1.php");

}
else
echo "error Inserting data"; 

}

else{

$sq12=mysql_query("select * from `machine_code` where machine_name='Net'");
$max12=mysql_fetch_row($sq12);

//till here
$sq=mysql_query("select max(app_id) from `appoint`");
$max=mysql_fetch_row($sq);
//echo $max[0];
$newpatid=$max[0]+1;
$newsrno=$max12[0]."-".$newpatid;

$sql="insert into `appoint`(name,no,type,hospital,app_date,new_old,remarks,block_id,slot,app_real_id,app_id,center,confirmstat) values('$name','$id','$type','$hosp',STR_TO_DATE('".$appdate."','%d/%m/%Y'),'$new','$rema','$block_id','$slot','$newsrno','$newpatid','".$center."','w')";
//echo $sql;
$result=mysql_query($sql);
if($result)
{
	
//header("location: view_patient1.php");

}
else
echo "error Inserting data";

}

?>