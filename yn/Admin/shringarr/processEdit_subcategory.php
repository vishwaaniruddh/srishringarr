<?php
include('config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

try{
	    
	$id=$_POST['id'];
	$cname=$_POST['cname'];
	$desc=$_POST['desc'];
	$cid=$_POST['cid'];	
	
	$oldimg = $_POST['oldimg'];
	$discount = $_POST['discount'];
	
	
    $meta_title = htmlspecialchars($_POST['meta_title']);
    $meta_description = htmlspecialchars($_POST['meta_description']);
    
	
	function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

 $errors=0;
 if(isset($_POST['Submit'])) 
 {
 	$image=$_FILES['image']['name'];
 
 	if ($image){
 	    $filename = stripslashes($_FILES['image']['name']);
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
 		
         if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
     			echo '<h1>Unknown extension!</h1>';
     			$errors=1;
     		} else{
             $size=filesize($_FILES['Images']['tmp_name']);
             if ($size > MAX_SIZE*1024){
            	echo '<h1>You have exceeded the size limit!</h1>';
            	$errors=1;
            }


                $image_name=time().'.'.$extension;
                $newname="../Images/".$image_name;
                $copied = copy($_FILES['image']['tmp_name'], $newname);
                
                if (!$copied){
                	echo '<h1>Copy unsuccessfull!</h1>';
                	$errors=1;
                }
     		}
 	}else { $newname=$oldimg;} }
 	
 	 if(isset($_POST['Submit'])){
	 
        $sql = "UPDATE `subcat1` SET `image`=?, `name`=?, `desc`=?, `meta_title`=?, `meta_description`=? WHERE `subcat_id`=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssssi", $newname, $cname, $desc, $meta_title, $meta_description, $id);
        
        $result = $stmt->execute();
        $sql_product="UPDATE `product` SET `subcat_id`='".$discount."'  where  `subcat_id`='".$id."' ";
    
    // $result = mysqli_query($con,$sql);
		if($result){
		    header('Location:edit_subcat.php?id='.$id.'&cid='.$cid);  
		  }else{
		echo "error updating data";

		  }

		}}
		catch(Exception $e)
		{
		 echo "Exception ".$e->getMessage();
		 }
?>