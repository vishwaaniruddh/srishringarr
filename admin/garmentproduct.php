<? include('header.php');


// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


?>


<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">


      <div class="main-panel">
        <div class="content-wrapper">
            
            
            
            
            
            
            
            
            
            <div class="card">
    <div class="card-body">
        
        

<?php
        $cid=$_GET['cid'];
        $sid=$_GET['sid'];
        $mid=$_GET['mid'];
        
        $sql1="select * from  `garment_product` where product_for='$cid' and  gproduct_id in(select gproduct_id from product_images_new where gproduct_id>0)";

        $result=mysqli_query($con,$sql1);
        $num=mysqli_num_rows($result);
        
        
$intRows = 0; ?>

<div class="row">


<?
        while($result1 = mysqli_fetch_assoc($result)){
            
                $pid=$result1["gproduct_id"];
                $imgid=$result1["product_new_imageid"];
                $discount=$result1["discount"];
                
                $sql2="SELECT * FROM `product_images_new` WHERE gproduct_id='$pid' order by rank";
                //echo $sql2;
                $res2=mysqli_query($con,$sql2);
                $res2 = mysqli_fetch_assoc($res2);
                
                $image=$res2["img_name"];
                $code=$res2["pro_code"];
                $nm=$res2["prod_name"];
                
                $pth="../yn/uploads".$image;

                $intRows++;
                
                ?>
    <div class="col-sm-3" style="    margin: 10px auto;">

<div class="product-box" style="padding: 10px;border: 1px solid gray;text-align: center;">

<label>Name: <?php echo  $nm; ?></label> &nbsp; <br>
<label>Code: <?php echo  $code; ?></label><br>

<div>
    <a href="<?php echo $pth ?>" target="_new" title="Product Code: <?php echo $code;?>">  
        <img src='<?php echo $pth; ?>' style="height: 200px; width: 100%;object-fit: contain;">
    </a>    
</div>

<br>


<div style="display:flex;justify-content: space-around;">
        <a class="btn btn-primary" href='edit_gproduct.php?pid=<?php echo $pid ?>&cid=<?php echo $cid ?>&sid=<?php echo $sid?>'> Edit </a> 
        <a class="btn btn-danger" href="javascript:confirm_delete('<?php echo $pid; ?>','<?php echo $cid; ?>','<?php echo $sid; ?>')"> Delete </a>    
</div>


                    <br>
                    <input type="checkbox" name="discount[]" id="discount[]" value=<?php echo $pid;?> <?php  if($discount>0){ echo "checked";} ?>>
                    discount: <?php echo $discount; ?> %
                    
</div>                    
</div>			
<? } ?>



  
</div>






</div>
</div>            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        </div>
    </div>
    
    
      <script src="vendors/js/vendor.bundle.base.js"></script>
    
    
<script src="datatable/jquery.dataTables.js"></script>
<script src="datatable/dataTables.bootstrap.js"></script>
<script src="datatable/dataTables.buttons.min.js"></script>
<script src="datatable/buttons.flash.min.js"></script>
<script src="datatable/jszip.min.js"></script>




<script src="datatable/pdfmake.min.js"></script>
<script src="datatable/vfs_fonts.js"></script>
<script src="datatable/buttons.html5.min.js"></script>
<script src="datatable/buttons.print.min.js"></script>
<script src="datatable/jquery-datatable.js"></script>



  <!-- plugins:js -->
  <!--<script src="vendors/js/vendor.bundle.base.js"></script>-->
  <!-- endinject -->
   <!--Plugin js for this page -->
  <!--<script src="vendors/chart.js/Chart.min.js"></script>-->

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <!--<script src="js/off-canvas.js"></script>-->
  <!--<script src="js/hoverable-collapse.js"></script>-->
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!--<script src="js/dashboard.js"></script>-->
  <!--<script src="js/Chart.roundedBarCharts.js"></script>-->
  <!-- End custom js for this page-->
</body>

</html>




<? include('footer.php'); ?>