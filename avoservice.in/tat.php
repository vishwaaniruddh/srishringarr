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
<script src="excel.js" type="text/javascript"></script>
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
ppg='25';
else
ppg=document.getElementById(perpg).value; //alert(ppg);
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
		  var calltype=document.getElementById('calltype').value;//alert(calltype);	 
		  var timetype=document.getElementById('timetype').value;
		 // var citytype=document.getElementById('citytype').value;
			 if(a!="Loading"){
				var calltype=document.getElementById('calltype').value;//alert(calltype);	 
			 	var timetype=document.getElementById('timetype').value;
			//	var citytype=document.getElementById('citytype').value;
			 	var fromdt=document.getElementById('fromdt').value;//alert(fromdt);
			 	var todt=document.getElementById('todt').value;//alert(todt);
			 	var category=document.getElementById('category').value;//alert(category);
				
			
			  }
			
			var url = 'search_tat.php'; 
		//  }
 	//alert(br);
		    var pmeters="";
			//alert(url);
			//var pmeters = 'mode='+Mode+'&Page='+Page+'&bank='+bank; 
			if(a!="Loading"){ 
     pmeters = 'calltype='+calltype+'&Page='+b+'&perpg='+ppg+'&timetype='+timetype+'&fromdt='+fromdt+'&todt='+todt+'&category='+category;
			//alert(pmeters);
			}
			else
			{
			//	 pmeters='calltype='+calltype+'&perpg='+ppg+'&timetype='+timetype+'&citytype='+citytype;
				 pmeters='calltype='+calltype+'&perpg='+ppg+'&timetype='+timetype;
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

<body> <!--onLoad="searchById('Loading','1','')"> -->
<?php $br= $_SESSION['branch'];// if($_SESSION['branch']!='all') { $br=implode(",",$_SESSION['branch']); } else{ $br=$_SESSION['branch'];  } ?>
<input type="hidden" value="<?php  echo $br;?>" name="br" id="br"/>
<center>
<?php include("menubar.php");
//echo $_SESSION['branch'];
 ?>


<center>
<h2 class="h2color">Closed Calls TAT Analysis</h2></center>

<div >
<button id="myButtonControlID" onClick="tableToExcel('call_summary1', 'Closed Service Call TAT')">Export</button>
	
<table cellpadding="" cellspacing="0" >
  <tr>
  		
    	<th width="77" colspan="">    		    
    			<select name="calltype" id="calltype" onchange="searchById('Listing','1','');">
              <option value="brsummary">Branch Wise Summary</option>
              <option value="clisummary">Client Wise Summary</option>
            </select>
        </th> 
        <th width="77" colspan="">    		    
    			<select name="category" id="category" onchange="searchById('Listing','1','');">
              <option value="service">Service Calls Summary</option>
              <option value="inst">Installation Summary</option>
              <option value="pm">PM calls Summary</option>
              
            </select>
        </th>
        <th width="77" colspan="">    		    
    			<select name="timetype" id="timetype" onchange="searchById('Listing','1','');">
              <option value="reso">Resolution Time</option>
              <option value="resp">Response Time</option>
            </select>
        </th>
    <!--    <th width="77" colspan="">    		    
    			<select name="citytype" id="citytype" onchange="searchById('Listing','1','');">
              <option value="0">City Category</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
              <option value="E">E</option>
            </select>
        </th>
        
        <!--From Date-->
     	<th width="75" colspan="2">
     <input type="text" name="fromdt" id="fromdt" readonly="readonly" onclick="displayDatePicker('fromdt');" placeholder="From Date"/></th>
     
     	<!--To Date-->
   		<th width="75" colspan="2">
   		<input type="text" name="todt" id="todt" readonly="readonly" onclick="displayDatePicker('todt');" placeholder="To Date"/></th>
   <th width="75" rowspan="2"><input type="button" onclick="searchById('Listing','1','');" value="Search" /></th>
   <input type="hidden" name="calltype" id="calltype"  value="<?php echo "Done";?>"/>
  </tr>
  
</table>
</div>
<div id="search"></div>


</center>
</body>
</html>