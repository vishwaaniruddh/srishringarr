<?php
include("access.php");
if(isset($_REQUEST['Page']))
$strPage = $_REQUEST['Page'];
else
$strPage=1;
include("config.php");
// echo $_SESSION['user']." ".$_SESSION['branch']." ".$_SESSION['designation'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Users</title>
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

///////////////////////////////search 
function searchById(a,b,perpg) {
//alert(a+" "+b+" "+perpg);
var ppg='';
if(perpg=='')
ppg='20';
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
		
	//	var accnt=document.getElementById('acc').value;
			 // var id=document.getElementById('idd').value;//alert(id);
			 if(a!="Loading"){
			 var name=document.getElementById('name').value;//alert(id);
			 var asset=document.getElementById('asset').value;//alert(cid);
					  }
			
			var url = 'search_asset_msp.php'; 
	
		    var pmeters="";
			
			if(a!="Loading"){ 
			 pmeters = 'Page='+b+"&name="+name+'&perpg='+ppg+"&asset="+asset;
			// alert(pmeters);
			}
			else
			{
				 pmeters = "Page="+b+'&perpg='+ppg;
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
 				 if(HttPRequest.readyState == 4) // Return Request
				  {
		var response = HttPRequest.responseText;
 
 //alert(response);
				  document.getElementById("search").innerHTML = response;
			  }
		}
  }

function setchange(id)
{
var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               //  alert(xmlhttp.responseText);
                 document.getElementById('subdiv'+id).innerHTML = "";
                 document.getElementById('subdiv'+id).innerHTML = xmlhttp.responseText;
           }
         }
         
         price=document.getElementById('price'+id).value; //alert (reason);
        
         if(price==0 || price=='')
         alert("Please Enter Correct Value");
         
         else{
       //alert(id) //="+id+"&price="+price);
         xmlhttp.open("GET", "set_assetprice.php?id="+id+"&price="+price, true);
      
         xmlhttp.send();
         }
} 

</script>
</head>

<body onLoad="searchById('Loading','1','')">
<center>
<?php include("menubar.php"); ?>
<h2>Product Minimum Selling Price</h2>
<div id="header" >
<button id="myButtonControlID" onClick="tableToExcel('custtable', 'Table Export Example')">Export Table data into Excel</button>
<table>
  <th width="75">
  <?php $state=mysqli_query($con1,"Select * from assets order by assets_id ASC");
	
	 ?><select name="asset" id="asset" onchange="searchById('Listing','1','');">
	     
	 <option value="">Select </option>
     <?php
	 while($st=mysqli_fetch_array($state))
	 {
	 ?>
     <option value="<?php echo $st[0]; ?>"><?php echo $st[1]; ?></option>
     <?php
	 }
	 ?></select>
     </th>  
 <th width="77"><input type="text" name="name" id="name" onkeypress="return runScript(event)" placeholder="Name"/></th>   
    
<th><input type="button" onclick="searchById('Listing','1','');" value="Search" /></th>
 
   
     </table>


</div>
<div id="search">
</div>
</center>
</body>
</html>