<?php
session_start();
//echo $_SESSION['type'];
if(!isset($_SESSION['SESS_USER_NAME']))
header("location: index.html");
include('template_clinic.html');
include('config.php');
//include('textedit.php');
 
$id=$_GET['id'];
$aid=$_GET['aid'];
$type=$_GET['type'];
$dt=$_GET['dt'];
//echo "select * from  patient where srno='$id'";
$sql="select * from  patient where srno='$id'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
//echo "select diagnosis,opddate from opd where patient_id='$id'";
$op=mysql_query("select diagnosis,opddate from opd where patient_id='$id'");
$oprow = mysql_fetch_row($op);

$app=mysql_query("select * from appoint where app_real_id='".$aid."'");
$appro=mysql_fetch_row($app);
//echo "date=".$oprow[1];

//$user_id = 1;                                         
if($_SERVER["REQUEST_METHOD"]=="POST"){
    
      
    
    $saved_text = mysql_real_escape_string($_POST["saved_text"]); 
    // Assume an entry in the DB table exists for this user.                        
     $sqlchk = mysql_query("SELECT * FROM scratchnotes WHERE user_id = '".$id."'");
   $ressr=mysql_fetch_row($sqlchk);  
  if(mysql_num_rows($sqlchk) > 0)
  {
    $sqlme = "UPDATE scratchnotes SET saved_text = '".$saved_text."' ";    
    $sqlme.= "WHERE user_id = '".$id."'";                            
    
    mysql_query($sqlme) or die(mysql_error().$sqlme);           
   // echo "Your data has been saved ".date("h:m:s A");   
    exit; 
   }
  else
   {
     $qryins=mysql_query("Insert into scratchnotes(user_id,saved_text) values('".$id."','".$saved_text ."')");
    exit;
    }

                                                  
}
//echo "SELECT saved_text FROM scratchnotes WHERE user_id = '".$id."'";
$sqlme = "SELECT saved_text FROM scratchnotes WHERE user_id ='".$id."'";
$rs = mysql_query($sqlme) or die(mysql_error().$sqlme);       
$arr = mysql_fetch_array($rs);
$saved_text = $arr["saved_text"];
 
?>

<style>

</style>
<script type="text/javascript">
var $ = function(e){ return document.getElementById(e); }
var swap = function(val, el){
  $(el).value = val;
}

</script>

 <script type="text/javascript">
        function init(){
            window.setInterval(autoSave,4000);                  // 4 seconds
        }
        function autoSave(){
            
            var saved_text = document.getElementById("saved_text").value;
            
            var params = "saved_text="+saved_text;
            var http = getHTTPObject();
            http.onreadystatechange = function(){
                if(http.readyState==4 && http.status==200){
                    msg = document.getElementById("msg");
                    msg.innerHTML = "<span onclick='this.style.display=\"none\";'>"+http.responseText+" (<u>close</u>)</span>";
                }
            };
            http.open("POST", window.location.href, true);
            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            http.setRequestHeader("Content-length", params.length);
            http.setRequestHeader("Connection", "close");
            http.send(params);
        }
        
        //cross-browser xmlHTTP getter
        function getHTTPObject() { 
            var xmlhttp; 
            /*@cc_on 
            @if (@_jscript_version >= 5) 
                try { 
                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); 
                } 
                catch (e) { 
                    try { 
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
                    } 
                    catch (E) { 
                        xmlhttp = false; 
                    } 
                } 
            @else 
                xmlhttp = false; 
            @end @*/  
            
            if (!xmlhttp && typeof XMLHttpRequest != 'undefined') { 
                try {   
                    xmlhttp = new XMLHttpRequest(); 
                } catch (e) { 
                    xmlhttp = false; 
                } 
            } 
            
            return xmlhttp;
        }
    </script>















<script type="text/javascript" src="autocomplete/jquery-1.2.1.pack.js"></script>
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

<!-- multiple selection -->
<script type="text/javascript">
function addThem(){
	
var a = document.opdform.diagn;
//alert(a.value);
var add = a.value+'\n';

document.opdform.diag.value += add;
return true;
}
function savetext()
{
//alert("hi");


var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    { //alert(xmlhttp.responseText);
    document.getElementById("comp").innerHTML=xmlhttp.responseText;
    }

  }
  var savetxt=document.getElementById("comp").value;
  //alert("saveme.php?savetxt="+savetxt);
xmlhttp.open("GET","saveme.php?savetxt="+savetxt,true);

xmlhttp.send();
}
function addThem1(){
var a = document.opdform.rec;

var add = a.value+'\n';

document.opdform.adv.value += add;
return true;
}

function addThem2(){
	
var a = document.opdform.compl;
//alert(a.value);
var add = a.value+'\n';

document.opdform.comp.value += add;
return true;
}

function addThem3(){
	
var a = document.opdform.findi;
//alert(a.value);
var add = a.value+'\n';

document.opdform.comp.value += add;
return true;
}


function addThemsoi(){
	
var a = document.opdform.hos;
//alert(a.value);
var add = a.value+'\n';

document.opdform.soi.value += add;
return true;
}

function addThemaction(){
	
var a = document.opdform.act;
//alert(a.value);
var add = a.value+'\n';

document.opdform.actxt.value += add;
return true;
}

<!--add surgery-->
function addsurgery(){
	
var a = document.opdform.surgery;
//alert(a.value);
var add = a.value+'\n';

document.opdform.soi.value += add;
return true;
}

///add date
function adddt(){
	
var mydate=new Date()
var year=mydate.getYear()
if (year < 1000)
year+=1900
var day=mydate.getDay()
var month=mydate.getMonth()+1
if (month<10)
month="0"+month
var daym=mydate.getDate()
if (daym<10)
daym="0"+daym
var s=daym+"/"+month+"/"+year;
document.getElementById("cdate").value = s

document.opdform.soi.value += s;
return true;
}
//////////////subcat
function loadXMLDoc()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {// alert(xmlhttp.responseText);
    document.getElementById("sub_cat").innerHTML=xmlhttp.responseText;
    }

  }
  var cat=document.getElementById('diagnosis').value;
xmlhttp.open("POST","sub_cat.php?cat="+cat,true);

xmlhttp.send();
}
</script>
<!-- end multiple selection -->

<!-- validation-->
<script type="text/javascript">
function getnextapp(nxtdt,cnt)
{
//alert("hi");
//alert(val+" "+nxtdt);
var week='';
var cn=document.getElementById(cnt).value;
for(i=0;i<cn;i++)
{
if(document.getElementById('days'+i).value!='')
{
if(week!='')
week=week+","+document.getElementById('days'+i).value;
else
week=document.getElementById('days'+i).value;
}
}
//alert(week);

var nextdt=document.getElementById(nxtdt).value;
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    var s=xmlhttp.responseText;
 //alert(s);
		
		
		document.getElementById(nxtdt).value=xmlhttp.responseText;
		
    }
  }
 //alert("get_nextappdt.php?val="+week);
xmlhttp.open("GET","get_nextappdt.php?val="+week+"&nxtdt="+nextdt,true);
xmlhttp.send();

}
function opdvalidate(opdform){
 with(opdform)
 {
  
//alert(opdform);
if(date.value=="")
{
	alert("Please select Date");
	date.focus();
	return false;
}
 
}
 return true;
 }
 ////upload image
function upp(){
var newdiv=document.createElement("div");
var aTextBox=document.createElement('input');
aTextBox.type = 'file';
aTextBox.name = 'image[]';
aTextBox.style='background:none; border:none;';

 //append text to new div
newdiv.appendChild(aTextBox); //append text to new div
//alert(aTextBox)
document.getElementById("img").appendChild(newdiv); 
}
/////////////////////
/*function popcontact(URL) {
	//alert(URL);
var popup_width = 900
var popup_height = 600
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,left=100px,resizable=no,width='+popup_width+',height='+popup_height+'');");
}*/
////add more

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

function getslot(dt,id,hos,center)
{
	//alert('hi');
if(hos=='')
{
document.getElementById('getslot').style.display='none';
}
else
{
document.getElementById('getslot').style.display='block';

	//alert(dt+" "+id+" "+hos+" "+center);
var dt=document.getElementById(dt).value;
var id=document.getElementById(id).value;
var hos=document.getElementById(hos).value;
var center=document.getElementById(center).value;
  var xmlHttp = getXMLHttp();

//alert("hello");

 xmlHttp.onreadystatechange = function()

  {

    if(xmlHttp.readyState == 4)

    {
//alert(xmlHttp.responseText);
      document.getElementById('getslot').innerHTML=xmlHttp.responseText;
//MakeRequest1(dt,id,hos,center);
    }

  }

///alert("hi2");

//var str = escape(document.getElementById('hos1').value);
//var str1 = escape(document.getElementById('appdate').value);
////alert("get_timeslot1.php?hos="+str+"&appdate="+str1);
//alert("get_time1ajax.php?hos="+hos+"&appdate="+dt+"&ad="+id);
 xmlHttp.open("GET", "opdtime.php?hos="+hos+"&appdate="+dt+"&ad="+id+"&center="+center, true);
 //alert("get_time1ajax.php?hos="+0+"&appdate="+dt+"&ad="+id);
//alert("get_timeslot1.php?hos="+str+"&appdate="+str1+"&ad=<?php echo $id; ?>");
  xmlHttp.send(null);
  }

}

function MakeRequest(cnt)

{
document.getElementById(cnt).value=Number(document.getElementById(cnt).value)+1;
var cnt=document.getElementById(cnt).value;
  var xmlHttp = getXMLHttp();

 ///alert("hi");

  xmlHttp.onreadystatechange = function()

  {

    if(xmlHttp.readyState == 4)

    {

      HandleResponse(xmlHttp.responseText);

    }

  }

// alert("hi2");

 xmlHttp.open("GET", "getMore.php?cnt="+cnt, false);
//alert("getMore.php?cnt="+cnt);
  xmlHttp.send(null);

}
function HandleResponse(response)

{
///alert(response);
var ni =document.getElementById('detail');

var numi = document.getElementById('theValue');
var num = parseInt(document.getElementById('theValue').value) +1;
numi.value = num;

var newdiv = document.createElement('div');

var divIdName = num;

newdiv.setAttribute('id',divIdName);

newdiv.innerHTML =response;
ni.appendChild(newdiv);


document.getElementById('barcode').value='';
document.getElementById('theValue').focus();
}

</script><!--end validation-->

<link href="datepicker/date_css.css" rel="stylesheet" type="text/css" />
<script src="datepicker/datepick_js.js" type="text/javascript" charset="utf-8"></script>

<script language="javascript" type="text/javascript">


///dob
window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"dob",
			dateFormat:"%d/%m/%Y"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
		no();
	};
</script>
<link href="jsDatePick_ltr.min.css" rel="stylesheet" type="text/css" />
<script src="jsDatePick.min.1.3.js" type="text/javascript" charset="utf-8"></script>



<script type="text/javascript">
function getpotency(id,field)
{ //alert("h");
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    		///alert(s1[0]+"/"+s1[1]);
			//alert(xmlhttp.responseText);
		document.getElementById(field).innerHTML=xmlhttp.responseText;
		
    }
  }
  
  var str=document.getElementById(id).value;
  
xmlhttp.open("GET","getpotency.php?medid="+str,true);
//alert("getpotency.php?medid="+str);
xmlhttp.send();
}

/////////////doctor ref
function docref()
{ //alert("h");
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    var s=xmlhttp.responseText;
    ///alert(s);
		var s1=s.split('#');
		///alert(s1[0]+"/"+s1[1]);
		document.getElementById("city1").value=s1[0];
		document.getElementById("cn1").value=s1[1];
		document.getElementById("email3").value=s1[2];
		document.getElementById("spl").value=s1[3];
   
    }
  }
  
  var str=document.getElementById('ref1').value;
  
xmlhttp.open("GET","get_ref.php?docref="+str+"&ref=df",true);
///alert("get_ref.php?docref="+str+"&ref=df");
xmlhttp.send();
}

///end of ref
function toss()
{ ////alert("h");
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    var s=xmlhttp.responseText;
   // alert(s);
		var s1=s.split('#');
		///alert(s1[0]+"/"+s1[1]);
		document.getElementById("toscity").value=s1[0];
		document.getElementById("tostel").value=s1[1];
		document.getElementById("tosemail").value=s1[2];
		
   
    }
  }
  
  var str=document.getElementById('tos').value;
  
xmlhttp.open("GET","get_ref.php?docref="+str+"&ref=df",true);
///alert("get_ref.php?docref="+str+"&ref=tos");
xmlhttp.send();
}
//////end of ortho surgeon and strting of paed

function paedd()
{ //alert("h");
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    var s=xmlhttp.responseText;
   /// alert(s);
		var s1=s.split('#');
		///alert(s1[0]+"/"+s1[1]);
		document.getElementById("paedcity").value=s1[0];
		document.getElementById("paedtel").value=s1[1];
		document.getElementById("paedemail").value=s1[2];
		
   
    }
  }
  
  var str=document.getElementById('paed').value;
  
xmlhttp.open("GET","get_ref.php?docref="+str+"&ref=df",true);
///alert("get_ref.php?docref="+str+"&ref=tos");
xmlhttp.send();
}
///////////phys
function physs()
{ //alert("h");
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    var s=xmlhttp.responseText;
    ///alert(s);
		var s1=s.split('#');
		///alert(s1[0]+"/"+s1[1]);
		document.getElementById("physcity").value=s1[0];
		document.getElementById("phystel").value=s1[1];
		document.getElementById("physemail").value=s1[2];
		
   
    }
  }
  
  var str=document.getElementById('phys').value;
  
xmlhttp.open("GET","get_ref.php?docref="+str+"&ref=df",true);
///alert("get_ref.php?docref="+str+"&ref=tos");
xmlhttp.send();
}
///start of neuu
function neuu()
{ ///alert("h");
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    var s=xmlhttp.responseText;
    ///alert(s);
		var s1=s.split('#');
		///alert(s1[0]+"/"+s1[1]);
		document.getElementById("neucity").value=s1[0];
		document.getElementById("neutel").value=s1[1];
		document.getElementById("neuemail").value=s1[2];
		
   
    }
  }
  
  var str=document.getElementById('neu').value;
  
xmlhttp.open("GET","get_ref.php?docref="+str+"&ref=df",true);
//alert("get_ref.php?docref="+str+"&ref=tos");
xmlhttp.send();
}
///strt sw
function swwn()
{ //alert("h");
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    var s=xmlhttp.responseText;
    //alert(s);
		var s1=s.split('#');
		///alert(s1[0]+"/"+s1[1]);
		document.getElementById("swcity").value=s1[0];
		document.getElementById("swtel").value=s1[1];
		document.getElementById("swemail").value=s1[2];
		
   
    }
  }
  
  var str=document.getElementById('sw').value;
  
xmlhttp.open("GET","get_ref.php?docref="+str+"&ref=sw",true);
//alert("get_ref.php?docref="+str+"&ref=sw");
xmlhttp.send();
}
function hidediv()
{
document.getElementById("getslot").innerHTML='';
document.getElementById("gettime").innerHTML='';
document.getElementById("sl").value='';
//document.getElementById("getslot").style.display='none';
//document.getElementById("gettime").style.display='none';
}
</script>
<script language="javascript">
  /*  function InsertBreak(e,id){
	
	//var id=document.getElementById(id).value;
        //check for return key=13
        if (parseInt(e.keyCode)==13) {
		//alert("hi");
            //get textarea object
            var objTxtArea;
            objTxtArea=document.getElementById(id);
		
    //insert the existing text with the <br>
        objTxtArea.value=objTxtArea.value+"<br>";
		//	alert(objTxtArea.value);
        }
    
    }*/
</script>
<script>
/*function temp()
{
	alert("hi");
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    var s=xmlhttp.responseText;
    alert(s);
		var s1=s.split('#');
		///alert(s1[0]+"/"+s1[1]);
		document.getElementById("comp").value=s1[0];
		document.getElementById("findin").value=s1[1];
		document.getElementById("adv").value=s1[2];
		document.getElementById("diag").value=s1[3];
   
    }
  }
  
  var str=document.getElementById('examtemp').value;
  
xmlhttp.open("GET","get_exm.php?exm="+str,true);
alert("get_exm.php?exm="+str);
xmlhttp.send();
}*/
///
function temp1()
{ 
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    var s=xmlhttp.responseText;
   /// alert(s);
		var s1=s.split('#');
		///alert(s1[0]+"/"+s1[1]);
		document.getElementById("comp").value=s1[0]."\n".s1[1];
		//document.getElementById("findin").value=s1[1];
		document.getElementById("adv").value=s1[2];
		document.getElementById("diag").value=s1[3];
   
    }
  }
  
 
  var str=document.getElementById('opdtemp').value;
 
xmlhttp.open("GET","get_exm1.php?exm1="+str,true);
xmlhttp.send();
}

<!--add new hospital-->
function hoswindow()
{

  mywindow = window.open("new_hosp.php", "mywindow", "location=1,status=1,scrollbars=1, width=500,height=300");
    //mywindow.moveTo(300, 250);
 }
 
 /*function popcontact(URL) {
var popup_width = 900
var popup_height = 600
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,left=100px,resizable=no,width='+popup_width+',height='+popup_height+'');");
}*/

<!-- examination template -->
/*function temp()
{
	alert("hi");
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    var s=xmlhttp.responseText;
    alert(s);
		var s1=s.split('#');
		///alert(s1[0]+"/"+s1[1]);
		document.getElementById("comp").value=s1[0];
		document.getElementById("findin").value=s1[1];
		document.getElementById("adv").value=s1[2];
		document.getElementById("diag").value=s1[3];
   
    }
  }
  
  var str=document.getElementById('examtemp').value;
  
xmlhttp.open("GET","get_exm.php?exm="+str,true);
alert("get_exm.php?exm="+str);
xmlhttp.send();
}*/
///
function temp1()
{ 
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    var s=xmlhttp.responseText;
   /// alert(s);
		var s1=s.split('#');
		///alert(s1[0]+"/"+s1[1]);
		document.getElementById("comp").value=s1[0]."\n".s1[1];
		//document.getElementById("findin").value=s1[1];
		document.getElementById("adv").value=s1[2];
		document.getElementById("diag").value=s1[3];
   
    }
  }
  
 
  var str=document.getElementById('opdtemp').value;
 
xmlhttp.open("GET","get_exm1.php?exm1="+str,true);
xmlhttp.send();
}


</script>
<script type="text/javascript">
/*function addThem(){
	
var a = document.opdform.diagn;
//alert(a.value);
var add = a.value+',';

document.opdform.diag.value += add;
return true;
}

function addThem1(){
var a = document.opdform.rec;

var add = a.value+',';

document.opdform.adv.value += add;
return true;
}

function addThem2(){
	
var a = document.opdform.compl;
//alert(a.value);
var add = a.value+',';

document.opdform.comp.value += add;
return true;
}

function addThem3(){
	
var a = document.opdform.findi;
//alert(a.value);
var add = a.value+',';

document.opdform.findin.value += add;
return true;
}


function addThemsoi(){

	
var a = document.opdform.hos;
//alert(a.value);
var add = a.value+',';

document.opdform.soi.value += add;
return true;
}

function addThemaction(){
	
var a = document.opdform.act;
//alert(a.value);
var add = a.value+',';

document.opdform.actxt.value += add;
return true;
}

<!--add surgery-->
function addsurgery(){
	
var a = document.opdform.surgery;
//alert(a.value);
var add = a.value+',';

document.opdform.soi.value += add;
return true;
}*/
///add date
function adddt(){
	
var mydate=new Date()
var year=mydate.getYear()
if (year < 1000)
year+=1900
var day=mydate.getDay()
var month=mydate.getMonth()+1
if (month<10)
month="0"+month
var daym=mydate.getDate()
if (daym<10)
daym="0"+daym
var s=daym+"/"+month+"/"+year;
document.getElementById("cdate").value = s

document.opdform.soi.value += s;
return true;
}

 ////upload image
function upp(){
var newdiv=document.createElement("div");
var aTextBox=document.createElement('input');
aTextBox.type = 'file';
aTextBox.name = 'image[]';
aTextBox.style='background:none; border:none;';

 //append text to new div
newdiv.appendChild(aTextBox); //append text to new div
//alert(aTextBox)
document.getElementById("img").appendChild(newdiv); 
}

/////////////////////
function popcontact(URL) {
var popup_width = 900
var popup_height = 600
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,left=100px,resizable=no,width='+popup_width+',height='+popup_height+'');");
}

<!-- examination template -->
function temp()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    var s=xmlhttp.responseText;
   // alert(s);
		var s1=s.split('#');
		///alert(s1[0]+"/"+s1[1]);
		document.getElementById("comp").value=s1[0]+"\n"+s1[1];
		//document.getElementById("findin").value=s1[1];
		document.getElementById("adv").value=s1[2];
		document.getElementById("diag").value=s1[3];
   
    }
  }
  
  var str=document.getElementById('examtemp').value;
  
xmlhttp.open("GET","get_exm.php?exm="+str,true);
xmlhttp.send();
}
///
function temp1()
{ 
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    var s=xmlhttp.responseText;
   /// alert(s);
		var s1=s.split('#');
		///alert(s1[0]+"/"+s1[1]);
		document.getElementById("comp").value=s1[0];
		document.getElementById("findin").value=s1[1];
		document.getElementById("adv").value=s1[2];
		document.getElementById("diag").value=s1[3];
   
    }
  }
  
 
  var str=document.getElementById('opdtemp').value;
 
xmlhttp.open("GET","get_exm1.php?exm1="+str,true);
xmlhttp.send();
}
function pres(){
//alert ("isuhgf");
	var comp=document.getElementById('comp').value;
	comp = comp.replace(/\n/g, '<br>');
	//alert(comp);
	//var findin=document.getElementById('findin').value;
	//findin=findin.replace(/\n/g, '<br>');
	//alert(findin);
	//var adv=document.getElementById('adv').value;
	//adv=adv.replace(/\n/g, '<br>');
	//alert(adv);
	//var diag=document.getElementById('diag').value;
	//diag=diag.replace(/\n/g, '<br>');
	//alert(diag);
	var date1=document.getElementById('date1').value;
	//alert(date1);
	var invest=document.getElementById('invest').value;
	invest=invest.replace(/\n/g, '<br>');
	//alert(invest);
	var med=document.getElementsByClassName('med'); 
	var tak=document.getElementsByClassName('tak'); 
	var dos=document.getElementsByClassName('dos'); 
	var pot=document.getElementsByClassName('pot');
		var cmnt=document.getElementsByClassName('cmnt');
	var cmnt1="";
	var med1=""; 
	var tak1=""; 
	var dos1="";
	var pot1="";
	


//alert(findin);




//document.write('string');
//alert("med "+med.length);
	for(i=0;i<med.length;i++) {
		//alert("hi "+i);
		med1=med1+med[i].value+", ";
		
	    tak1=tak1+tak[i].value+", ";
	
	    dos1=dos1+dos[i].value+", ";
		 pot1=pot1+pot[i].value+", ";
		  cmnt1=cmnt1+cmnt[i].value+", ";
	}
	//alert("hi");
	//popcontact('clinic1_print.php?id=<?php echo $id; ?>&comp='+comp+'&adv='+adv+'&diag='+diag+'&date1='+date1+'&invest='+invest+'&med1='+med1+'&tak1='+tak1+'&dos1='+dos1+'&pot1='+pot1+'&cmnt1='+cmnt1);
	popcontact('clinic1_print.php?id=<?php echo $id; ?>&comp='+comp+'&date1='+date1+'&invest='+invest+'&med1='+med1+'&tak1='+tak1+'&dos1='+dos1+'&pot1='+pot1+'&cmnt1='+cmnt1);

	
}

function newhos()
{
	var hos=document.getElementById('hospital');
	var val=hos.options[hos.selectedIndex].value;
	if(val=='Other'){
	//alert("hi");
	var tableName1 = document.getElementById("sub");
	var newtr1 = document.createElement("TR");
	var newName1 = document.createElement("TD");
	newName1.setAttribute("colspan", "2");
	newName1.innerHTML="<input type='text'  name='newhospital' id='newhospital' placeholder='New Hospital'>";
	newtr1.appendChild(newName1);
	tableName1.appendChild(newtr1);
	}
}


//////get start date
function MakeRequest3()

{

  var xmlHttp = getXMLHttp();

//alert("hi");

  xmlHttp.onreadystatechange = function()

  {

    if(xmlHttp.readyState == 4)

    {

      HandleResponse3(xmlHttp.responseText);

    }

  }

//alert("hi2");

//var str = escape(document.getElementById('hos').value);
var str1 = escape(document.getElementById('nxtdate').value);
//var str1 = escape(document.getElementById('type').value);

//alert(str1);
 xmlHttp.open("GET", "get_opdtime.php?nxtdate="+str1, true);
//alert("getitem.php?cname="+str+"&type="+str1);
  xmlHttp.send(null);

}
function HandleResponse3(response)

{
//alert(response);
document.getElementById('detail3').innerHTML=response;

}


function ex(){
	
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
function MakeRequest4()

{

  var xmlHttp = getXMLHttp();

//alert("hi");

  xmlHttp.onreadystatechange = function()

  {

    if(xmlHttp.readyState == 4)

    {

      HandleResponse4(xmlHttp.responseText);

    }

  }

//alert("hi2");

var str = escape(document.getElementById('hos1').value);
var str1 = escape(document.getElementById('nxtdate').value);
 xmlHttp.open("GET", "get_opdtimeslot.php?hos1="+str+"&nxtdate="+str1, true);
//alert("getitem.php?cname="+str+"&type="+str1);
  xmlHttp.send(null);

}
function HandleResponse4(response)

{
//alert(response);
document.getElementById('detail4').innerHTML=response;

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

 
var	childWin2 = null;
function openchild(id,url,winname,style,field){
//alert("hi");
//alert(id+" "+url+" "+winname+" "+style+" "+field);
url=url+"&field="+field;

 childWin2 = window.open(url,winname, style);
 }
 function setmsg(obj,field)
{
// alert("Parent "+obj);
 select = document.getElementById(field);
 var opt = document.createElement('option');
    opt.value = obj;
    opt.innerHTML = obj;
    select.appendChild(opt);
	var objSelect = document.getElementById(field);

//Set selected
setSelectedValue(objSelect, obj);

function setSelectedValue(selectObj, valueToSet) {
    for (var i = 0; i < selectObj.options.length; i++) {
	//alert(selectObj.options[i].text);
        if (selectObj.options[i].text== obj) {
		//alert(obj);
            selectObj.options[i].selected = true;
            return;
        }
    }
}
if(field=='examtemp')
temp();
else if(field=='opdtemp')
temp1();
//MakeRequest();
//MakeRequest1();
}
function MakeRequest1(dt,id,hos,center)
{
	//alert(dt+" "+id+" "+hos+" "+center);
//document.getElementById("getslot").style.display='block';
if(hos=='')
{
document.getElementById('gettime').style.display='none';
}
else
{
document.getElementById('gettime').style.display='block';
var dt=document.getElementById(dt).value;
var id=document.getElementById(id).value;
var hos=document.getElementById(hos).value;
var center=document.getElementById(center).value;
  var xmlHttp = getXMLHttp();

//alert("hello");

  xmlHttp.onreadystatechange = function()

  {

    if(xmlHttp.readyState == 4)

    {
//alert(xmlHttp.responseText);
document.getElementById('gettime').innerHTML=xmlHttp.responseText;
      //HandleResponse2(xmlHttp.responseText);

    }

  }

///alert("hi2");


////alert("get_timeslot1.php?hos="+str+"&appdate="+str1);
 xmlHttp.open("GET", "get_timeslot1.php?hos="+hos+"&appdate="+dt+"&ad="+id+"&center="+center, true);
//alert("get_timeslot1.php?hos="+hos+"&appdate="+dt+"&ad="+id);
  xmlHttp.send(null);
}
}

</script>



<!--Prescription functon-->
<script>

 function personPrescription(id)
    {
		//alert(id);
		
	  var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		//alert(xmlhttp.responseText);
        var s=xmlhttp.responseText;
	var s1=s.split("##@");
		document.getElementById("oldpreci").innerHTML=s1[0];
		//alert(s1[1]);
   document.getElementById("nxtdate").value=s1[1];
   getslot('nxtdate','patient_id','apptype','center2');
   MakeRequest1('nxtdate','patient_id','apptype','center2');
    }
  }
  
 //alert("get_datepresc.php?id="+id);
xmlhttp.open("GET","get_datepresc.php?id="+id,true)
xmlhttp.send();
	 
	}
var previousCheckId;

     function toggle(chkBox) {
         if (chkBox.checked) {
              if (previousCheckId) {
                   document.getElementById(previousCheckId).checked = false;
              }
              previousCheckId = chkBox.getAttribute('id');
         }
     }
 
</script>
<link href="All_MiddleBar.css" rel="stylesheet" type="text/css" />

<!-- end of popup window -->

</head>

<body onLoad="init();">


<div class="M_page">

         <form method="post" class="" action="new_opd.php" name="opdform" onSubmit="return opdvalidate(this)" enctype="multipart/form-data" style="font-variant:normal">
                <fieldset class="textbox">
                <legend><h1><img src="ddmenu/opd.png" height="50" width="50">OPD</h1></legend>
                <?php //echo "select * from appoint where app_real_id='".$aid."'"; ?>
                <input type="hidden" name="myvar" value="0" id="theValue" />
                <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $id; ?>"/>
<input id="namepat" name="namepat" type="hidden" value="<?php echo  $row[6]; ?>"/> 
                 <input type="hidden" name="aid" value="<?php echo $aid; ?>"/>
                  <input type="hidden" id="sl" name="sl"/> 
                 
                
                <table width="858" id="sub">
                <tr>
                <td width="62"><label>Upload Report</label></td>
                <td colspan="2"><div id="img"><input type="file" name="image[]" id="image[]" ></div>
                <br/>
                <a href="#" onClick="upp()">Add More</a><br/></td>
                <td width="419">
                <?php
			//echo "select * from opd where patient_id='$id'";
				 $rs=mysql_query("select * from opd where patient_id='$id'");
				$s=mysql_num_rows($rs);
				///echo $s;
				if($s==0){
				?>
                <input  name="ode1[]" id="code1[]" type="checkbox" onClick="window.location.href='pre_inves.php?id=<?php echo $id ?>&aid=<?php echo $aid; ?>'" /><label>Pre- Investigation</label>
                <?php } ?>
                &nbsp;&nbsp;<font size="+1"><a href="Timeline/horizontal.php?id=<?php echo $id; ?>" target="_blank" >History</a></font> <?php echo "<a href='wordfile/".$row[19]."/".$id.".html' target='_new'>View Word File</a>"; ?></td>
                </tr>
                <tr>
                <td><label class="name">Name:</label></td>
                <td width="239"><input id="name" name="name" type="text" value="<?php echo $row[6]; ?>" readonly /> </td>

<?php 
//echo $s[8];
$sql4="select  type from apptype where type<>'' order by type ASC";
$result4 = mysql_query($sql4);
?>              <td width="118"><label class="hospital">Appointment Type:</label></td>
                <td valign="top"><?php //echo $appro[18] ?>
                <select name="hospital" id="hospital" >
                <option value="0">Select</option>
                <?php while($row4=mysql_fetch_row($result4)) { ?>
                <option value="<?php echo $row4[0]; ?>" <?php if($row4[0]==$appro[18]){  echo "selected";  } ?>><?php echo $row4[0]; ?></option>
                <?php } ?>
                </select>                </td>
                </tr>
                
                
                <tr>
                <td><label class="date1">Date: </label></td>
                <td ><input id="date1" name="date1" type="text" value="<?php if($oprow[1]!='0000-00-00' || $oprow[1]!='' || $oprow[1]!='null'){ echo date('d/m/Y',strtotime($dt)); }else { echo date('d/m/Y'); }    ?>" onClick="displayDatePicker('date1');"></td>
				
				<td colspan="3">
				&nbsp;&nbsp;&nbsp;&nbsp;<button class="submit formbutton" type="button"  name="print1" id="print1" style="width:140px;" onClick="javascript:pres();"><b>Print Prescription</b></button>    
				<button class="submit formbutton" type="button"  name="copy" id="copy" style="width:150px;" onClick=";">Copy Data from Patient</button>
				    <!--<button class="submit formbutton" type="button"  name="newfollow" id="newfollow" style="width:140px;" onClick="">New/Follow Up</button>-->
				</td>
                </tr>
                </table>
                
                <table width="1114">
                <tr>
                <td width="484">
                <?php $result11=mysql_query("select name from templa where name<>''");?>
               <label> Select Examination Template :</label>&nbsp;&nbsp;<a href="#" onClick="openchild(this.id,'newtemplate.php?type=ajax&tbl=templa','template','width=600,height=450,left=200,top=100','examtemp')"><img src="images/add.png" height="15px" width="15px" title="Add New Template" /></a>
                <select name="examtemp" id="examtemp"  onChange="temp();">
                <option value="">-Select-</option>
                <?php while ($row11=mysql_fetch_row ($result11))
				{ ?>
            	<option value="<?php echo $row11[0];?>"><?php echo $row11[0];?></option>
           		<?php } ?>
                </select>
                </td>
                
                <td width="470">
                <?php $result12=mysql_query("select heading from templa1 where heading<>''");?>
				<label>Select OPD Template :</label>&nbsp;&nbsp;<a href="#" onClick="openchild(this.id,'newtemplate.php?type=ajax&tbl=templa1','template','width=600,height=700,left=200,top=100','opdtemp')"><img src="images/add.png" height="15px" width="15px" title="Add New Template" /></a><select name="opdtemp" id="opdtemp"  onChange="temp1();">
                  <option value="">-Select-</option>
                  <?php while ($row12=mysql_fetch_row ($result12))
				{ ?>
                  <option value="<?php echo $row12[0];?>"><?php echo $row12[0];?></option>
                  <?php } ?>
                </select></td>
				<!--<td width="28">   Summary of Interventions: 
         <br /> <textarea name="soi" cols="33" rows="7" style="resize:none;font-variant:normal" onKeyDown="InsertBreak(event,'soi');"></textarea></td>-->
                </tr>
                
<?php
//$sql="select * from  opdbill ";
//$res = mysql_query($sql);
//$row5 = mysql_fetch_row($res);
?>
<?php
include ('config.php');
$result4=mysql_query("select name,id from compla");
/*$qrymetxt=mysql_query("Select notes from scratchnotes");
$qrytxtres=mysql_fetch_row($qrymetxt);*/

?>

  <tr>
    <td colspan="2" ><label> History: </label>
          <select name="compl" onChange="addThem2()">
            <option value="">-Select-</option>
            <?php while ($row4=mysql_fetch_row ($result4))
				{ ?>
            <option value="<?php echo $row4[0];?>"><?php echo $row4[0];?></option>
            <?php } ?>
          </select>
          <label> <?php

$result5=mysql_query("select name from clinic");
?>Clinical Details:</label> 
         
  <select name="findi"  onChange="addThem3()">
            <option value="0">-Select-</option>
            <?php while ($row5=mysql_fetch_row ($result5))
				{ ?>
            <option value="<?php echo $row5[0];?>"><?php echo $row5[0];?></option>
            <?php } ?>
          </select>
      <br />
          <textarea name="saved_text" id="saved_text" cols="50" rows="10" style="resize:none;font-variant:normal; width:800px; height:120px"><?php echo  $saved_text;?></textarea>
      </td>
      <!--<td><button class="submit formbutton" type="button"  name="saveme" id="saveme" style="width:150px;" onClick="savetext();"><b>Save</b></button>
      </td>-->
   
    <!--<td width="266" > 
      <br />
         <!-- <textarea name="findin" id="findin" cols="28" rows="5" style="resize:none;font-variant:normal"></textarea>-->
    <!--  </td>
    <td width="312">
<!--<?php 
$sql4="select name,hospital_id from hospital ";
$result4 = mysql_query($sql4);
?>
    <select name="hos" onChange="addThemsoi();" style="width:200px;">
      <option value="0">Select Hospital</option>
      <?php while($row4=mysql_fetch_row($result4)) { ?>
      <option value="<?php echo $row4[0]; ?>"><?php echo $row4[0]; ?></option>
      <?php } ?>
    </select>
    
        <br /><br />
<?php 
$sql14="select * from surmast where name<>'' order by name ASC";
$result14 = mysql_query($sql14);
?>
        <select name="surgery" style="width:200px;" onChange="addsurgery()">
          <option value="0">Select Surgery</option>
          <?php while($row14=mysql_fetch_row($result14)) { ?>
          <option value="<?php echo $row14[0]; ?>"><?php echo $row14[0]; ?></option>
          <?php } ?>
        </select>
        <br />
        &nbsp;&nbsp;&nbsp;&nbsp;<button class="submit formbutton" type="button"  name="cdate" id="cdate" style="width:100px;" onClick="adddt();">Insert Date</button></td>-->
     
   
  </tr>
  
  <!--<tr>
  <?php

$result6=mysql_query("select name,id from advise");
?>
    <td><label>Advised:</label>
          <select name="rec"  onChange="addThem1()">
            <option value="0">-Select-</option>
            <?php while ($row6=mysql_fetch_row ($result6))
				{ ?>
            <option value="<?php echo $row6[0];?>"><?php echo $row6[0];?></option>
            <?php } ?>
          </select>
      <br />
          <textarea name="adv" id="adv" cols="28" rows="5" style="resize:none;font-variant:normal" onKeyDown="InsertBreak(event,'adv');"></textarea>
      </td>
    <?php 

$result3 = mysql_query("select name from keyword");
?>
    <td><label> Diagnosis: </label>
          <select name="diagn"  onChange="addThem()" <?php if($type=='O') { ?> disabled <?php } ?>>
            <option value="0">-Select-</option>
            <?php while($row=mysql_fetch_row($result3))
                {  ?>
            <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
            <?php } ?>
          </select>
      <br />
          <textarea name="diag" id="diag" cols="28" rows="5" style="resize:none;font-variant:normal" <?php if($type=='O') { ?>  readonly<?php } ?> onKeyDown="InsertBreak(event,'diag');"><?php echo $oprow[0]; ?></textarea>
      </td>
	  
	  <td valign="top">

   <!--
      
      <?php $result13=mysql_query("select name,keyword_id from keyword where name<>''"); ?>
	  Keyword:<select name="key1" style="width:250px;">
	  <option value="0">-Select-</option>
      <?php while($row13=mysql_fetch_row($result13))
                {  ?>
            <option value="<?php echo $row13[0]; ?>"><?php echo $row13[0]; ?></option>
            <?php } ?>
	  </select>
	  </td>
	  
	  
	  
  </tr>-->
  <tr>
    <td>  <!--Impression: 
          <textarea name="impr" id="impr" cols="30" rows="4" style="resize:none;" onKeyDown="InsertBreak(event,'impr');"></textarea>-->
          <label>Investigations Advised: </label>
      <textarea name="invest" id="invest" cols="30" rows="4" style="resize:none;" onKeyDown="InsertBreak(event,'invest');"></textarea>
      </td>
       <td valign="top"><label>Instructions:</label><br />
		<textarea name="instruc" id="instruc" cols="30" rows="4" style="resize:none;" onKeyDown="InsertBreak(event,'instruc');"></textarea></td>
            
         
    <!--<td>  
    <label>Physiotherapy Goals: </label>
          <textarea name="physio" id="physio" cols="30" rows="4" style="resize:none;" onKeyDown="InsertBreak(event,'physio');"></textarea>
      </td>
    <td>  
      </td>-->
	 
  </tr>
  <?php 

$result13 = mysql_query("select name,action_id from action");
?>
 <tr> <td colspan="3">
  <label>Status: </label>
            <br />
             <textarea rows="4" cols="30" name="comm" id="comm" value><?php echo $row[70]; ?></textarea>
  <!-- Action Plan: 
            <select name="act" id="act" style="width:200px; border:1px #ac0404 solid;" onChange="swap(this.value, 'actxt')">
              <option value="0">-Select-</option>
              <?php while($row13=mysql_fetch_row($result13))
                {  ?>
              <option value="<?php echo $row13[0]; ?>"><?php echo $row13[0]; ?></option>
              <?php } ?>
            </select>
    <br />
    <input type="text" id="actxt" name="actxt" style="width:200px;"/>
    <br />
  
  Cost: <br />  
            <input type="text" name="cost" id="cost" style="width:200px;"/>-->
  </td>		
		</tr>
        
        <tr><td colspan="0"> <label>Repeat Prescriptions </label></td></tr>
        <tr><td><table border="1" cellpadding="0" cellspacing="5"><tr>
		<?php 
		 //echo $id;
		 $que = "select opd_id,opddate from opd where patient_id='".$id."'";
		 //echo $que;
		 $result = mysql_query($que);
		 //$rowpris = mysql_fetch_row($result);
		  $cnt=0;
		  while ($rowpris=mysql_fetch_row ($result)){
			  
			  
			  ?>
              <td> <input type="checkbox" name="cekpres[]" id="cekpres<?php echo $cnt; ?>" value="<?php echo $rowpris[0];?>"  onClick="toggle(this);personPrescription('<?php echo $rowpris[0];?>');"> &nbsp;&nbsp;&nbsp;
               <?php echo $rowpris[1];?> </td><?php if($cnt%2==0){ ?> <?php }$cnt=$cnt+1; ?>       
              <?php } ?>
              
              
              
             </tr></table>
             
             <div id="oldpreci"></div>
             </td></tr>
</table>
<div id="detail">            
                <table width="1039" class="results">
                <thead>
                <tr><th>Medicine Name </th><!--<th>Drugs</th><th>Potency</th><th>Repetition </th><th>dosage</th>-->
<th>Duration/week</th><!--<th>Blister</th><th>Instruction</th>--><th>Others</th></tr>
                </thead>
                <?php for($j=0;$j<8;$j++){?>
                <tbody>
                <tr>
                <td>
                <!--<select style="width:140px;" name="med[]" id="med<?php echo $j ?>" class="med[]" onChange="getpotency('med<?php echo $j ?>','pot<?php echo $j; ?>')">-->
                <select style="width:140px;" name="med[]" id="med<?php echo $j ?>" class="med[]">
                <option value="">Select</option>
                <?php $result3 = mysql_query("select name,potency from medicine ");
				    while($row=mysql_fetch_row($result3)){ ?>
					<option value="<?php echo $row[0]."-".$row[1]; ?>"><?php echo $row[0]."-".$row[1]; ?></option>
				<?php } ?>
                </select>
                </td>
                <!--<td><input type="text" name="drugs[]" id="drugs[]"></td>
                <td><select name="pot[]" id="pot<?php echo $j; ?>" class="pot[]">
                <option value="">-select-</option>
                <!--<option value="3X"></option>
<option value="6X">6X</option>
<option value="6C">6C</option>
<option value="30">30</option>
<option value="200">200</option>
<option value="1m">1m</option>
<option value="10m">10m</option>
<option value="50m">50m</option>
<option value="cm">cm</option>
<option value="Q">Q</option>
<option value="biocombination">biocombination</option>
<option value="syrups">syrups</option>
<option value="ointments">ointments</option>
<option value="pentarkans">pentarkans</option>
<option value="combinations">combinations</option>
<option value="others">others</option>
<option value="POWDER">POWDER</option>-->

                <!--</select>
                </td>
                <td>
				<select name="dos[]" id="dos">
                <option value="">Select</option>
                <option value="1DOSE">1DOSE</option>
<option value="2DOSE">2DOSE</option>
<option value="3DOSE">3DOSE</option>
<option value="4DOSE">4DOSE</option>
<option value="5DOSE">5DOSE</option>
<option value="1hrly">1hrly</option>
<option value="2hrly">2hrly</option>
<option value="4DROPS">4DROPS</option>
<option value="5DROPS">5DROPS</option>
<option value="6DROPS">6DROPS</option>
<option value="7DROPS">7DROPS</option>
<option value="8DROPS">8DROPS</option>
<option value="10DROPS">10DROPS</option>
<option value="12DROPS">12DROPS</option>
<option value="15DROPS">15DROPS</option>
</select>
                
				</td>
           <td><select name="dosage[]" id="dosage[]">
           <option value="">Select</option>
        <option value="daily">daily</option>
<option value="sos">sos</option>
<option value="stat">stat</option>
<option value="1/4weeks">1/4weeks</option>
<option value="2/4weeks">2/4weeks</option>
<option value="3/4weeks">3/4 weeks</option>
<option value="4/4weeks">4/4weeks</option>
<option value="LA">LA</option>
<option value="WEEKLY ONCE">WEEKLY ONCE</option> 
<option value="WEEKLY TWICE">WEEKLY TWICE</option> 

           </select></td>-->
				
				<td>
				<select name="days[]" id="days<?php echo $j; ?>" style="width:140px;" class="days[]" onChange="getnextapp('nxtdate','forcnt');">
                <option value="">Select</option>
                <!--<option value="NA">NA</option>-->
<option value="5 days">5DAYS</option>
<option value="1 weeks">1WEEK</option>
<option value="10 days">10DAYS</option>
<option value="2 weeks">2WEEKS</option>
<option value="3 weeks">3WEEKS</option> 
<option value="4 weeks">4WEEKS</option>
<option value="5 weeks">5WEEKS</option>
<option value="6 weeks">6WEEKS</option>
<option value="7 weeks">7WEEKS</option>
<option value="8 weeks">8WEEKS</option>
<option value="9 weeks">9WEEKS</option>
<option value="10 weeks">10WEEKS</option>
<option value="11 weeks">11WEEKS</option> 
<option value="12 weeks">12WEEKS</option>  
<!--<option value="pls make it">pls make it</option> 
<option value="till">till</option>-->
<option value="52 weeks">52weeks</option> 

			</select>	</td>
            <!--<td>
            <select name="blis[]"><option value="">Select</option>
           <option value="white">white</option>
<option value="green">green</option>
<option value="yellow">yellow</option>
<option value="red">red</option>
<option value="brown">brown</option>

            </select>
            </td>
            <td>
            <select name="inst[]">
            <option value="">Select</option>
            <option value="diabetic dose">diabetic dose</option>
<option value="fill it full">fill it full</option>
<option value="3pills">3pills</option>
<option value="2 biochemic tablets">2 biochemic tablets</option>
<option value="zig zag">zig zag</option>
<option value="no zig zag">no zig zag</option>
<option value="morning">morning</option>
<option value="afternoon">afternoon</option>
<option value="night">night</option>
<option value="sos headache">sos headache</option>
<option value="sos cold">sos cold</option>
<option value="sos cough">sos cough</option>
<option value="sos stomach pain">sos stomach pain</option>
<option value="sos loose motiosn">sos loose motiosn</option>
<option value="sos vomitting">sos vomitting</option>
<option value="sos breathlessness">sos breathlessness</option>
<option value="sos hernia">sos hernia</option>
<option value="sos pain">sos pain</option>
<option value="sos sleep">sos sleep</option>
<option value="sos gases">sos gases</option>
<option value="sos throat">sos throat</option>
<option value="sos fever">sos fever</option>
<option value="sos vertigo">sos vertigo</option>
<option value="sos menses">sos menses</option>
<option value="sos bleeding">sos bleeding</option>
<option value="sos piles/fissure">sos piles/fissure</option>
<option value="sos">sos</option>
<option value="1BTL">1BTL</option>
<option value="2BTLS">2BTLS</option>
<option value="3BTLS">3BTLS</option>
<option value="4BTLS">4BTLS</option>
<option value="5BTLS">5BTLS</option>
<option value="6BTLS">6BTLS</option>
<option value="7BTLS">7BTLS</option>
<option value="8BTLS">8BTLS</option>
<option value="9BTLS">9BTLS</option>
<option value="10BTLS">10BTLS</option>
<option value="11BTLS">11BTLS</option>
<option value="12BTLS">12BTLS</option>

            </select>
            </td>-->
                 <td><input type="text" name="cmnt[]" id="cmnt[]" style="width:400px;" class="cmnt[]"/></td>
                </tr>

<?php 
				}
			
			?>
            </tbody>
            </table>
<input type="text" name="forcnt" id="forcnt" value="8">
			 <a href="#" id="add"  onClick="MakeRequest('forcnt');">Add More </a>
                 
				
                </div>  
                       <br/>
                        
				<table width="696">
				<tr>
				<td width="345" height="38">Next Visit (Date):
				     <input type="text" name="nxtdate" style="width:170px;" id="nxtdate" onClick="displayDatePicker('nxtdate');" onBlur="hidediv()" value="<?php echo date("d/m/Y",strtotime("+1 day")); ?>" /></td>
				
				<td width="339">Next Visit (Text):<input type="text" name="nxttext" style="width:170px;" id="nxttext"/></td>
				</tr>
                
                <tr><td>
                
				 <input type="text" name="hos1" id="center2" onKeyUp="lookup2(this.value,this.id,'centersuggestions','centerautoSuggestionsList','centerref1');" style="background:#fff;border:1px solid #ac0404;width:150px;" value="<?php echo $appro[24]; ?>" onBlur="hidediv()"  />
                  <div class="suggestionsBox" id="centersuggestions" style="display: none; position:absolute; left:150px; z-index:10">
				<img src="autocomplete/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="centerautoSuggestionsList">
&nbsp;				</div>
		 </div></td><td>
				 <select name="apptype" id="apptype" onChange="getslot('nxtdate','patient_id','apptype','center2');MakeRequest1('nxtdate','patient_id','apptype','center2')">
				   <option value="">Select Appointment Type</option>
                   <?php
				$cen=mysql_query("select type from apptype where status=0 ");
				while($cenro=mysql_fetch_row($cen))
				{
				?>
                   <option value="<?php echo $cenro[0]; ?>" <?php if($cenro[0]=='FU Slot'){?> selected<?php } ?>><?php echo $cenro[0];  ?></option>
                   <?php
				
				}
				?>
                 </select>
              
            </td>
                </tr>
                <tr>
                <td colspan=""></td><td>
                <div id="gettime"></div><div id="getslot"></div>
                                </td>
                </tr>
               </table>
               <table>
                <tr>
                <td>
	  <button class="submit formbutton" type="button"  name="csl" id="csl" style="width:150px;" onClick="javascript:popcontact('clinical_letter.php?id=<?php echo $id; ?>');">Clinical Status Letter</button></td>
      <td> <button class="submit formbutton" type="button"  name="thankl" id="thankl" style="width:150px;" onClick="javascript:popcontact('thanking_letter.php?id=<?php echo $id; ?>');">Thanking Letter</button> </td>
      
	  <td> <button class="submit formbutton" type="button"  name="adml" id="adml" style="width:150px;" onClick="javascript:popcontact('admission_letter.php?id=<?php echo $id; ?>');">Admission Letter</button></td>
      <td><button class="submit formbutton" type="button"  name="refl" id="refl" style="width:150px;" onClick="javascript:popcontact('referring_letter.php?id=<?php echo $id; ?>');">Referring Letter</button></td>
      
     <td> <button class="submit formbutton" type="button"  name="physiol" id="physiol" style="width:150px;" onClick="javascript:popcontact('physiotherapy_letter.php?id=<?php echo $id; ?>');">Physiotherapy Letter</button></td>
     
  
   </tr>
   <tr>
   <td height="66">
	  <button class="submit formbutton" type="button"  name="medcerti" id="medcerti" style="width:150px;" onClick="javascript:popcontact('medical_certificate.php?id=<?php echo $id; ?>');">Medical Certificate</button></td>
       <td><button class="submit formbutton" type="button"  name="investl" id="investl" style="width:150px;" onClick="javascript:popcontact('investigation_letter.php?id=<?php echo $id; ?>');">Investigation Letter</button></td>
      <td><button class="submit formbutton" type="button"  name="print2" id="print2" style="width:150px;" onClick="javascript:pres();">Print Prescription</button></td>
     <td><button class="submit formbutton" type="button"  name="personal" id="personal" style="width:150px;" onClick=""><b>Edit Personal Info</b></button>
      </td>
	  
	  </tr>
				<tr><td>                                                         
                <button class="submit formbutton" type="submit" name="Submit">Submit</button></td>
				<td>
                 <button class="submit formbutton" type="button" onClick="javascript:location.href = 'View_app.php';">Cancel</button>
                  </td><td>
 <!--<button class="submit formbutton" type="button" style="width:150px;" onClick="javascript:popcontact('opt_surgery.php?id=<?php echo $id; ?>');">Surgery Waiting List</button>-->
</td><td>
 <!--<button class="submit formbutton" type="button" style="width:150px;" onClick="javascript:location.href='app_surgery.php?id=<?php echo $id; ?>';">Surgery Appointment</button>--> </td></tr></table>   
                </fieldset>
    </form>
</div>
</boady>

<script>
function ab(){
var cb=document.getElementById('xr');
if (cb.checked==true)
{
	document.getElementById('xray').style.display='inline';
	document.getElementById("tot").value=Number(document.getElementById("tot").value)+Number(document.getElementById('xray').value);
	
}
	else { document.getElementById('xray').style.display='none';
	document.getElementById("tot").value=Number(document.getElementById("tot").value)-Number(document.getElementById('xray').value);
}
}
function dresfun(){
var dc=document.getElementById('dres');
if (dc.checked==true)
{
	document.getElementById('drestxt').style.display='inline';
	document.getElementById("tot").value=Number(document.getElementById("tot").value)+Number(document.getElementById('drestxt').value);
}
	else 
	{
		document.getElementById('drestxt').style.display='none';
		document.getElementById("tot").value=Number(document.getElementById("tot").value)-Number(document.getElementById('drestxt').value);
}
}

function strfun(){
var sc=document.getElementById('str');
if (sc.checked)
{
	document.getElementById('strtxt').style.display='inline';
	document.getElementById("tot").value=Number(document.getElementById("tot").value)+Number(document.getElementById('strtxt').value);
}
	else { document.getElementById('strtxt').style.display='none';
	document.getElementById("tot").value=Number(document.getElementById("tot").value)-Number(document.getElementById('strtxt').value);
	}
}

function ecgfun(){
var ec=document.getElementById('ecg');
if (ec.checked)
{
	document.getElementById('ecgtxt').style.display='inline';
	document.getElementById("tot").value=Number(document.getElementById("tot").value)+Number(document.getElementById('ecgtxt').value);
}
	else { document.getElementById('ecgtxt').style.display='none';
	document.getElementById("tot").value=Number(document.getElementById("tot").value)-Number(document.getElementById('ecgtxt').value);
}
}
function confun(){
var cc=document.getElementById('con');
var fc=document.getElementById('fol');
if (cc.checked)
{
	document.getElementById('cons').style.display='inline';
	document.getElementById('foll').style.display='none';
	document.getElementById("tot").value=Number(document.getElementById("tot").value)+Number(document.getElementById('cons').value);


}
	else if (fc.checked) { 
	document.getElementById('foll').style.display='inline';
	document.getElementById('cons').style.display='none'; 
	document.getElementById("tot").value=Number(document.getElementById("tot").value)+Number(document.getElementById('foll').value);
	document.getElementById("tot").value=Number(document.getElementById("tot").value)-Number(document.getElementById('cons').value);
	}
}

function paid() {
		 
var a=Number(document.getElementById("cons").value); 
var b=Number(document.getElementById("foll").value); 
var c=Number(document.getElementById("xray").value);
var d=Number(document.getElementById("drestxt").value);
var e=Number(document.getElementById("strtxt").value);
var f=Number(document.getElementById("ecgtxt").value);
var g=Number(document.getElementById("inj").value);
var h=Number(document.getElementById("pa").value);
var i=Number(document.getElementById("pr").value);
var j=Number(document.getElementById("red").value);
var k=Number(document.getElementById("op").value);
var l=Number(document.getElementById("sut").value);
var m=Number(document.getElementById("cer").value);
var n=Number(document.getElementById("oth").value);
var cc=document.getElementById('con');
var fc=document.getElementById('fol');


 if (isNaN(a) || isNaN(b)  || isNaN(g) || isNaN(h)  || isNaN(i) || isNaN(j)|| isNaN(k) || isNaN(l) || isNaN(m) || isNaN(n) ) { alert("Please enter only numbers."); return false; } 

if (cc.checked)
{
var grandtotal=a+g+h+i+j+k+l+m+n; } else var grandtotal=b+g+h+i+j+k+l+m+n;

document.getElementById("tot").value=grandtotal.toFixed(2); 
return false; 
} 

</script>