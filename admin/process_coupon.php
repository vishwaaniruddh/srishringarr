<? include('config.php');

$code = $_POST['code'];
$percent_discount = $_POST['percent_discount'];
$min_price = $_POST['min_price'];
$max_price = $_POST['max_price'];



if($code){
    
     $sql = "insert into xircle_coupon(code,status,percent_discount,min_price,max_price,usecount,type) values('".$code."','1','".$percent_discount."','".$min_price."','".$max_price."',0,'')";
    
    if(mysqli_query($con,$sql)){
        ?>
        <script>
            alert('Coupon Created Successfully !');
            window.location.href="coupons.php";
        </script>
        
        <?
    }else{ ?>
                <script>
            alert('Coupon Created Error !');
            window.location.href="coupons.php";
        </script>
    <? }
    
}

?>