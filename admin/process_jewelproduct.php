<? include('header.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>


<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">



      <div class="main-panel">
        <div class="content-wrapper">
            
            
            <?php

           $s_price=$_POST['s_price'];
           
	    if(isset($s_price)){
	
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
		$r_price=$_POST['r_price'];
		$name=str_replace("'",'',$_POST['name']);

		if(isset($_POST['desc']))
		$desc=$_POST['desc'];
		
		$prodesc=str_replace("'",'',$_POST['prodesc']);
		
		$code=$_POST['code'];
		$cid=$_POST['cid'];
	    $oldimg = $_POST['oldimg'];	

		$rank=$_POST['rank'];
		$fb=$_POST['fb'];

		$insta=$_POST['insta'];

		$google=$_POST['google'];

		$twitter=$_POST['twitter'];

		$pin=$_POST['pin'];

	    $discount=$_POST['discount'];
		$ab=(float)($discount/100) * (float)$s_price;
        $ttlprs=(float)$s_price-(float)$ab;

	    $amazon=$_POST['amazon'];
		$flipkart=$_POST['flipkart'];
		$youtube = $_POST['youtube'];
		
		
		
		
        $meta_title = $_POST['meta_title'];
        $meta_keywords = $_POST['meta_keywords'];
        $meta_description = $_POST['meta_description'];
		
		
		
		
		
		$deposit=$_POST['deposit'];
		
        $oldimgid = $_POST['oldimgid'];
	    $id=$_POST['cid'];
	    $cid=$_POST['id'];
	    $sid=$_POST['sid'];

	    $color=$_POST['color'];
	    $colorsplit = explode(",", $color);
	    if(isset($_POST['maincat']))
	        $maincat=$_POST['maincat'];	
	    if(isset($_POST['subcat']))
	        $subcat=$_POST['subcat'];
	    $qrymain=mysqli_query($con,"select * from maincategory where categories_id='$cid'");
	    $row=mysqli_fetch_row($qrymain);
	    mysqli_query($con,"delete from product_color where product_id='$id'");
        define ("MAX_SIZE","100");


 	    $imagechk=$_FILES['image']['name'];
 	    //if it is not empty
        $pth=""; 

        $nwyr=date('Y');
        $nwdt=date('m');

        //echo $nwyr."<br>";
        //echo $nwdt."<br>";

        $pth="../../uploads/".$nwyr."/".$nwdt."/";
        //echo $pth;
        if (!file_exists($pth)) {
           mkdir($pth, 0755, true);
        }



    //This function reads the extension of the file. It is used to determine if the file  is an image by checking the extension.
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



//This variable is used as a flag. The value is initialized with 0 (meaning no error  found)  
//and it will be changed to 1 if an errro occures.  
//If the error occures the file will not be uploaded.
 $errors=0;
//checks if the form has been submitted
 if(isset($_POST['Submit'])) 
 {
   $image_name3=array();
$image1=$_FILES['image']['name'];
$cntt1=count($image1);
//echo 'tot'.$cntt1;
for($a=0;$a<$cntt1;$a++){

 	//reads the name of the file the user submitted for uploading
 	$image=$_FILES['image']['name'][$a];
 	//if it is not empty
 	if ($image) 
 	{// echo $image;
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
 
 $size=filesize($_FILES['images']['tmp_name'][$a]);

//compare the size with the maxim size we defined and print error if bigger
if(isset($_POST['size']))
if ($size > MAX_SIZE*10240)
{
	echo '<h1>You have exceeded the size limit!</h1>';
	$errors=1;
}


//we will give an unique name, for example the time in unix time format
$image_name=time().$a.'.'.$extension;
//echo "TIME IS  :".time();
//the new name will be containing the full path where will be stored (images folder)
$image_name3[]="/".$nwyr."/".$nwdt."/".$image_name; 
$newname1=$pth.$image_name;
//we verify if the image has been uploaded, and print error instead
if($oldimg[$a]!="")
{
$unlpth="../../uploads".$oldimg[$a];
unlink($unlpth);
}
$copied = copy($_FILES['image']['tmp_name'][$a], $newname1);
//echo "<br>".$copied."<br>";

if (!$copied) 
{
	echo '<h1>Copy unsuccessfull!</h1>';
	$errors=1;
}
 resize($newname1,"../yn/uploads/thumbs/".$image_name, 200, 200);
	resize($newname1,"../yn/uploads/mid1/".$image_name, 500, 500);

}

}
else 
{ 
$image_name3[]=$oldimg[$a];
} 
}


//echo "<br>".$newname;
   
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	   if(isset($_POST['Submit']) && !$errors) 
        {
		

$gtproductimg=mysqli_query($con,"select product_code,product_new_imageid from product where product_id='".$id."'");
$prcdrws=mysqli_fetch_array($gtproductimg);

$prcdr=$prcdrws[0];



      $sql2="update `product` set `product_image`='',`product_code`='".$code."',`product_name`='".$name."',`sales_price`='".$s_price."', 
      `rent_price`='".$r_price."', `product_desc`='".$prodesc."',deposit='".$deposit."',facebook='".$fb."',Instagram='".$insta."',Google='".$google."',
      Twitter='".$twitter."',Pinterest='".$pin."',flipkart='".$flipkart."',amazon='".$amazon."',youtube='".$youtube."',discount='".$discount."',
      total_amt='".$ttlprs."',meta_title='".$meta_title."',meta_keywords='".$meta_keywords."',meta_description='".$meta_description."' 
      where product_id='".$id."'";

$result2 = mysqli_query($con,$sql2);

//echo $sql;
		

		for($b = 0; $b < count($image_name3); $b++)
               {
if(trim($image_name3[$b])!="")
{
                  if($oldimgid[$b]=="")
                  {
$sql2="INSERT INTO `product_images_new`(product_id,`prod_name`, `prod_image`, `pro_code`, `img_name`, `subcat_id`,rank)values('".$id."','$name','".$image_name3[$b]."','$code','".$image_name3[$b]."','".$sid."','".$rank."')";


                   }else
{
$sql2="update product_images_new set prod_name='".$name."',prod_image='".$image_name3[$b]."',pro_code='".$code."',img_name='".$image_name3[$b]."',rank='".$rank[$b]."' where id='".$oldimgid[$b]."'";


}

$result = mysqli_query($con,$sql2);
// echo $sql2."<br>";

if(!$result)
{
		echo mysqli_error($con);
}

}
               } 


		for($i = 0; $i < count($colorsplit); $i++){
        	if($colorsplit[$i]==""){}else{
        
            $sql1="insert into `product_color` (`product_id`,`color`,`cid`,`sid`) values('$id','$colorsplit[$i]','$cid','$sid')";
        $result1 = mysqli_query($con,$sql1);
        }

	} 
// 		echo '$result' . $result;
		if($result)
		   {
			/*if(file_exists($oldimg))   
			unlink($oldimg);
			$img=split("/",$oldimg);
			if(file_exists("thumbs/".$img[1]))
			unlink("thumbs/".$img[1]);
			if(file_exists("midsize/".$img[1]))
			unlink("midsize/".$img[1]);
			*/
				echo 'Images updated<br>';
			
// 			header('Location:edit_product.php?pid='.$id.'&cid='.$cid.'&sid='.$sid); 
			 }else{

			     echo 'No Image Updated<br>';
			 }
			 
			 if(!$result2){
			     echo 'data updation error<br>' ;
			     		
			 }else{

			echo 'data updated<br>';  
			 }
			 echo 'Redirecting Please Wait .. <br>'; ?>			 
		<script>

		    setTimeout(function(){
                window.location.href="edit_jewelproduct.php?pid=<? echo $id; ?>&cid=<? echo $cid; ?>&sid=<? echo $sid; ?>" ;
		    }, 3000);

		</script>	 
		<? }
		
?>
        </div>
    </div>
    
<? include('footer.php'); ?>