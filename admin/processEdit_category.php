<?php
include('config.php');
try{
	    
	$id=$_POST['id'];
	$cname=$_POST['cname'];
	$desc=$_POST['desc'];
	$cid=$_POST['cid'];	
    $typ=$_POST['typ'];	

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

//This variable is used as a flag. The value is initialized with 0 (meaning no error  found)  
//and it will be changed to 1 if an errro occures.  
//If the error occures the file will not be uploaded.
 $errors=0;
//checks if the form has been submitted
 if(isset($_POST['Submit'])) 
 {
 	//reads the name of the file the user submitted for uploading
 	$image=$_FILES['image']['name'];
 	//if it is not empty
 	if ($image) 
 	{// echo $image;
 	//get the original name of the file from the clients machine
 		$filename = stripslashes($_FILES['image']['name']);
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
 $size=filesize($_FILES['Images']['tmp_name']);

//compare the size with the maxim size we defined and print error if bigger
if ($size > MAX_SIZE*1024)
{
	echo '<h1>You have exceeded the size limit!</h1>';
	$errors=1;
}

//we will give an unique name, for example the time in unix time format
$image_name=time().'.'.$extension;
//echo "TIME IS  :".time();
//the new name will be containing the full path where will be stored (images folder)
$newname="Images/".$image_name;
//we verify if the image has been uploaded, and print error instead
$copied = copy($_FILES['image']['tmp_name'], $newname);
if (!$copied) 
{
	echo '<h1>Copy unsuccessfull!</h1>';
	$errors=1;
}}}else { $newname=$oldimg;} }


	   
if(isset($_POST['Submit'])) 
{

$sql = "UPDATE `jewel_subcat` SET `image`=?, `categories_name`=?, `desc`=?, `meta_title`=?, `meta_description`=? WHERE `subcat_id`=?";

// Prepare the statement
$stmt = $con->prepare($sql);

// Bind parameters
$stmt->bind_param("sssssi", $newname, $cname, $desc, $meta_title, $meta_description, $id);

// Execute the statement
$result = $stmt->execute();

	//echo $result;
	if($result)
	{
        $sql_product=mysqli_query($con,"update `product` set `discount`='".$discount."' where  `categories_id`='".$id."' ");
	    header("Location:editCat.php?id=$id");  
    }
	else
	echo "error updating data";
// 	echo mysqli_error($con);
}
    
}
		catch(Exception $e)
		{
		 echo "Exception ".$e->getMessage();
		 }
?>