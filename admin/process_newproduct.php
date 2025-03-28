<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">



      <div class="main-panel">
        <div class="content-wrapper">
            
            
            
            
            
            
            
            <?php

try{
    
    $image_name="";
    $time=0;
	$errors=0;
	if(isset($_POST['name']))
	$name= $_POST['name'];
	if(isset($_POST['desc']))
	$desc=$_POST['desc'];
	if(isset($_POST['prodesc']))
	$prodesc=$_POST['prodesc'];
	if(isset($_POST['code']))
	$code=$_POST['code'];
	if(isset($_POST['s_price'])){
	    $s_price=$_POST['s_price'];
	    if($s_price<=999){
    	    $cgst = 2.5;
    	    $sgst = 2.5;
    	    $igst = 5;
    	} else {
    	    $cgst = 6;
    	    $sgst = 6;
    	    $igst = 12;
    	}
	}
	if(isset($_POST['r_price']))
	$r_price=$_POST['r_price'];
		
    if(isset($_POST['deposit']))
	$deposit=$_POST['deposit'];

    if(isset($_POST['fb']))
	$fb=$_POST['fb'];


    if(isset($_POST['insta']))
	$insta=$_POST['insta'];


    if(isset($_POST['google']))
    $google=$_POST['google'];


    if(isset($_POST['twitter']))
	$twitter=$_POST['twitter'];

    if(isset($_POST['pin']))
	$pin=$_POST['pin'];

    if(isset($_POST['amazon']))
		$amazon=$_POST['amazon'];

    if(isset($_POST['youtube']))
		$youtube=$_POST['youtube'];


    if(isset($_POST['flipkart']))
		$flipkart=$_POST['flipkart'];
		
	if(isset($_POST['color']))
	    $color=$_POST['color'];

		$cid=$_POST['cid'];//main
		$rank=$_POST['rank'];
		$discount=$_POST['discount'];
		$ab=($discount/100)*$s_price;
        $ttlprs=$s_price-$ab;
		
		$sid=$_POST['sid'];//subcat
		
		$color=$_POST['color'];
		
		$colorsplit = implode(",", $color);
		
		$qrymain=mysqli_query($con,"select * From maincategory where categories_id='$cid'");
		$row=mysqli_fetch_row($qrymain);
		
    	$nwyr=date('Y');
        $nwdt=date('m');
        
        //echo $nwyr."<br>";
        //echo $nwdt."<br>";

        $pth="../../uploads/".$nwyr."/".$nwdt."/";
        //echo $pth;
        if (!file_exists($pth)) {
        
        //echo "doesnt exist";
        
           mkdir($pth, 0755, true);
        }

	   
	   /*
    Function resize($filename_original,$filename_resized,$new_w,$new_h)
    creates a resized image
    variables:
    $filename_original    Original filename
    $filename_resized    Filename of the resized image
    $new_w        width of resized image
    $new_h        height of resized image
*/   
  if(isset($_POST['Submit']))
 $image=$_FILES['image']['name'];
    /*define ("MAX_SIZE","100");*/
    define ("MAX_SIZE","1080");
	
   function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
  	
  function resize($filename_original, $filename_resized, $new_w, $new_h){
	//echo $filename_original." ".$filename_resized."<br>";
    $extension = pathinfo($filename_original, PATHINFO_EXTENSION);
    //echo $extension;
    if ( preg_match("/jpg|jpeg/", $extension) ){ $src_img=@imagecreatefromjpeg($filename_original); }
 
    if ( preg_match("/png/", $extension) ) $src_img=@imagecreatefrompng($filename_original);
 
   // echo "<br><br>---".$src_img."---";
    if(!$src_img) return false;
 
    $old_w = imageSX($src_img);
    $old_h = imageSY($src_img);
 
    $x_ratio = $new_w / $old_w;
    $y_ratio = $new_h / $old_h;
 
    if ( ($old_w <= $new_w) && ($old_h <= $new_h) ) {
        $thumb_w = $old_w;
        $thumb_h = $old_h;
    }
    elseif ( $y_ratio <= $x_ratio ) {
        $thumb_w = round($old_w * $y_ratio);
        $thumb_h = round($old_h * $y_ratio);
    }
    else {
        $thumb_w = round($old_w * $x_ratio);
        $thumb_h = round($old_h * $x_ratio);
    }       
 
    $dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
    imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_w,$old_h); 
 
    if (preg_match("/png/",$extension)) imagepng($dst_img,$filename_resized); 
    else imagejpeg($dst_img,$filename_resized,100); 
 
    imagedestroy($dst_img); 
    imagedestroy($src_img);
 
    return true;
} 
   
    $image_name3=array();
    $image1=$_FILES['image']['name'];
    $cntt1=count($image1);
    for($a=0;$a<$cntt1;$a++){

    $image=$_FILES['image']['name'][$a];
 	//if it is not empty
 	if ($image) 
 	{
 	    // echo $image;
 	    //get the original name of the file from the clients machine
 		$filename = stripslashes($_FILES['image']['name'][$a]);
 	    //get the extension of the file in a lower case format
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
 	    //if it is not a known extension, we will suppose it is an error and will not  upload the file,  
	    //otherwise we will do more tests
        if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
		    //print error message
 			echo '<h1>Unknown extension!</h1>';
 			$errors=1;
 		}
 		else
 		{
            //get the size of the image in bytes
            //$_FILES['image']['tmp_name'] is the temporary filename of the file
            //in which the uploaded file was stored on the server
            $size=filesize($_FILES['image']['tmp_name'][$a]);
            //compare the size with the maxim size we defined and print error if bigger
           /* if ($size > MAX_SIZE*4024000)*/
            if ($size > MAX_SIZE*1440)
            {
            	echo '<h1>You have exceeded the size limit!</h1>';
            	$errors=1;
            }
            $time=time();
            //we will give an unique name, for example the time in unix time format
            $image_name=$time.$a.'.'.$extension;
            //echo "TIME IS  :".time();
            //the new name will be containing the full path where will be stored (images folder)
            $newname=$pth.$image_name;
            $image_name3[]="/".$nwyr."/".$nwdt."/".$image_name;
            //we verify if the image has been uploaded, and print error instead
            $copied = copy($_FILES['image']['tmp_name'][$a], $newname);
            if (!$copied) 
            {
            	echo '<h1>Copy unsuccessfull!</h1>';
            	$errors=1;
            }
            resize($newname,"../../thumbs/".$image_name, 200, 200);
	        resize($newname,"../../mid1/".$image_name, 500, 500);
        }
    }
}
//1080X1440
    
    //This function reads the extension of the file. It is used to determine if the file  is an image by checking the extension.
    //foreach(glob('./*.*') as $filename){
    //   echo "<br>".$filename."<br>";
	//resize($image, 'thumbs/'.$image, 200, 200);
	//resize($image, 'midsize/'.$image, 300, 300);
    //echo "ready";
    //}
    //////////////////
    //////////////////
    
    if(isset($_POST['Submit']) && !$errors) 
    {
         $sql="insert into `product`(`product_image`,`product_code`,`product_name`,`product_desc`,`maincatagory`, `subcatagoty`,`sales_price`,`rent_price`,`categories_id`,`subcat_id`,deposit,`facebook`, `Instagram`, `Google`, `Twitter`, `Pinterest`,amazon,flipkart,discount,total_amt,cgst,sgst,igst,youtube) values('$newname1','$code','$name','$prodesc','$cid','$sid','$s_price','$r_price','$cid','".$sid."','".$deposit."','".$fb."','".$insta."','".$google."','".$twitter."','".$pin."','".$amazon."','".$flipkart."','".$discount."','".$ttlprs."',$cgst,$sgst,$igst,'".$youtube."')";
        // echo $sql;
        //echo $sql2;
        $result = mysqli_query($con,$sql);
        $insid=mysqli_insert_id(); 
        $newimagesid="";
        for($a=0;$a<count($image_name3);$a++)
        {
            $sql2="INSERT INTO `product_images_new`(product_id,`prod_name`, `prod_image`, `pro_code`, `img_name`, `subcat_id`,rank)values('".$insid."','$name','".$image_name3[$a]."','$code','".$image_name3[$a]."','".$sid."','".$rank[$a]."')";
            //echo $sql2;
            $result2 = mysqli_query($con,$sql2);
        }
        //$updqr=mysqli_query($con,"update product set product_new_imageid='".$newimagesid."' where product_id='".$insid."'");
      
        $sq=mysqli_query($con,"select max(product_id) from `product`");
	    $max=mysqli_fetch_row($sq);

     	/*for($i = 0; $i < count($colorsplit); $i++){
    	if($colorsplit[$i]==""){}else{
    
        //	$sql1="insert into `product_color` (`product_id`,`color`,`cid`,`sid`) values('$max[0]','$colorsplit[$i]','$cid','$sid')";
    	//$result1 = mysqli_query($con,$sql1);
    		}
    	}*/ 	
		//echo $result;
		if($result)
		{
		    echo '<script> alert("product added successfull!")</script>';
// 			header('Location:product1.php?cid='.$cid.'&sid='.$sid); 
			    
			  echo '<script>window.location.href="http://yosshitaneha.com/Admin/product1.php?cid='.$cid.'&sid='.$sid.'"</script>';
		}
		else
		echo "error updating data".mysqli_error();
	}
	
	}
		catch(Exception $e)
		{
		 echo "Exception ".$e->getMessage();
		 }
?>





            
            
        </div>
    </div>
    
<? include('footer.php'); ?>