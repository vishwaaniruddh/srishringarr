<?php
include("access.php");
// echo $_SESSION['user']." ".$_SESSION['branch']." ".$_SESSION['designation'];
// print_r($_SESSION['branch']);
$brme=($_SESSION['branch']);
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

<script>
///////////////////////////////search 
function searchById(a,b,perpg) {
//alert(a+" "+b+" "+perpg);
var ppg='';
if(perpg=='')
ppg='10';
else
ppg=document.getElementById(perpg).value;
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
		  var br=document.getElementById('br').value;
		  var status=document.getElementById('status').value;
		 	 if(a!="Loading"){
			 var id=document.getElementById('atmid').value;//alert(id);
			 var cid=document.getElementById('cid').value;//alert(cid);
			 var bank=document.getElementById('bank').value;//alert(bank);
			 var fromdt=document.getElementById('fromdt').value;
			 var todt=document.getElementById('todt').value;
		//	 var area=document.getElementById('area').value;//alert(area);
			 var eng=document.getElementById('eng').value;
			  var call_type=document.getElementById('call_type').value;
			  var state=document.getElementById('state').value;
              var complaintno=document.getElementById('complaintno').value;
			  }
			 // alert(br);
			//alert("gg"); 
			var url = 'search_call_flow_status.php'; 
		//  }
 	//alert(br);
		    var pmeters="";
			//alert(url);
			//var pmeters = 'mode='+Mode+'&Page='+Page+'&bank='+bank; 
			if(a!="Loading"){ 
   pmeters = 'atmid='+id+'&cid='+cid+'&bank='+bank+'&br='+br+'&Page='+b+"&status="+status+'&perpg='+ppg+'&fromdt='+fromdt+'&todt='+todt+'&eng='+eng+'&call_type='+call_type+'&state='+state+'&complaintno='+complaintno;
			//alert(pmeters);
			}
			else
			{
				 pmeters = 'br='+br+"&Page="+b+"&status="+status+'&perpg='+ppg;
			}
			//alert(pmeters);
			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
 
//alert(pmeters); 
			HttPRequest.onreadystatechange = function()
			{
 /*
			if(HttPRequest.readyState == 3)  // Loading Request
				  {
	document.getElementById("listingAJAX").innerHTML = '<img src="loader.gif" align="center" />';
				  }
 */
				 if(HttPRequest.readyState == 4) // Return Request
				  {
		var response = HttPRequest.responseText;
 
 //alert(response);
				  document.getElementById("search").innerHTML = response;
			  }
		}
  }


function newwin(url,winname)
{

  mywindow = window.open(url, winname, "location=400,status=1,scrollbars=1, width=500,height=600,left=420,top=130");
  
 }
</script>


<style>


div#lyrics{
    width:300px;
    height:100px;
    background-color:#003300;
    position:absolute;
    left:700px;
    padding:10px;
	color:#FFF;
    
}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script type="text/javascript">
 
$(document).ready(function(){
    $("div#lyrics").hide();
    
    $("#songlist tr").mouseover(function(){
        $(this).css("background-color","#ccc");
        $("#lyrics",this).show();
    }).mouseout(function(){
        $(this).css("background-color","#eee");
        $("#lyrics",this).hide();
    });
    
});
</script>
</head>

<body onLoad="searchById('Loading','1','')">

<input type="hidden" value="<?php  echo $br;?>" name="br" id="br"/>
<center>
<?php include("menubar.php");
//echo $_SESSION['branch'];
 ?>



<h2 class="h2color">View Call Flow Status</h2>

<div >
 <table cellpadding="" cellspacing="0" >
  <tr>
    <th width="77" colspan=""><select name="status" id="status">
      
      <option value="open">Open call</option>
      <option value="Done">Closed call</option>
      <option value="onhold">Call On Hold</option>
      <option value="Rejected">Rejected</option>
      <option value="">All Calls</option>
    </select></th>
 
 <th width="77" colspan=""><select name="call_type" id="call_type" onchange="" style="width:100px">
     <option value="">-Call type-</option>
      <option value="service">Service Site</option>
      <option value="new">Installation Calls</option>
      <option value="pm">PM Calls</option>
      <option value="dere">De-Re Calls</option>
      
    </select></th>
    
    <th><select name="cid" id="cid" onchange=""><option value="">Select Client</option><?php
$cl=mysqli_query($con1,"select cust_id,cust_name from customer order by cust_name ASC");
while($clro=mysqli_fetch_row($cl))
{
?>
<option value="<?php echo $clro[0]; ?>"><?php echo $clro[1]; ?></option>
<?php
}
?></select></th>
  
      <th width="75"><input type="text" name="atmid" id="atmid" onkeyup="" placeholder="ATM"/></th>
    <th width="75"><input type="text" name="bank" id="bank" onkeyup="" placeholder="Bank"/></th>
   
    <th width="75" rowspan="2"><input type="button" onclick="searchById('Listing','1','');" value="Search" /></th>
    </tr>
    
    <br />
    
    <tr>
 
     <?php
	 
	 $br=$_SESSION['branch'];
if($br!='all')
{}
$stqry="select * from avo_branch order by name ASC";

//echo $stqry;
?>
<th><select name="state" id="state" onchange="" style="width:150px"><option value="">-select Branch-</option>
<?php

$stateqry=mysqli_query($con1,$stqry);
while($sttro=mysqli_fetch_array($stateqry))
{
	?>
    <option value="<?php echo $sttro[0]; ?>"><?php echo $sttro[1]; ?></option>
    <?php
}
?>
     </select>
     
     
     </th>
<th width="75"><input type="text" name="complaintno" id="complaintno" onkeyup="" placeholder="ComplaintNo"/></th>
     <th>
     <?php  $engq="select * from area_engg where status='1'";
	 if($_SESSION['branch']!='all')
	 $engq.=" and area in ($brme)";
	// echo $engq;
	 $engq.=" order by engg_name ASC";
	 ?>
     <select name="eng" id="eng" onchange="" style="width:150px"><option value="">-select Engineer-</option><?php 
	
	$eng=mysqli_query($con1,$engq);
	while($engg=mysqli_fetch_array($eng))
	{
	?>
    <option value="<?php echo $engg[0]; ?>"><?php echo $engg[1]; ?></option>
    <?php
	}
	
	 ?>
	 <option value="-1">Pending Delegation</option>
	 </select></th>
	 
     
     <th width="75"><input type="text" name="fromdt" id="fromdt" readonly="readonly" onclick="displayDatePicker('fromdt');" placeholder="From Date"/> </th>
     
     <th width="75"><input type="text" name="todt" id="todt"  readonly="readonly" onclick="displayDatePicker('todt');" placeholder="To Date"/></th>
     
  
  <!--  <th width="75"><input type="button" onclick="javascript:location.href='date_search.php?br=<?php echo $br; ?>'" class="readbutton" value="Search By Date" style="width:120px;"/></th>-->
  
  </tr>
  
</table>
</div>
<div id="search"></div>


</center>
</body>
</html>