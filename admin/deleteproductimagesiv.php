<? include('header.php'); ?>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">



      <div class="main-panel">
        <div class="content-wrapper">
            
            
            
  <?           
            
    $id = $_GET['id'];
    $cid=$_GET['cid'];
    $sid=$_GET['sid'];
    $pid=$_GET['pid'];
    
		
    $sql = mysqli_query($con,"select img_name from product_images_new where `id`='".$id."'");
    $sql_result = mysqli_fetch_assoc($sql);
    $image = $sql_result['img_name'];

    
    if($image){
         $pth="../../uploads".$image;
            // unlink($pth);
            
        $statement  = "delete from product_images_new where id='".$id."'" ; 
        
        if(mysqli_query($con,$statement)){
            echo 'Image Successfully Deleted' ; ?> 
            
            <script>
    
    		    setTimeout(function(){
                    window.location.href="edit_jewelproduct.php?pid=<? echo $pid; ?>&cid=<? echo $cid; ?>&sid=<? echo $sid; ?>" ;
    		    }, 3000);
    
    		</script>
		
		<? 
        }
            
    }else{
        echo 'Not Found Such Image Error';
        
        ?> 
            
            <script>
    
    		    setTimeout(function(){
                    window.location.href="edit_jewelproduct.php?pid=<? echo $pid; ?>&cid=<? echo $cid; ?>&sid=<? echo $sid; ?>" ;
    		    }, 3000);
    
    		</script>
		
		<? 
		
    }
?>            
            
            
            
            
        </div>
    </div>
    
<? include('footer.php'); ?>




