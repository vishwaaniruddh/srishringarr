<?php
include('config.php');
$sdate=$_POST['sdate'];
$sd=$_POST['sd'];
$id=$_POST['id'];
//echo $sd;
if($sd==1)
{
$sql="update phppos_service set service_date1=STR_TO_DATE('".$sdate."','%d/%m/%Y') where cust_id='$id'";
}
else if($sd==2)
{
$sql="update phppos_service set service_date2=STR_TO_DATE('".$sdate."','%d/%m/%Y') where cust_id='$id'";
}
else if($sd==3)
{
$sql="update phppos_service set service_date3=STR_TO_DATE('".$sdate."','%d/%m/%Y') where cust_id='$id'";
}
else
$sql="update phppos_service set service_date4=STR_TO_DATE('".$sdate."','%d/%m/%Y') where cust_id='$id'";

$res=mysql_query($sql);

if($res)
{
header('Location:cust_service.php');
}
else
echo "Error Changing Service Date";

?>