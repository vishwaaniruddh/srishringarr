<? include('config.php');

$id = $_REQUEST['id'];
$bannerfor = $_REQUEST['bannerfor'];
$sql = "delete from bannerimg where id='".$id."'";

if($bannerfor==1){
        if(mysqli_query($con,$sql)){ ?>
           
           <script>
               alert('Banner Deleted');
               window.location.href="web_banner.php";
           </script> 
        <? }else{ ?>
           
              <script>
               alert('Deleted Error');
               window.location.href="web_banner.php";
           </script>  
        <? }
        
    
}else{
    
    if(mysqli_query($con,$sql)){ ?>
   
   <script>
       alert('Banner Deleted');
       window.location.href="mob_banner.php";
   </script> 
<? }else{ ?>
   
      <script>
       alert('Deleted Error');
       window.location.href="mob_banner.php";
   </script>  
<? }


    
}

?>