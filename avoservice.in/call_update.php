<?php

session_start();
include("access.php");
include("config.php");
//include("access.php");
// echo $_SESSION['user']." ".$_SESSION['branch']." ".$_SESSION['designation'];

$id=$_GET['id'];

if(isset($_GET['eng_id']))
$eng_id=$_GET['eng_id'];

date_default_timezone_set('Asia/Kolkata');


$qr=mysqli_query($con1,"select `caller_email`,`call_status` ,`eng_left_site`,`status_left_site`,`update_status` from alert where alert_id='".$id."'");
$ro1=mysqli_fetch_row($qr);
$rolhide= date('d-m-Y',strtotime($ro1[2]));
//echo $ro1[4];
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="menu.css" rel="stylesheet" type="text/css" />
<link href="../datepicker/date_css.css" rel="stylesheet" type="text/css" />

<script>
    window.onunload = refreshParent;
    function refreshParent() {
     window.opener.location.reload();
    }
</script>

<script src="../datepicker/datepick_js.js" type="text/javascript"></script>
<script src="popup.js" type="text/jscript" language="javascript"> </script>


<script>
function validate(form){
 with(form){
 		
	   if(up.value=="" )
	   {
		alert("Please Enter Some Update.");
		up.focus();
		return false;
		}
		
	    
	//==Response or Reached site  validation
	if(document.getElementById('reach_site')!=null){
		
	 if(form.reach_site.checked==true){
		  validlogtime();
		  //==============Reached site validation================================
		if(rest.value=="" )
				{
				alert("Please Enter Proper Response Date of Eng Reached Site");
				//rest.focus();
				document.getElementById('rest').focus();
				return false;
				}
				
		if(eng_reach_time.value=="" )
				{				
				alert("Please Enter Proper Response Time of Eng Reached Site");
				//rest.focus();
				document.getElementById('eng_reach_time').focus();
				return false;
				}
				
		if(rminute.value=="")
				{		
				alert("Please Enter Proper Response Minute of Eng Reached Site");
				//rminute.focus();
				document.getElementById('rminute').focus();
				return false;
				}
				
		if(rmeri.value=="")
				{
				alert("Please Enter Proper AM or PM of Eng Reached Site");
				//rest.focus();
				document.getElementById('rmeri').focus();
				return false;
				}
		 }
	}
	//==Left site  validation
	if(document.getElementById('left_site')!=null){
	 if(form.left_site.checked==true){
		  validlogtime_leftsite();
			//==============Left site validation================================
			if(left_est.value=="" )
				{
				alert("Please Enter Proper Response Date of Eng Left Site");
				//rest.focus();
				document.getElementById('left_est').focus();
				return false;
				}
				
		if(eng_left_time.value=="" )
				{				
				alert("Please Enter Proper Response Time of Eng Left Site");
				//rest.focus();
				document.getElementById('eng_left_time').focus();
				return false;
				}
				
		if(left_min.value=="")
				{		
				alert("Please Enter Proper Response Minute of Eng Left Site");
				//left_min.focus();
				document.getElementById('left_min').focus();
				return false;
				}
				
		if(left_meri.value=="")
				{
				alert("Please Enter Proper AM or PM of Eng Left Site");
				//left_meri.focus();
				document.getElementById('left_meri').focus();
				return false;
				}										
		}
	}
	 if(confirm('Are you sure you want to Enter this Update.')) 
		   {
			return true;
		   }
		   else 
		    {
			return false;
			} 
	 
	}
		  
//return true;			 
 }


//=======Hide dvi of eta


function showMe(it,box){
	//alert("hi");
	var vis = (box.checked) ? "block" : "none"; 
	document.getElementById(it).style.display = vis;
	
			
	}
//============================eng reach site function
	function callclouser_reach_site(it,box){
		 if(box.checked==true){
			 document.getElementById('left_site').disabled=false;
			 //document.getElementById('left_site').checked = true;
			 //==reached the site
			document.getElementById('rest').disabled=false;
			document.getElementById('eng_reach_time').disabled=false;
			document.getElementById('rmeri').disabled=false;
			document.getElementById('rminute').disabled=false;
			document.getElementById('rest').value=document.getElementById('dt').value;
		 }else{
		 
		 	document.getElementById('left_site').disabled=true;
			document.getElementById('left_site').checked = false;
			//==reach the site
			document.getElementById('rminute').disabled=true;
			document.getElementById('rest').disabled=true;
			document.getElementById('eng_reach_time').disabled=true;
			document.getElementById('rmeri').disabled=true;
			document.getElementById('rest').value="";
			
			document.getElementById('callclose1').disabled=true;		
			document.getElementById('callclose4').disabled=true;
			//==left the site
			document.getElementById('left_est').disabled=true;
			document.getElementById('eng_left_time').disabled=true;
			document.getElementById('left_meri').disabled=true;
			document.getElementById('left_min').disabled=true;
			document.getElementById('left_est').value="";
		
			document.getElementById('callprtype').disabled=true;
			document.getElementById('rcheckbox').value='n';
		 }
	}
//===========================eng left site function============================== 
function callclouser(it,box){
	//alert("hi1"+it+box);
	if(box.checked==true){
	document.getElementById('callclose1').disabled=false;		
	document.getElementById('callclose4').disabled=false;	
	//==left the site
	document.getElementById('left_est').disabled=false;
	document.getElementById('eng_left_time').disabled=false;
	document.getElementById('left_meri').disabled=false;
	document.getElementById('left_min').disabled=false;
	document.getElementById('left_est').value=document.getElementById('dt').value;
	
	document.getElementById('restb').value=document.getElementById('dt').value;
	document.getElementById('callprtype').disabled=false; 
	document.getElementById('rcheckbox').value='y';
	}else{
		document.getElementById('callclose1').disabled=true;		
		document.getElementById('callclose4').disabled=true;
		//==left the site
		document.getElementById('left_est').disabled=true;
		document.getElementById('eng_left_time').disabled=true;
		document.getElementById('left_meri').disabled=true;
		document.getElementById('left_min').disabled=true;
		document.getElementById('left_est').value="";
	
		document.getElementById('callprtype').disabled=true;
		document.getElementById('rcheckbox').value='n';
		}
}
	
//======================================== CALL PROGRESS============	

/*function callclose_progress(it,box2){
	//alert("hi1"+it+box2);
	if(box2.checked==true){
		//alert("hi2");
		document.getElementById('callclose1').disabled=false;		
		document.getElementById('callclose4').disabled=false;
		document.getElementById('callclose5').disabled=false;
		document.getElementById('callclosetype').disabled=false;
		
		document.getElementById('rest').disabled=true;
		document.getElementById('eng_reach_time').disabled=true;
		document.getElementById('rmeri').disabled=true;
		document.getElementById('rminute').disabled=true;
		document.getElementById('reach_site').disabled=true;
		
		 
	
	}else{
		document.getElementById('callclose1').disabled=true;
		
		document.getElementById('callclose4').disabled=true;
		document.getElementById('callclose5').disabled=true;
		document.getElementById('callclosetype').disabled=true;
		
		document.getElementById('rest').disabled=false;
		document.getElementById('eng_reach_time').disabled=false;
		document.getElementById('rmeri').disabled=false;
		document.getElementById('rminute').disabled=false;
		document.getElementById('reach_site').disabled=false;
		
		
		}
} */

//========================================	CALL CLOSE TIME============
function callclose_closer(it,box3){
	//alert("hi1"+it+box3);
	if(box3.checked==true){
		//alert("hi2");
		document.getElementById('callclose2').disabled=false; 
		document.getElementById('callclose3').disabled=false;
		document.getElementById('left_site').style.display="none";
		 pno=document.getElementById('pno').value;
			//alert(pno);
			for(i=0;i<pno;i++){
			document.getElementById('prob_'+i).disabled=false;
			}
		document.getElementById('reach_site').style.display="none";
	}
}

//========================================	CALL PENDING TIME============
function callclose_pending(it,box3){
	//alert("hi1"+it+box3);
	if(box3.checked==true){
		//alert("hi2");
		document.getElementById('callclose2').disabled=true; 
		document.getElementById('callclose3').disabled=true;
		
		 pno=document.getElementById('pno').value;
			//alert(pno);
			for(i=0;i<pno;i++){
			document.getElementById('prob_'+i).disabled=true;
			}
		document.getElementById('left_site').style.display="block";
		document.getElementById('reach_site').style.display="block";
	}
}

//========================================REVISE UPDATE ============================

/*function reviseupdate(it,box4){	
	if(box4.checked==true){	

	document.getElementById('est').disabled=false;
	document.getElementById('time').disabled=false;
	document.getElementById('minute').disabled=false;
	document.getElementById('meri').disabled=false; 
	document.getElementById('reviup').disabled=false;
	document.getElementById('up').disabled=true;
	
	}
	else{		
		
		document.getElementById('est').disabled=true;
		document.getElementById('time').disabled=true;
		document.getElementById('minute').disabled=true;
		document.getElementById('meri').disabled=true;
		document.getElementById('reviup').disabled=true;
		document.getElementById('up').disabled=false;
		
		}		
   }*/
   
 //====================
 
 function getdate(id){	 
	  //alert(id);
	 document.getElementById('restb').value=id;
	 }
	 
 function gettime(id){	 
	// alert(id);
	 document.getElementById('eng_reach_timeb').value=id;
	 }  
   //====================
 function getmin(id){	 
	 //alert(id);
	 document.getElementById('rminuteb').value=id;
	 }
	 //====================
 function getmeri(id){	 
	 //alert(id);
	 document.getElementById('rmerib').value=id;
	 }
//============================Revise function =============

function reviseDate(id){
	// alert(id);
	 document.getElementById('esthid').value=id;
	}

function reviseTime(id){
	 //alert(id);
	 document.getElementById('timehid').value=id;
	}
	
function reviseMinute(id){
	 //alert(id);
	 document.getElementById('minutehid').value=id;
	}
	
function reviseMeri(id){
	// alert(id);
	 document.getElementById('merihid').value=id;
	}
	
function reviseUpdate(id){
	// alert(id);
	 document.getElementById('reviuphid').value=id;
	
	}
	
	
	//=============================

function showHide (id) 
{ 
var style = document.getElementById('hiderow').style 
if (style.visibility == "hidden") 
style.visibility = "visible"; 
else 
style.visibility = "hidden"; 
} 

//================check log time and response time here ================================================

function validlogtime(){

	dateSecond = document.getElementById('rest').value.split('/');
	rhour=document.getElementById('eng_reach_time').value;
	rminute=document.getElementById('rminute').value;

	var resdate = new Date(dateSecond[2], dateSecond[1], dateSecond[0]); //Year, Month, Date

			var dd = resdate.getDate(); //alert(dd);
            var mm = resdate.getMonth(); //alert(mm);
            var yyyy = resdate.getFullYear();//alert(YYYY);
			
			if(document.getElementById('rmeri').value=='pm'){
				rhour=12+parseInt(rhour);
			}
				var resdatenew = mm+'/'+dd+'/'+yyyy+' '+rhour+':'+rminute;
				var logtime=document.getElementById('clogtime').value;
				
				//alert(Date.parse(resdatenew ));
					if( Date.parse(resdatenew) <= Date.parse(logtime )) {
    						alert("You Can Not Enter Rsponse Time Befor "+ logtime+" Call Log. Please try again...");
							document.getElementById('rest').value="";
							document.getElementById('eng_reach_time').value="";
							document.getElementById('rminute').value="";
							document.getElementById('rmeri').value="";
							document.getElementById('rest').focus();
							
						}else{
								//alert("ok");	 
							}
						
			}

//================check log time and eng left site here=============================================

function validlogtime_leftsite(){

	dateSecond = document.getElementById('left_est').value.split('/');
	rhour=document.getElementById('eng_left_time').value;
	rminute=document.getElementById('left_min').value;
	var resdate = new Date(dateSecond[2], dateSecond[1], dateSecond[0]); //Year, Month, Date
			var dd = resdate.getDate(); //alert(dd);
            var mm = resdate.getMonth(); //alert(mm);
            var yyyy = resdate.getFullYear();//alert(YYYY);
			
			if(document.getElementById('left_meri').value=='pm'){
				rhour=12+parseInt(rhour);
			}
				var resdatenew = mm+'/'+dd+'/'+yyyy+' '+rhour+':'+rminute;
				var resp_time=document.getElementById('res_logtime').value;
			
					if( Date.parse(resdatenew) <= Date.parse(resp_time )) {
    						alert("You Can Not Enter Left Site Time Befor "+ logtime+" Reached at Site. Please try again...");
							document.getElementById('left_est').value="";
							document.getElementById('eng_left_time').value="";
							document.getElementById('left_min').value="";
							document.getElementById('left_meri').value="";
							document.getElementById('left_est').focus();
							
						}else{
								//alert("ok");	 
							}
						
			}
	 
</script>
<style>
h2{color:#F00;}

/*input[type="checkbox"]{
appearance: none;
border-radius: 1px;
box-sizing: border-box;
position: relative;
box-sizing: content-box ;
width: 30px;
height: 30px;
border-width: 0;
}*/
</style>


<!--<h2 align="center">Updates <a href="#" onclick="closepopup('<?php echo $id; ?>');"><span class="close_button">X</span></a></h2>-->

<body bgcolor="#009999" onLoad="">
<center>
<table border="1" width="70%">
<thead>
<tr><th colspan="3" align="center"> <h2 style="text-align:center">Previous Update</h2> </th> </tr>
<tr>
<th>Update</th>
<th>Date / Time</th>
<th>Updating Person</th>

</tr>
</thead>

<tbody>
<!--========PREVIOUS UPDATE DATA SHOW HERE ============================-->
<?php
    //============= SELECT DATA FROM  eng_feedback AND login TABLE==================
    
//	$qryfirst="select f.feedback,f.engineer,f.feed_date,l.designation from eng_feedback f,login l where f.alert_id='".$id."' and f.engineer=l.srno order by f.feed_date DESC";
//	echo $qryfirst;
	
$qryfirst = "select * from eng_feedback where alert_id='".$id."' "	;
	
	$tab=mysqli_query($con1,$qryfirst);
 
 	while ($row=mysqli_fetch_row($tab)) {

	// if($row[3]=='4')
	// $str="select `engg_name`, from area_engg where loginid='".$row[1]."'";
	// elseif($row[3]=='3')
	// $str="select head_name from branch_head where loginid='".$row[1]."'";
	 
//	 $up=mysqli_query($con1,$str);
	// $upro=mysqli_fetch_array($up);
//	 $upby=$upro[0];
	  ?>    

<tr>
<td><?php echo $row[3]; ?></td>
<td><?php if(isset($row[4]) and $row[4]!='0000-00-00') echo date('d/m/Y h:i:s a',strtotime($row[4])); ?></td>
<td><?php echo $row[2]; ?></td>
</tr>
<?php } ?>

		
        
<tr><td colspan="3" align="center"><h2>New Update</h2></td></tr>
<tr>

<form action="process_update1.php" method="post" name="form" onSubmit="return validate(this);">
<input type="hidden" name="ml" id="ml" value="<?php echo $ro1[0];  ?>" />

	<!--===========UPDATE ROW SHOW HERE===========================-->
    <table width="400">
    <tr>
    <td width="210" height="35">Update : </td>
    <td width="167">
    <textarea name="up" id="up" rows="4" cols="25"></textarea>
    </td>
    </tr>
    
    
    <?php 
   
   $exists_update_progress_qry=mysqli_query($con1,"SELECT * FROM `alert_progress` WHERE `alert_id` = '".$alertid."'");
   				//==================SELECT entry_date FROM ALERT TABLE===============
				$logcal_time=mysqli_query($con1,"select `entry_date`,`responsetime` from `alert` where `alert_id`='".$id."' ");
		  		$logcal_time1=mysqli_fetch_row($logcal_time);
				$logcal_time1[0];
				$logcal_timenew=date('m/d/Y H:i',strtotime(str_replace('-','/',$logcal_time1[0])));
				$logcal_time1[1];
				$res_timenew=date('m/d/Y H:i',strtotime(str_replace('-','/',$logcal_time1[1])));
     ?>
   			 <!--CLL LOG TIME HIDDEN VALUE SHOW HERE-->
            <input type="hidden" name="clogtime" id="clogtime" value="<?php echo $logcal_timenew;?>" >
            <input type="hidden" name="res_logtime" id="res_logtime" value="<?php echo $res_timenew;?>" >
            
<?php 
$upst1=mysqli_query($con1,"select `update_status`,`pending_update` from `alert` where `alert_id`='".$alertid."'");
   $upst=mysqli_fetch_row($upst1);
//===========if engr not delegated=== Block
if($eng_id !=''){
    

if($upst[0]==0 && $upst[1]==0){ ?>  
<!--=====REACHED AT SITE or RESPONSE TIME  SHOW HERE============-->  
<tr>
			<td>
            <br>
		<h2><input type="checkbox"   name="reach_site"  id="reach_site" value="rs" onClick="callclouser_reach_site('reach_site',this);"> Reached at Site</h2>  
			</td>
			<td>
			<div id="etahide" style="display:block">
			<!--===========For Date ==========-->
	<input type="text" name="rest" id="rest" value="<?php date('Y/m/d'); ?>" disabled readonly onClick="displayDatePicker('rest');" onBlur="getdate(this.value);"  / >
			
		   <!--===========For Hour ==========-->
			<select name="eng_reach_time"  id="eng_reach_time" disabled onChange="gettime(this.value);">
			<option value="">Select time</option>
			<?php
			for($i=1;$i<=12;$i++) { ?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php }?>
			</select>
            
			<!--===========For Minute ==========-->
			 <select name="rminute" id="rminute" disabled onChange="getmin(this.value);">
					<option value="">Select Min</option>
					<option value="<?php echo 00 . ":00"; ?>">0</option>
					<?php
					for($i=01;$i<=60;$i++)
					{
					?>
					<option value="<?php echo $i.":00"; ?>"><?php echo $i; ?></option>
					<?php
					}
					?>
				</select>
                
			<!--===========For Meridain ==========-->
			<select name="rmeri" id="rmeri" disabled onChange="getmeri(this.value);">
				<option value="" >Select</option>
				<option value="am">am</option>
				<option value="pm">pm</option>
			</select>
            
			</div>
				</td>     
			</tr>
                     
<?php  } ?>
		  		
<!--=================Eng. Left the site===========================-->
<tr>
			<td>
            <?php $eta=mysqli_query($con1,"select `status_left_site` from `alert` where `alert_id`='".$id."'");
		$eta1=mysqli_fetch_row($eta);?>
        
            <br>
			<h2><input type="checkbox" name="left_site" id="left_site" <?php if($eta1[0]=='0'){ echo "disabled"; } ?> value="ls" onClick="callclouser('left_site',this);" > Eng. Left the Site</h2>
              
			</td>
			<td>
			<div id="etahide" style="display:block">
			<!--===========For Date ==========-->
			<input type="text" name="left_est" id="left_est"  value="<?php date('Y/m/d'); ?>" readonly onClick="displayDatePicker('left_est');" onBlur="getdate(this.value);" disabled / >
			
		   <!--===========For Hour ==========-->
			<select name="eng_left_time"  id="eng_left_time" disabled onChange="gettime(this.value);">
			<option value="">Select time</option>
			<?php
			for($i=1;$i<=12;$i++) { ?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php }?>
			</select>
            
			<!--===========For Minute ==========-->
			 <select name="left_min" id="left_min" disabled onChange="getmin(this.value);">
					<option value="">Select Min</option>
					<option value="<?php echo 00 . ":00"; ?>">0</option>
					<?php
					for($i=01;$i<=60;$i++)
					{
					?>
					<option value="<?php echo $i.":00"; ?>"><?php echo $i; ?></option>
					<?php
					}
					?>
				</select>
                
			<!--===========For Meridain ==========-->
			<select name="left_meri" id="left_meri" disabled onChange="getmeri(this.value);">
				<option value="" >Select</option>
				<option value="am">am</option>
				<option value="pm">pm</option>
			</select>
            
			</div>
				</td>     
			</tr>
			
            <input type="hidden" name="restb" id="restb"  value="<?php date('m/d/Y'); ?>" />
            <input type="hidden" name="eng_reach_timeb" id="eng_reach_timeb"  value="" />
            <input type="hidden" name="rminuteb" id="rminuteb" value="" />
            <input type="hidden" name="rmerib" id="rmerib" value="" /> 
            <input type="hidden" name="rcheckbox" id="rcheckbox" value="" /> 
            
           
			<!--================================SEND UPDATE TO CLIENT ROW SHOW HERE==================================-->
			<tr>
			<td width="184" height="35">Please Untick if you dont want to send update to client : </td>
			<td width="167">
			<input type="checkbox" name="mail" id="mail" value="mail"  checked="checked" onClick="mail_value();"/>
			<input type="text" name="email" id="email" value="<?php echo $ro1[0];  ?>" readonly/>
			</td>
			</tr>
			
			<!--===============================================MAKE THIS RESPONSE TIME ROW SHOW HERE========================-->
			<!--<tr>
			<td width="184" height="35">Make this as response time : </td>
			<td width="167">
			<input type="checkbox" name="respose" id="response"  disabled onClick="responsetime(response,this);"/>
			<input type="text" value="" name="rtime" id="rtime" readonly/>
			</td>
			</tr>-->
			
			<!--===============================================TYPE OF CLOSURE OCCURRED ROW SHOW HERE=========================-->
			<tr><td width="184" height="35" colspan="3" align="center">
       <!-- <input type="checkbox" name="callprtype" id="callprtype" <?php if($eta1[2]=='0'){ echo "disabled"; } ?> onClick="callclose_progress('callprtype',this);"/>-->
        Whether Call Closing : </td></tr>
			<?php
			$statusme=0;
			$actstat='';
			$qryin=mysqli_query($con1,"Select * from tempclosedcall where alert_id='".$id."' and status=0");
				if(mysqli_num_rows($qryin)>0)
				{
				$statusme=1;
				$actstat="temp";
				}
				elseif($statusme=='0' && $ro1[1]=='Done')
				{
				$actstat="close";
				}
				elseif($ro1[1]=='2')
				{
				$actstat="wait";
				}
				elseif($ro1[1]=='Pending' || $ro1[1]=='1')
				{
				$actstat="pending";
				}
				
				elseif($ro1[1]=='onhold')
				{
				$actstat="hold";
				}
				elseif($ro1[1]=='Rejected')
				{
				$actstat="rejected";
				}
				//echo $actstat;
			?>
			
			<tr>
			<td width="167" >Pending</td>
					<td colspan="2"><input type="radio"  disabled name="callclose" id="callclose1"  value="pending" onClick="callclose_pending('callclosetype',this);"/></td>
			</tr>
            <tr>
			<td width="167" >Close</td>
			<td colspan="2"><input type="radio"  disabled name="callclose" id="callclose4"  value="close" onClick="callclose_closer('callclosetype',this);"/></td>
			</tr>
			
			<tr>
            	<!--===============================================TYPE OF CLOSE =========================-->
			<tr><td width="184" height="35" colspan="3" align="center">
        <!--<input type="checkbox" name="callclosetype" id="callclosetype" disabled onClick="callclose_closer('callclosetype',this);"/>-->
        Call Closure Type : </td></tr>
            
			<td width="167" >Permanent Close</td>
			<td colspan="2"><input type="radio"  disabled name="callclose" id="callclose3" value="close"  <?php if($actstat=='close'){echo "checked='checked'";} ?> /></td>
			</tr>
			
            <tr>
			<td width="167" >Standby Close</td>
			<td colspan="2"><input type="radio" disabled name="callclose" id="callclose2" value="wait"   <?php if($actstat=='wait'){echo "checked='checked'";} ?> /></td>
			</tr>
            
			<!--===============================================TYPE OF PROBLEM OCCURRED ROW SHOW HERE=============================-->
			<tr>
			<td colspan="3" align="center">
			<table width="394">
			<tr><td colspan="2" align="center">
			<h3>Select Types of Problem Occurred <?php if($ctype=='new') echo " <b style='color:red;'> New Call </b>"; else echo " <b style='color:red;'> Service Call <br> " ; ?></h3></td></tr>
			<?php
			
			if($ctype=='new')
				{
				$ctype='new';
				}
			elseif($ctype=='new temp' || $ctype=='service')
				{
				$ctype='service';
				}
			//echo "Select * from problemtype where type='".$ctype."'  order by problem ASC";
			$prob=mysqli_query($con1,"Select * from problemtype where type='".$ctype."'  order by problem ASC");
			if(!$prob)
			echo mysqli_error();
			$probno=mysqli_num_rows($prob);
			?>
			<input type="hidden" name="pno" id="pno" value="<?php echo $probno; ?>">
			<?php
			$i=0;
			while($probro=mysqli_fetch_array($prob))
			{
			?>
			<tr>
			
			<td align="right">
			 <?php 
			 $sitepro=mysqli_query($con1,"select * from `siteproblem` where `alertid`='".$alertid."'");
			 $sitepro1=mysqli_fetch_row($sitepro);
			 ?>
			<input type="checkbox" disabled name="prob[]" id="prob_<?php echo $i; ?>" value="<?php  echo $probro[0]; ?>" <?php if($sitepro1[2]==$probro[0]) echo "checked='checked'";?> />
			</td>
			
			<td align="left">
			<?php  echo $probro[1]; ?>
			</td>
			</tr>
			<?php 
					$i++;
				 	} //===========while close here============			
			   } //========Engr block end
           	
			?>
    
    </table>
    
    </td>
    </tr>
        <tr>
    <td height="35"><input type="submit" value="submit" class="readbutton"/></td>
    <td colspan="2"><input type="button" value="cancel" class="readbutton" onClick="self.close()"/></td>
    <input type="hidden" name="eng_id" value="<?php echo $eng_id; ?>" />
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <input type="hidden" name="br" value="<?php echo $br; ?>" />
    <input type="hidden" name="ctype" value="<?php echo $ctype; ?>" />
    <input type="hidden" name="dt" value="<?php echo date("d/m/Y"); ?>" id="dt" />
    </tr>
   
    </table>
</form>

</td>
</tr>
</tbody>
</table>
</center>
</body>