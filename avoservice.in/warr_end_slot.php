<?php
include("access.php");
include("config.php");
// echo $_SESSION['user']." ".$_SESSION['branch']." ".$_SESSION['designation'];

$branch=$_SESSION['branch'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AVOUPS-<?php echo $_SESSION['user']; ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="menu.css" rel="stylesheet" type="text/css" />
<script src="popup.js" type="text/jscript" language="javascript"> </script>

<script>
function runScript(e) {
    if (e.keyCode == 13) {
		searchById('Listing','1','');
       // alert('enter pressed');
        // document.getElementById('button').click();
    }
}
</script>
<script type="text/javascript">


///////////////////////////////search 
function searchById(a,b,perpg) {
//alert(a+" "+b+" "+perpg);
var ppg='';
if(perpg=='')
ppg='10';
else
ppg=document.getElementById(perpg).value;
//alert(ppg);
document.getElementById("search").innerHTML ="<center><img src=loader.gif></center>";

		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
 
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
		 
			 var br=document.getElementById('br').value;//alert(br);
			var type=document.getElementById('type').value
			 if(a!="Loading"){
			
			 var cid=document.getElementById('cid').value;//alert(cid);
			 var branch=document.getElementById('branch').value;//alert(state);
		 	  }
			var url='search_warr_end_slot.php';
		var pmeters="";
			//alert(url);
			//var pmeters = 'mode='+Mode+'&Page='+Page+'&bank='+bank; 
			if(a!="Loading"){ 
			 pmeters = 'cid='+cid+'&Page='+b+'&perpg='+ppg+'&br='+br+'&branch='+branch+'&type='+type;
			}//alert("gg");
			else
			{
			pmeters = 'Page='+b+'&perpg='+ppg+'&br='+br+'&type='+type;	
			}
			//alert(pmeters);
			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
 
//alert("gg"); 
			HttPRequest.onreadystatechange = function()
			{
				 if(HttPRequest.readyState == 4) // Return Request
				  {
		var response = HttPRequest.responseText;
 
 //alert(response);
				  document.getElementById("search").innerHTML = response;
			  }
		}
  }
 
</script>
</head>

<body onLoad="searchById('Loading','1','')">
<center>
<?


     if($_SESSION['designation']==5){

            include("AccountManager/menubar.php");
        }
        else{

          include("menubar.php");  
        }
        
$br= $_SESSION['branch']; ?>

<input type="hidden" value="<?php  echo $br;?>" name="br" id="br"/>
<h2 class="h2color">Warranty site Expiry slot</h2>

<div class="">
<button id="myButtonControlID" onClick="tableToExcel('custtable', 'Table Export Example')">Export Table data into Excel</button>
	<br />
<table  border="0" cellpadding="0" cellspacing="0">
<tr>

</tr>
<tr>
<th >Select Site <select  name="type" id="type" onchange="searchById('Listing','1','');">

<option value="ups_warr">UPS Warr Expiring in 3 Months</option>
<option value="ups_exp">UPS Warr Expired (<3 Months)</option>
<option value="batt_warr"> Battery Warr Expiring in 3 Months</option>
<option value="batt_exp">Battery Warr Expired (<3 Months)</option>

</select> </th>
<th width="77">

<select id="cid" onchange="searchById('Listing','1','');">
<option value="">Vertical/ Customer</option>
<?php $qrycust=mysqli_query($con1,"select cust_id,cust_name from customer");
while($fetchcust=mysqli_fetch_array($qrycust))
{
?>
<option value="<?php echo $fetchcust[0];?>"><?php echo $fetchcust[1];?></option>
<?php } ?>
</select>
</th>

<? if($branch != 'all') 

$brqry ="select id, name from avo_branch where id in('$branch')";

else
$brqry="select id, name from avo_branch";

//echo $brqry;

$br1=mysqli_query($con1,$brqry);
?>


<th width="75">
    <select name="branch" id="branch" onchange="searchById('Listing','1','');" >

<option value="">Branch</option>
<?php

while($brr=mysqli_fetch_array($br1))
{
?>
<option value="<?php echo $brr[0]; ?>"><?php echo $brr[1]; ?></option>
<?php
}
?>
</select>
</th>
<th><input type="button" onclick="searchById('Listing','1','');" value="Search" /></th>
</tr>
</table>
</div>

<div id="search"></div>

</center>
</body>
</html>