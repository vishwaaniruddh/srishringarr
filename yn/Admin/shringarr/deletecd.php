<? include('config.php');

$id = $_REQUEST['id'];

$sql = "delete from client_diary_details where id='".$id."'";


if(mysqli_query($con,$sql)){ ?>
   
   <script>
       alert('Coupon Deleted');
       window.location.href="cd_banner.php";
   </script> 
<? }else{ ?>
   
      <script>
       alert('Deleted Error');
       window.location.href="cd_banner.php";
   </script>  
<? }

?>