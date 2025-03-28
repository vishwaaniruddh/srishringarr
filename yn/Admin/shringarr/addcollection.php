<? include('config.php');


$image = $_REQUEST['image'];
$sku = $_REQUEST['sku'];
$link = $_REQUEST['link'];
$type = $_REQUEST['type'];

if(isset($image) && isset($sku) && isset($link)){

   $sql = "insert into exclusive_collections(image_url,sku,link,status,category) 
        values('".$image."','".$sku."','".$link."',1,'".$type."')";
    
    if(mysqli_query($con,$sql)){
        echo 1 ; 
    }else{
        echo 0;
    }    
}else{
        echo 2;
}


?>