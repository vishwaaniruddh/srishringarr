<?php
session_start();
if(isset($_SESSION['SESS_USER_NAME']))
{
 
include('config.php');
//include('template.html');

 $id=$_GET['id'];
 //$center=$_GET['center'];
// $dt=$_GET['dt'];
//echo "select * from  patient where srno='$id'";
$sql="select * from  patient where srno='$id'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);

?>
<html><head><title></title>
<!--  working with multiple windows  -->

<style>
#sub td{border:none;}
#se{
	width:60px;
	background: -moz-linear-gradient(center top, #ac0404, #dddddd);
	background: -webkit-gradient(linear, left top, left bottom, from(#ac0404), to(#dddddd));
	background:  -o-linear-gradient(top, #ac0404, #dddddd);
	color:#fff;
	}
</style>
<script type="text/javascript" src="autocomplete/jquery-1.2.1.pack.js"></script>
<style type="text/css">
	body {
		font-family: Helvetica;
		font-size: 11px;
		color: #000;
	}
	
	h3 {
		margin: 0px;
		padding: 0px;	
	}

	.suggestionsBox {
		position: relative;
		left: 30px;
		margin: 10px 0px 0px 0px;
		width: 200px;
		background-color: #212427;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border: 2px solid #000;	
		color: #fff;
		z-index:10
	}
	
	.suggestionList {
		margin: 0px;
		padding: 0px;
	}
	
	.suggestionList li {
		
		margin: 0px 0px 3px 0px;
		padding: 3px;
		cursor: pointer;
	}
	
	.suggestionList li:hover {
		background-color: #659CD8;
	}
</style>
<script type="text/javascript">
	function lookup2(inputString2,id2,suggest2,suggestlist2,ref2) {
	
	//alert(inputString2+" "+id2+" "+suggest2+" "+suggestlist2+" "+ref2);
	//var obj = { queryString:  ""+inputString+"", name: $("#txtname").val() };
		if(inputString2.length == 0) {
			// Hide the suggestion box.
			$('#'+suggest2).hide();
		} else {
		//alert("hi");
			$.post("autocomplete/cityrpc.php", {
			
			queryString2: ""+inputString2+"",
			id2: ""+id2+"",
			suggest2: ""+suggest2+"",
			suggestlist2: ""+suggestlist2+"",
			ref2: ""+ref2+""
			}, function(data){
				if(data.length >0) {
					$('#'+suggest2).show();
					$('#'+suggestlist2).html(data);
				}
			});
		}
	} // lookup
	
	function fill2(obj2,suggest2,id2,ref2) {
	document.getElementById(suggest2).style.display='none';
	//alert(obj+" "+suggest+" "+id)
	//alert(document.getElementById().value);
	//alert("hi "+obj);
	

	//alert(doc[0]);
		$('#'+id2).val(obj2);
		
		setTimeout("$('#'"+suggest2+").hide();", 200);
		
	}
	</script>
<script type="text/javascript">
window.onload=MakeRequest;
<!-- validation-->

function appvalidate(appform){
 with(appform)
 {
  var dt1=appdate.value;
dt1=dt1.split("/");
dt1=dt1[2]+"-"+dt1[1]+"-"+dt1[0];
 dt1 = new Date(dt1);
//alert(dt1.getTime());
dt1=dt1.getTime();
dt2=curdt.value;
 dt2 = new Date(dt2);
dt2=dt2.getTime();
if(appdate.value=="")
{
	alert("Please select Date");
	appdate.focus();
	return false;
}
if(dt1<dt2)
{
//var dt1=appdate.value.split('/',appdate.value);
//alert(dt1[0]+" "+dt1[1]+" "+dt1[2]);
alert("Appointment Date is invalid");
appdate.focus();
	return false;
}
if(new1.value=="0")
{
	alert("Please select New/ Old Customer.");
	new1.focus();
	return false;
}
if(hos.value=="0")
{
	alert("Please select Hostpital Name.");
	hos.focus();
	return false;
}
}
 return true;
 }
 
 function confirm_appdelete(id)
{
	if (confirm("Are you sure you want to delete this entry?"))
	{
		
		document.location="delete_app.php?id="+id;
	}
}


<!--add new hospital-->
function hoswindow()
{

  mywindow = window.open("new_hosp.php", "mywindow", "location=1,status=1,scrollbars=1, width=500,height=300");
    //mywindow.moveTo(300, 250);
 }
 
 function newslot(hos)
{
//alert("hi");
//openchild(this.id,'new_slot.php?type=ajax&hos=<?php echo $row[16]; ?>&field=hos','app','width=600,height=450,left=200,top=100','appdate');
var hos=hos;
var type="ajax";
var field="hos";
var dt=document.getElementById('appdate').value
  mywindow = window.open("new_slot.php?field="+field+"&type="+type+"&hos="+hos+"&dt="+dt, "mywindow", "location=400,status=1,scrollbars=1, width=600,height=600,left=350,top=200");
 
}

var searchReq = getXMLHttp();
function getXMLHttp()
{

  var xmlHttp

// alert("hi1");

  try

  {

    //Firefox, Opera 8.0+, Safari

    xmlHttp = new XMLHttpRequest();

  }

  catch(e)

  {

    //Internet Explorer

    try

    {

      xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");

    }

    catch(e)

    {

      try

      {

        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");

      }

      catch(e)

      {

        alert("Your browser does not support AJAX!")

        return false;

      }

    }

  }

  return xmlHttp;

}

//////get start date
function MakeRequest()

{

  var xmlHttp = getXMLHttp();

//alert("hi");

  xmlHttp.onreadystatechange = function()

  {

    if(xmlHttp.readyState == 4)

    {

      HandleResponse1(xmlHttp.responseText);

    }

  }

//alert("hi2");

//var str = escape(document.getElementById('hos').value);
var str1 = escape(document.getElementById('appdate').value);
var hos=escape(document.getElementById('pathos').value);
var center=escape(document.getElementById('center').value);
//var str1 = escape(document.getElementById('type').value);

//alert(str1);
 xmlHttp.open("GET", "get_time.php?appdate="+str1+"&hos="+hos+"&center="+center, true);
//alert("get_time.php?appdate="+str1);
  xmlHttp.send(null);

}
function HandleResponse1(response)

{
//alert(response);
document.getElementById('detail').innerHTML=response;

}

function ex(){
//alert("hh");	
var a=document.getElementsByName('ch[]');
var id=document.getElementById('patient_id').value;
	var x=0;
	var ax=new Array();
	for(counter=0;counter<a.length;counter++)
	{
		if(a[counter].checked)
		{
			ax[x]=a[counter].value;
			x=x+1;
			
		}	
		
	}
	//alert(x);
		if(x>2 || x<2)
		{
			alert("Select Only 2 Hospital");
			a[counter].checked=false;
			return;
	    }
		//alert(x);
		window.open("exchange.php?ch[0]="+ax[0]+"&ch[1]="+ax[1]+"&id="+id,'_self');

}



//////get start date
function MakeRequest1()

{

  var xmlHttp = getXMLHttp();

//alert("hi");

  xmlHttp.onreadystatechange = function()

  {

    if(xmlHttp.readyState == 4)

    {

      HandleResponse(xmlHttp.responseText);

    }

  }

//alert("hi2");

var str = escape(document.getElementById('hos').value);
var str1 = escape(document.getElementById('appdate').value);
var center = escape(document.getElementById('center').value);
 xmlHttp.open("GET", "get_timeslot.php?hos="+str+"&appdate="+str1+"&center="+center, true);
//alert("getitem.php?cname="+str+"&type="+str1);
  xmlHttp.send(null);

}
function HandleResponse(response)

{
//alert(response);
document.getElementById('detail1').innerHTML=response;

}

var x=0;
function colorchange(obj,src){
//alert(src);

  obj.style.backgroundColor='#F00';
  for(i=1;i<=12;i++){
  if(i!=src){
	  if(document.getElementById(i)!=null)
 document.getElementById(i).style.backgroundColor='#FFC';
  }
  }
  //x=src;
  document.getElementById('sl').value=src;


//alert(document.getElementById("1").innerHTML);

var e = document.getElementById("slot").innerHTML;

}

function check()
{
var a=document.getElementsByClassName('ch');//alert(a);
	var x=0;
	for(counter=0;counter<a.length;counter++)
	{
		if(a[counter].checked)
		{
			x=x+1;
		}
		if(x>2)
		{
			alert("Select Only 2 Hospital");
			a[counter].checked=false;
	    }
		
	}
}
</script>
<!--<script language="JScript">

var child;

function OpenWindow(url,id,style,prm) {
var param=document.getElementById(prm).value;
url=url+"&dt="+param;

child=window.open(url,id,style);

}

function Refresh() {

child.location.reload(true);

}

OpenWindow();
</script>-->
<!--Datepicker-->
<link href="datepicker/date_css.css" rel="stylesheet" type="text/css" />
<script src="datepicker/datepick_js.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
 

function setmsg22(field,type,center)
{
//alert("I am in setmsg2");
//alert(field+" "+name+" "+center);
document.createElement("center").value=center;
 //document.getElementById(field).value=id;
 var option = document.createElement("option");
option.text = type;
option.value = type;
var selected = document.getElementById(field);
selected.appendChild(option);

setSelectedValue(selected, type);

function setSelectedValue(selectObj, valueToSet) {
//alert(selectObj);
    for (var i = 0; i < selectObj.options.length; i++) {
	//alert(selectObj.options[i].text);
        if (selectObj.options[i].value==valueToSet) {
		//alert(valueToSet);
            selectObj.options[i].selected = true;
            return;
        }
    }
//MakeRequest1();
}
</script>
</head><body>

        <form method="post" class="signin" action="processapp2ajax.php" onSubmit="return appvalidate(this)" name="appform" autocomplte="false" >
                <fieldset class="textbox">
                <p style="color:#ac0404; font-weight:bold; font-size:16px;" align="center">New Appointment</p><br />
          
                <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $id; ?>"  />
				<input type="hidden" name="pathos" id="pathos" value="<?php echo $row[16]; ?>"  />
                <input type="hidden" id="sl" name="sl"/> 
                 <input type="hidden" id="curdt" name="curdt" value="<?php echo date("Y-m-d"); ?>"/> 
                  
                  <table id="sub">
                  <tr>
                    <td width="157" height="33"><label class="fname"> Name:</label></td>
                    <td width="325"><input id="name" name="name" type="text" autocomplete="on"  value="<?php echo $row[6]; ?>" readonly ></td>
                   
                    <td width="172"><label> Date : </label></td>
                   <td width="483"> <input id="appdate" name="appdate" type="text" onBlur="MakeRequest();" style="width:100px;" value="<?php echo date('d/m/Y'); ?>" onClick="displayDatePicker('appdate');">
               <!-- <input name="appbutton" type="button"  value="select" id="se"/>-->
                </td>
                  
                  </tr>
                 
                  <tr>
                  
                  
               <!--   <td width="88">
                    Time Given:</td><td width="302"> Hours: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Mins:<br />
                <select name="hour" style="background:#fff;border-bottom:1px solid #ac0404;border-left:1px solid #ac0404;border-right:1px solid #ac0404;border-top:1px solid #ac0404;width:60px;">
                <option value="00">00</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
               <option value="13">13</option>
               <option value="14">14</option>
               <option value="15">15</option>
               <option value="16">16</option>
               <option value="17">17</option>
               <option value="18">18</option>
               <option value="19">19</option>
               <option value="20">20</option>
               <option value="21">21</option>
               <option value="22">22</option>
               <option value="23">23</option>
               </select>
   
                <select name="min" style="background:#fff;border-bottom:1px solid #ac0404;border-left:1px solid #ac0404;border-right:1px solid #ac0404;border-top:1px solid #ac0404;width:60px;">
                 <option value="00">00</option>
                <option value="05">05</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
                <option value="30">30</option>
                <option value="35">35</option>
                <option value="40">40</option>
                <option value="45">45</option>
                <option value="50">50</option>
                <option value="55">55</option>
                </select>
                </label></td></tr>-->
                
                <tr><td>                       
                <label class="cn">
                Telephone No.:</label></td>
                <td><input id="tele" name="tele" type="text" value="<?php echo $row[22]; ?>" readonly />
                
				</td>
                <td>
				<label class="mob">
				Mobile No.:</label></td>
                <td><input id="mob" name="mob" type="text" value="<?php echo $row[23]; ?>" readonly />
				
				</td>
                </tr>
                <tr>
                <td width="157">
				<label>
				Email Id:</label></td>
                <td><input type="text" name="email" id="email" value="<?php echo $row[24]; ?>" readonly />
				</label>
                 </td>
<?php 
include('config.php');
$result21 = mysql_query("select doc_id,name from doctor where doc_id='$row[9]'");
$row21=mysql_fetch_row($result21)
?>      
                 <td valign="top"><label class="doc">Ref.By :</label></td>
                <td><input type="text" name="doc" id="doc" value="<?php if (is_numeric($row[9])) echo $row21[1]; else echo $row[9]; ?>" readonly >
                </td>
                 </tr>
                

                  
                <tr style="display:none">
                <!--<td>
                <label> Hospital:</label></td>
                <td>
				<?php //$result5 = mysql_query("select UPPER(name),hospital_id from hospital where name<>'' order by name ASC");?>
                <select name="hos" id="hos" style="width:222px; height:26px;border:1px #ac0404 solid;" onChange="MakeRequest1();">
                <option value="0">Select</option>
				  <?php //while($row5=mysql_fetch_row($result5))
                //{  ?>
                <option value="<?php //echo $row5[0]; ?>"><?php //echo $row5[0]; ?></option>
				<?php //} ?>
				</select>
                <a href="new_hosp.php" target="_blank" class="link" style="color:#fff">Add New</a>
                </td>-->
                
            
               
                
                
                <td>
                <label>
				Type:</label></td>
                <td><select name="type" id="type" style="width:235px; height:26px;border:1px #ac0404 solid;">
                    <option value="0">select</option>
                    <option value="Computer" <?php if($row[0]=='Computer'){ ?> selected="selected"  <?php  } ?>>Computer</option>
                    <option value="Telephone" <?php if($row[0]=='Telephone'){ ?> selected="selected"  <?php  } ?>>Telephone</option>
					</select>
                </td> 
                </tr>
                
               
                  
                   <tr>
                 <td>
                <label class="newold">New/Old :</label></td>
                <td>
				<?php 
				$qr=mysql_query("select * from appoint where no='".$id."'");
				//$ro=mysql_fetch_row($qr);
								 ?>
                <!--<select id="new1" name="new" style="width:235px; height:26px;border:1px #ac0404 solid;" readonly>
                <option value="0">select</option>
                <option value="N" <?php if(mysql_num_rows($qr)==0){ ?> selected="selected"  <?php  } ?>>New</option>
                <option value="O" <?php if(mysql_num_rows($qr)>0){ ?> selected="selected"  <?php  } ?>>Old</option>
                </select>-->
                <input type="text" name="new" id="new1" value="<?php if(mysql_num_rows($qr)==0){ echo "New"; }else{ echo "Old"; } ?>" readonly="readonly" />
                </td>
                
                <td>
                <label class="newold">Remarks :</label></td>
                <td><input type="text" id="rem" name="rem" /></td> 
                </tr>
                 <tr>
                 <td>
                <label class="newold">Place of Appointment :</label></td>
                <td colspan="3">
				<input type="text" name="center" id="center" onKeyUp="lookup2(this.value,this.id,'centersuggestions','centerautoSuggestionsList','centerref1');" style="background:#fff;border:1px solid #ac0404;width:150px;" value="<?php echo $row[19]; ?>"  />
              <div class="suggestionsBox" id="centersuggestions" style="display: none; position:absolute; left:100px; z-index:10">
				<img src="autocomplete/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="centerautoSuggestionsList">
					&nbsp;
				</div>
			</div>
                </td>
                
                
                </tr>
                <tr>
                <td height="74"><button class="submit formbutton" type="submit" name="submit">Submit</button> </td> 
                <td><a href="view_patient1.php" > <button class="submit formbutton" type="button" onClick="window.close();">Cancel</button></a></td>
                <td><button class="submit formbutton" type="submit"  style="width:150px;">Add to Tentative Appointment</button></td>
                <td><input type="button" value="create Slot" class="submit formbutton" id="slotting" onClick="newslot('<?php echo $row[16]; ?>')" /></td>
                </tr>
                
                 <tr>
                   <td colspan="2"><div id="detail1"></div>
				   <br/>
				       <div id="detail" style="width:250px;"></div></td>
                   
               
               
                </tr>
                </table>
                
                <!--<table width="1200" border="1" cellpadding="4" cellspacing="0" style="font-size:13px;">
                <tr> 
                <th width="86" style="color:#ac0404; font-size:14px; font-weight:bold;"><label class="name">Date</label></th>
                <th width="43" style="color:#ac0404; font-size:14px; font-weight:bold;"><label class="basic">Time</label></th>
                <th width="194" style="color:#ac0404; font-size:14px; font-weight:bold;"><label class="prs">Name of the Patient</label></th>
                <th width="42" style="color:#ac0404; font-size:14px; font-weight:bold;"><label class="abs">N_F </label></th>
                <th width="69" style="color:#ac0404; font-size:14px; font-weight:bold;"><label class="pay">Type</label></th>
                <th width="72" style="color:#ac0404; font-size:14px; font-weight:bold;"><label class="all">Tel.No. </label></th>
                <th width="90" style="color:#ac0404; font-size:14px; font-weight:bold;"><label class="ot">Mobile No. </label></th>
                <th width="164" style="color:#ac0404; font-size:14px; font-weight:bold;"><label class="ded">Hospital</label></th>
                <th width="112" style="color:#ac0404; font-size:14px; font-weight:bold;"><label class="net">Reference By</label></th>
                <th width="99" style="color:#ac0404; font-size:14px; font-weight:bold;"><label class="net">Remarks</label></th>
				<th width="49" style="color:#ac0404; font-size:14px; font-weight:bold;"><label class="pay">Edit</label></th>
				<th width="58" style="color:#ac0404; font-size:14px; font-weight:bold;"><label class="pay">Delete</label></th>
                </tr>
               <?php  
$result1 = mysql_query("select * from appoint ");
while($row5=mysql_fetch_row($result1)){

$result21 = mysql_query("SELECT * FROM  `patient` where no='$row5[11]'");
$row21=mysql_fetch_row($result21);
//echo $row5[11]."<br/>";
?> 
                
                <tr>
                <td><?php echo $row5[15]; ?></td>
                <td><?php echo $row5[5]; ?></td>
                <td><?php if($row5[2]=="") { echo $row21[6]; }else{ echo $row5[2]; }?></td>
                <td><?php if($row5[10]=="N"){ echo "New";}else if($row5[10]=="O"){ echo "Old"; }  ?></td>
                <td><?php echo $row5[9]; ?></td>
                <td><?php echo $row21[22]; ?></td>
                <td><?php echo $row21[23]; ?></td>
                <td><?php echo $row5[18]; ?></td>
                <?php
                $result2 = mysql_query("select * from doctor where doc_id='$row5[14]' ");
$row55=mysql_fetch_row($result2);?>
                <td><?php echo $row55[1]; ?></td>
                <td><?php echo $row5[8]; ?></td>
				<td> <a href='edit_app.php?id=<?php echo $row5[12]; ?>'> Edit </a></td>
    			<td>  <a href="javascript:confirm_appdelete(<?php echo $row5[12]; ?>);"> Delete </a></td>
                </tr>
                <?php } ?>
                </table> -->
            
                  </fieldset>
         </form>
       
<?php 

}else
{ 
 header("location: index.html");
}

?></body></html>