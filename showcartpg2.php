<?php include("config.php");

// echo "select sum(qty) as total from cart where user_id='".$userid."' and status=0 and ac_typ=1" ; 
?>


<script>
setInterval(function(){ 
    <?php


$qryc=mysqli_query($con,"select sum(qty) as total from cart where user_id='".$userid."' and status=0 and ac_typ=1");
    $fetchc=mysqli_fetch_array($qryc);
    $totqt=0;
        $totamt=0;
        if($fetchc[0]!=null)
        {
            $totqt  = $fetchc[0];
            echo $totamt = $fetchc[1];
            }
    
    ?>    
}, 3000);    
</script>






        <a href="https://srishringarr.com/cart.php" class="cart_anchor">
            <img src="/assets/shopping-cart.png" style="height:24px" class="header-icon1 js-show-header-dropdown showcartpg2" alt="ICON">
            <span id="cartCount" class="header-icons-noti2"><?echo $totqt; ?></span>
        </a>
        
