<?php
	//Include database connection details
	include('db_conn.php');
	
	//Array to store validation errors
	function clean($str2) 
	{
		$str = @trim($str2);
		if(get_magic_quotes_gpc()) 
		{
			$str2 = stripslashes($str2);
		}
		return mysqli_real_escape_string($str2);
	}
	$response=array();
	
//	if(isset($uname)){
	$login = clean($_GET['uname']);
	$password = clean($_GET['pass']);
//	}
//	else{
//	if(isset($macid)){
        $macid=$_GET['macid']; //echo "mac:".$macid;
	//Create query	
	$resultx=mysqli_query($conapp,"select logid from notification_tble where mac_id='".$macid."'");
	$rowx=mysqli_fetch_row($resultx);
	$resultx1=mysqli_query($conapp,"select username,password from login where srno='".$rowx[0]."'");
	$rowx1=mysqli_fetch_row($resultx1);
	$login=$rowx1[0];
	$password=$rowx1[1];
//	  }
//	}
	$qry="SELECT * FROM login WHERE username='".$login."' AND password='".$password."' and designation='4' and status='1'";
	
//	echo $qry;
	$result=mysqli_query($conapp,$qry);
	
	//Check whether the query was successful or not
	if($result)
	{//echo mysqli_num_rows($result);
		if(mysqli_num_rows($result) == 1)
		 {
		 $str=array();
		
			//Login Successful
			//session_regenerate_id();
			$eng= mysqli_fetch_row($result);
			
		 $br=$eng[3];
		 $desig=$eng[4];
		 
		 
		 
			$qr=mysqli_query($conapp,"select srno from login where username='".$login."'");
	$row=mysqli_fetch_row($qr);
	//echo $row[0];
	//echo "select engg_id from area_engg where loginid='".$row[0]."'";
	$qry2=mysqli_query($conapp,"select engg_id from area_engg where loginid='".$row[0]."'");
	$ro=mysqli_fetch_row($qry2);	
	//echo "Select * from alert_delegation where engineer='".$row2[0]."' and alert_id in (select alert_id from alert where call_status<>'Done')";
	
	$sql1=mysqli_query($conapp,"Select * from alert_delegation where engineer='".$ro[0]."' and call_close_status=0 and status=0 and alert_id in (select alert_id from alert where ( call_status<>'Rejected' and status<>'Done' and call_status<>'Done'))");


while($row1=mysqli_fetch_row($sql1)) {
	$atmrow='';
	$atmid='';
	$sql2=mysqli_query($conapp,"select * from alert where alert_id='".$row1[3]."'");	
	$row2=mysqli_fetch_row($sql2);

if($row2[21] ==  'amc')
    $atm=mysqli_query($conapp,"select atmid from Amc where amcid='".$row2[2]."'");

elseif($row2[21] == 'site')
	$atm=mysqli_query($conapp,"select atm_id from atm where track_id='".$row2[2]."'");

 $atmrow=mysqli_fetch_row($atm);
   $atmid=$atmrow[0];
   
 if($atmid=='') { $atmid = $row2[2]; }

/*  if($row2[17]=='new temp' || $row2[17]=='temp_pm' || $row2[17]=='temp_dere' || $row2[17]=='temp_servi' || $row2[17]=='temp_w2pcb'){ $atmid=$row2[2]; }else {  
  $atmrow=mysqli_fetch_row($atm);
   $atmid=$atmrow[0];  } */
   
 
 
  if($row2[9]!='')
  $problem=$row2[9];
  else
  $problem=$row2[17];

  if($row2[21]=='site')
  $sitestatus='Warranty';
  else if($row2[21]=='amc')
  $sitestatus='AMC';
  else
  $sitestatus='PCB';

  if($row2[17]=='new')
  $calltype='Installation';
  else if($row2[17]=='new temp' || $row2[17]=='service' )
  $calltype='Service';
  else if($row2[17]=='temp_pm' || $row2[17]=='pm' )
  $calltype='PM';
  else if($row2[17]=='dere' || $row2[17]=='temp_dere' )
  $calltype='DERE';
  
  else $calltype='PM';

	$cl=mysqli_query($conapp,"select cust_id,cust_name from customer where cust_id='".$row2[1]."' ");
        $clro=mysqli_fetch_array($cl);


	 if($row2[15]!='Done')
	 $engstat="Pending";
	 else
	 $engstat="Done";

	 $str[]=array( 'compid' => $row2[25],'atmid'=>$atmid,'address'=>$row2[5],'callid'=>$row2[0],'engid'=>$row[0],'engstat'=>$engstat,'contactperson'=>$row2[12],'phone'=>$row2[13],'bank'=>$row2[3],'problem'=>$problem,'eta'=>$row2[31],'customerName'=>$clro[1], 'siteStatus'=>$sitestatus,'callType'=>$calltype);	
//$str[]=array( 'compid' => $row2[25],'atmid'=>$atmid,'address'=>$row2[5],'callid'=>$row2[0],'engid'=>$row[0],'engstat'=>$engstat,'contactperson'=>$row2[12],'phone'=>$row2[13],'bank'=>$row2[3],'problem'=>$problem,'eta'=>$row2[31],'customerName'=>$clro[1]);	
	}
	    
// 		echo json_encode($str);
var_dump($str);
		}
		else 
		{
			//Login failed
			$str=-1;
			echo json_encode($str);
		}
	}
	else
	{
	$str=-1;
	echo json_encode($str);
	}
	//$res="uname = ".$_POST['uname']." password".$_POST['pass'];
	
	
?>