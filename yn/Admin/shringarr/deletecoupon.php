<? include('config.php');

$id = $_REQUEST['id'];

$sql = "delete from xircle_coupon where id='".$id."'";


if(mysqli_query($con,$sql)){ ?>
   
   <script>
       alert('Coupon Deleted');
       window.location.href="coupons.php";
   </script> 
<? }else{ ?>
   
      <script>
       alert('Deleted Error');
       window.location.href="coupons.php";
   </script>  
<? }

?>