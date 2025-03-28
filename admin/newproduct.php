<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">



      <div class="main-panel">
        <div class="content-wrapper">
            
            
            
            
            
            
<? 
$cid=$_GET['cid'];
$sid=$_GET['sid']; ?>

<script type="text/javascript">
	function lookup2(inputString2,id2,suggest2,suggestlist2,ref2) {
	//alert(inputString2+" "+id2+" "+suggest2+" "+suggestlist2+" "+ref2);
	//var obj = { queryString:  ""+inputString+"", name: $("#txtname").val() };
		if(inputString2.length == 0) {
			// Hide the suggestion box.
			$('#'+suggest2).hide();
		} else {
		//alert("hi");
			$.post("autocomplete/itemrpc.php", {
			
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
//	alert(obj2+" "+suggest2+" "+id2)
	//alert(document.getElementById().value);
	//alert("hi "+obj);

	//alert(doc[0]);
		$('#'+id2).val(obj2);
		setTimeout("$('#'"+suggest2+").hide();", 200);
	}

function addItem()
{
    //alert("ok");
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
		    var newdiv=document.createElement("div");
            //alert(xmlhttp.responseText);
            //newdiv.innerHTML=xmlhttp.responseText+"<input class="form-control" type='button' value='Remove' onClick='removeElement("+num+")'></div><tbody><table>";
            newdiv.innerHTML=xmlhttp.responseText;	
	        document.getElementById('attatch').appendChild(newdiv);
        }
    }
    
    //alert("addrow_image.php?cnt="+cnt);
    xmlhttp.open("GET","addrowimg.php",true);
    xmlhttp.send();	
    
    	 $("html, body").animate({ scrollTop: $(document).height() }, "slow");
  return false;
}
</script>
</head>
<script type="text/javascript">
<!--
function confirm_delete(id)
{
    if(confirm("Are you sure you want to delete this entry?"))
    {
        document.location="deleteCat.php?id="+id;
    }
}
//-->

function addThem2(){
	
var a = document.formf.selectcolor;
//alert(a.value);
var add = a.value+',';

document.formf.color.value += add;
return true;
}

</script>

<style>
    .productdiv{
        display:flex;
        margin:1% auto;
    }
    .productdiv label{
        width:10%;
    }
</style>

            <form action="process_newproduct.php" method="post" enctype="multipart/form-data" id="formf" name="formf">
                
                <button class="btn btn-success" type="button" class="btn blue" onClick="addItem();">Add Images</button>
<br>
<br>
<br>


                <div id="attatch">
                
                <h3 style="color:#d1b754">New Product</h3>
                
                <div class="productdiv">
                    <label>Product Code:</label> <input class="form-control" type="text" name="code" id="code" onKeyUp="lookup2(this.value,this.id,'centersuggestions','centerautoSuggestionsList','centerref1');" style="background:#fff;border:1px solid #ac0404;" value="" onBlur="hidediv()"  />
                </div>
                 
                 

                    <div class="productdiv">
                    <label>Product Name: :</label> <input class="form-control" type="text" id="name" name="name">
                    </div>
                    
                    
                    <div class="productdiv">
                    <label>Sales Price::</label>  <input class="form-control" type="text" id="s_price" name="s_price"> 
                    </div>
                    
                    
                    <div class="productdiv">
                    <label>Discount : :</label> 
                        
                            <select class="form-control" id="discount" name="discount" >
                                <option value="0">0</option>
                                <?php 
                                for($c=5;$c<=100;$c=$c+5){ ?>
                                    <option value="<?php echo $c;?>"><?php echo $c;?></option>
                                <?php } ?>
                            </select>
                    </div>    
                    
                    <div class="productdiv">
                    <label>Rent Price: :</label> <input class="form-control" type="text" id="r_price" name="r_price">
                    </div>
                    
                    <div class="productdiv">
                    <label>Deposit: :</label> <input class="form-control" type="text" id="deposit" name="deposit">
                    </div>
                    
                    <div class="productdiv">
                    <label>Product Description::</label>  <textarea  class="form-control"  cols="28" rows="4" style="resize:none;" id="prodesc" name="prodesc"></textarea>
                    </div>
                    
                    <div class="productdiv">
                    <label>Facebook::</label>  <input class="form-control" type="text" id="fb" name="fb" />
                    </div>
                    
                    <div class="productdiv">
                    <label>Instagram: :</label> <input class="form-control" type="text" id="insta" name="insta" />
                    </div>
                    
                    
                    <div class="productdiv">
                    <label>Google+: :</label>  <input class="form-control" type="text" id="google" name="google" />
                    </div>
                    
                    <div class="productdiv">
                    <label>Twitter: :</label>  <input class="form-control" type="text" id="twitter" name="twitter" />
                    </div>
                    
                    
                    <div class="productdiv">
                    <label>Pinterest: :</label> <input class="form-control" type="text" id="pin" name="pin" />
                    </div>
                    
                    <div class="productdiv">
                    <label>Flipkart : :</label>  <input class="form-control" type="text" id="flipkart" name="flipkart" />
                    </div>
                    
                    
                    <div class="productdiv">
                    <label>Amazon: :</label>  <input class="form-control" type="text" id="amazon" name="amazon" />
                    </div>
                    
                    
                    <div class="productdiv">
                    <label>Youtube: :</label>  <input class="form-control" type="text" id="youtube" name="youtube" />
                    </div>
                    

                    
                            <input class="form-control" type="file" id="image" name="image[]"> 
                        
                        <input class="form-control" type="hidden" id="cid" name="cid" value="<?php echo $cid ?>" />
                        <input class="form-control" type="hidden" id="rank" name="rank[]" value="0" />
                        <input class="form-control" type="hidden" id="sid" name="sid" value="<?php echo $sid ?>" />
                         Choose color : <input type="color" id="color[]" name="color[]" value="#FFFFFF">
                        
            </div>
<br><br>
                <input class="btn btn-success" type="Submit" value="Submit" id="Su`bmit" name="Submit" class="sub">
                <input class="btn btn-danger" type="button" value="Cancel" id="cancel" name="cancel"  onClick="javascript:location.href = 'product1.php?cid=<?php echo $cid ?>&sid=<?php echo $sid; ?>';" class="sub">
        
        </form>
  
  
  
            
            
            
        </div>
    </div>
    
<? include('footer.php'); ?>