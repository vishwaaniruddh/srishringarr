<?php
session_start();
include("access.php");
	include("config.php");
include("menubar.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AVOUPS-<?php echo $_SESSION['user']; ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="menu.css" rel="stylesheet" type="text/css" />
<link href="popup.css"  rel="stylesheet" type="text/css">
<!--datepicker-->
<link href="datepicker/date_css.css" rel="stylesheet" type="text/css" />
<script src="datepicker/datepick_js.js" type="text/javascript"></script>
<script src="popup.js" type="text/jscript" language="javascript"> </script>

<?

	$qry=mysqli_query($con1,"select srno from login where username='".$_SESSION['user']."'");

	$row=mysqli_fetch_row($qry);
	
	$qry2=mysqli_query($con1,"select engg_id, engg_name from area_engg where loginid='".$row[0]."'");

	$result=mysqli_fetch_row($qry2);
    $engg_id=$result[0];
    $engname=$result[1];

?>
<body>
<center>
<table width="700" border="1" cellpadding="2" cellspacing="0" class="res">
<th>Complain ID</th>
<th>Engineer name</th>
<th width="49">ATM</th>
<th width="49">Site Status</th>
<th width="68">Bank</th>
<th width="58">Area</th>
<th width="58">State</th>
<th width="58">Address</th>
<th width="150">Problem</th>
<th width="150">Alert Date/Time</th>
<!--<th width="58">Assets / Qty</th> -->
<th width="106">Status</th>
<th width="200">Last Update</th>


<?php
$qry="select * from alert where alert_id in (select alert_id from alert_delegation where engineer='".$engg_id."') ";

$qry.=" and status='Delegated' and call_status='1'";


$sq=mysqli_query($con1,$qry);


	while($row2=mysqli_fetch_row($sq))
	{
if($row2[21] ==  'amc')
$atm=mysqli_query($con1,"select atmid from Amc where amcid='".$row2[2]."'");
	if($row2[21] == 'site')
	$atm=mysqli_query($con1,"select atm_id from atm where track_id='".$row2[2]."'");
	
$atmrow=mysqli_fetch_row($atm);
$atm_id=$atmrow[0];
if ($atm_id=='') { $atm_id= $row2[2];}

if($row2[21] ==  'amc') { $site= "AMC" ; }
if($row2[21] ==  'site') { $site= "Warranty" ; }
if($row2[21] ==  '') { $site= "PCB" ; }

$branch=$row2[7];

$count=$count+1;

?>
<tr class="<?php if($count%2==0){ echo "res1"; } else{ echo "res2"; }  ?>">
<td><?php echo $row2[25]; ?></td>
<td><?php echo $engname; ?></td>

<td><?php echo $atm_id; ?> </td>

<td><?php echo $site; ?></td>

<td><?php echo $row2[3]; ?></td>
<td><?php echo $row2[4]; ?></td>
<td><?php echo $row2[27]; ?></td>
<td><?php echo $row2[5]; ?></td>
<td><?php echo $row2[9]; ?> </td> <!-- Problem -->

 
  <td><?php 
echo date("d/m/Y h:i:s a",strtotime($row2[10]));
 ?></td>

<td>
    <?php if($row2[15]=="Delegated" && $row2[16]=="1") { echo "Pending"; }
     if($row2[15]=="Delegated" && $row2[16]=="Rejected") { echo "Delegated but Branch Rejected"; }
     if($row2[15]=="Done" && $row2[16]=="Rejected") { echo "Engr Closed but Branch Rejected"; }
     if($row2[15]=="Pending" && $row2[16]=="Rejected") { echo "Branch Rejected"; }
     if($row2[15]=="Done" || $row2[16]=="Done") { echo "Closed"; } ?>
</td>

<td valign="top">
<!-- <div height="100px" style="height:50px; width:150px; overflow:hidden;"> -->
<div height="100px" style="width:150px; ">
<?php //============Updates=========	
$tab=mysqli_query($con1,"select feedback,standby,feed_date from eng_feedback where alert_id='".$row2[0]."' order by feed_date DESC limit 1");
	$row1=mysqli_fetch_row($tab);
if(mysqli_num_rows($tab)>0){

 echo wordwrap($row1[0],50,"<br />\n",TRUE);
 ?>

<!--<a href="javascript:void(0);" onclick="newwin('masteralert.php?id=<?php echo $row2[0] ?>','display',700,700)" class="update">
<a href='masteralert.php?id=<?php echo $row2[0] ?>','display',700,700' class="update"> 

<?php echo date('d/m/Y h:i:s a',strtotime($row1[2]))."<br>".wordwrap($row1[0],10,"<br />\n",TRUE); ?></a> -->
<?php
}
else
echo "No Updates so far";
?>
</div>

</td>
</tr>
<?php }  	

?>
</table>
<form name="frm" method="post" action="view_distmap.php" target="_new">
<input type="hidden" name="qr" value="<?php echo $qry; ?>" readonly>
<input type="submit" name="cmdsub" value="View Map" >
</form>
 
<div id="bg" class="popup_bg"> </div> 

</center>
</body>