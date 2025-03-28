<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">

<script>
    function delimg(id,cid,sid,pid){
if(confirm("Are you sure you want to delete this entry?"))
  {
    document.location="deleteproductimagesiv.php?id="+id+"&cid="+cid+"&sid="+sid+"&pid="+pid;
  }
}



function addItem(){
	
 
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

newdiv.innerHTML=xmlhttp.responseText;	
	document.getElementById('attatch').appendChild(newdiv);
    }
  }
  
    
  //alert("addrow_image.php?cnt="+cnt);
xmlhttp.open("GET","addrowimg.php?oldimgid=1",true);
xmlhttp.send();	

    	 $("html, body").animate({ scrollTop: $(document).height() }, "slow");
  return false;
  
 
 
}





</script>

      <div class="main-panel">
        <div class="content-wrapper">
            
            
            
            <div class="card">
                <div class="card-body">
                    
<?                 
$id=$_GET['pid'];
$cid=$_GET['cid'];
$sid=$_GET['sid'];
$sql=mysqli_query($con,"select * from product where `product_id`='$id'");
	
	$row=mysqli_fetch_array($sql);


$sku =  $row[2] ;

$possql = mysqli_query($con3,"SELECT * FROM `phppos_items` WHERE `name` LIKE '".$sku."'");
$possqlResult = mysqli_fetch_assoc($possql);
$unit_price = $possqlResult['unit_price'];




$gtproductimg=mysqli_query($con,"select img_name from product_images_new where id='".$row[14]."'");
$prcdrws=mysqli_fetch_array($gtproductimg);


		?>
<form action="process_jewelproduct.php" method="post" enctype="multipart/form-data" id="formf" name="formf" autocomplete="OFF">
    
    
<button class="btn btn-success" type="button" class="btn blue" onClick="addItem();">Add Images</button>
<a href="suggested.php?id=<? echo $id; ?>&type=1" class="btn btn-primary">Add Suggested Product</a>
<br>
<br>
<br>

<div class="row">
    <div class="col-sm-6">
            <div id="attatch">
            
            <div class="row">
                
            
            <?php
            $gtproductimg=mysqli_query($con,"select img_name,id,rank from product_images_new where product_id='".$row[0]."' order by rank");
            $ir=1;
            while($prcdrws=mysqli_fetch_array($gtproductimg))
            {
            ?>
            <div class="col-sm-12" style=" margin-bottom: 2%;">
            <input type="hidden" name="oldimgid[]" value="<?php echo $prcdrws[1]; ?>" />
            <input type="hidden" name="oldimg[]" value="<?php echo $prcdrws[0]; ?>" />
            
            
            
            
            <img src="../../uploads<?php echo $prcdrws[0]; ?>" style="    border-radius: 100%; height: 150px;width: 150px;object-fit: scale-down;" />
            <button class="btn btn-danger" type="button" onclick="delimg('<?php echo $prcdrws[1]; ?>','<?php echo $cid; ?>','<?php echo $sid; ?>','<?php echo $id; ?>')">Delete</button>
            
                
                    <input  type="file" name="image[]" /> 
                    <input type="text" name="rank[]" value="<?php echo $prcdrws['rank']; ?>" style="width:50px;text-align:center;"/>
                    
            </div>
            <?php } ?>

            </div>
            </div>
    </div>
    
    
    
    <div class="col-sm-6">

    <h3 style="color:#d1b754">Edit Product</h3>
        Product Code:   <input type="text" name="code" id="code" onKeyUp="lookup2(this.value,this.id,'centersuggestions','centerautoSuggestionsList','centerref1');" class="form-control" value="<?php echo $row[2]; ?>" onBlur="hidediv()"  />
            
        Product Name:   <input type="text" class="form-control" id="name" name="name" value="<?php echo $row[3]; ?>"> 

        MRP :   <input type="text" class="form-control" id="name" name="mrp" value="<?php echo $unit_price ; ?>" readonly /> 


        Sales Price:    <input type="text" class="form-control" id="s_price" name="s_price" value="<?php echo $row[11]; ?>"> 
    
        discount : <select id="discount" class="form-control" name="discount" >
                        <option value="0">0</option>
                        <?php 
                            for($c=5;$c<=100;$c=$c+5){
                                ?>
                                <option value="<?php echo $c;?>" <?php if($row[23]==$c){ echo "selected";}?>><?php echo $c;?></option>
                            <?php } ?>
                        </select> %
    
        
    
    Rent Price: <input class="form-control" type="text" id="r_price" name="r_price" value="<?php echo $row[12]; ?>"> 
    Deposit: <input type="text" class="form-control" id="deposit" name="deposit" value="<?php echo $row[15]; ?>"> 

    
        Product Description: <textarea  class="form-control" cols="1" rows="4" style="resize:none;;" id="prodesc" name="prodesc"><?php echo $row[4]; ?></textarea> 
        Facebook: <input type="text" class="form-control" id="fb" name="fb" value="<?php echo $row[16];?>"/>
        Instagram: <input type="text" class="form-control" id="insta" name="insta" value="<?php echo $row[17];?>"/>
        Google+: <input type="text" class="form-control" id="google" name="google" value="<?php echo $row[18];?>"/>
        Twitter: <input type="text" class="form-control" id="twitter" name="twitter" value="<?php echo $row[19];?>"/>
        Pinterest: <input class="form-control" type="text" id="pin" name="pin" value="<?php echo $row[20];?>"/>
        Flipkart : <input class="form-control" type="text" id="flipkart" name="flipkart" value="<?php echo $row[21];?>"/>
        Amazon: <input class="form-control" type="text" id="amazon" name="amazon" value="<?php echo $row[22];?>"/>
        Youtube: <input class="form-control" type="text" id="youtube" name="youtube" value="<?php echo $row[35];?>"/>
        
        
        Meta Title: <input class="form-control" type="text" name="meta_title" value="<?php echo $row['meta_title'];?>"/>
        
        Meta Keywords: <input class="form-control" type="text" id="youtube" name="meta_keywords" value="<?php echo $row['meta_keywords'];?>"/>
        
        Meta Description: <input class="form-control" type="text" id="youtube" name="meta_description"  value="<?php echo $row['meta_description'];?>"/>
        
        
        
        
        
        <?php $sql1=mysqli_query($con,"select * from product_color where product_id='$id'");
while($row1=mysqli_fetch_row($sql1)){
echo $row1[1].",";	
}?>

<br><br>
<input type="Submit" class="btn btn-primary" value="Submit" id="Submit" name="Submit" class="sub"><input type="hidden" id="cid" name="cid" value="<?php echo $id ?>" />
 <input type="button" class="btn btn-danger" value="Cancel" id="cancel" name="cancel"  onClick="javascript:location.href = 'product1.php?cid=<?php echo $cid ?>&sid=<?php echo $sid; ?>';" class="sub">

 <input type="hidden" id="id" name="id" value="<?php echo $cid ?>" />
 <input type="hidden" id="sid" name="sid" value="<?php echo $sid ?>" />
 <input type="hidden" id="subid" name="subid" value="<?php echo $subid ?>" />

 
 
 
 
    </div>

</div>
</form>





            </div>
    </div>
            
            
            
            
            
            
            
            
        </div>
    </div>
    
<? include('footer.php'); ?>