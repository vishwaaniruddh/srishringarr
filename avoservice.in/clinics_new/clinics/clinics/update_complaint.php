<?php 
include('config.php');

$id=$_POST['compid'];
$name=$_POST['compname'];

$sql="update complaints set complaint ='".$name."' where complaint_id='".$id."'";

$result=mysql_query($sql);
if($result)
{
	
header("location: home.php");

}
else
echo "error Inserting data";
?>