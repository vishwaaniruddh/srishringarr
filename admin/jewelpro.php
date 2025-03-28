<? include('header.php'); ?>


<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">


      <div class="main-panel">
        <div class="content-wrapper">
            
            
            
            
            
            
            
            
            
            <div class="card">
    <div class="card-body">
        

<?php

$cid1=$_GET['cid'];
$sid=$_GET['sid'];
$subid=$_GET['subid'];

$sql="select* from `jewel_subcat` where subcat_id='$cid1'";
$result = mysqli_query($con,$sql);
$row=mysqli_fetch_row($result);

$sql2="select* from  `subcat1`  where maincat_id='$cid1' and subcat_id='$sid' ";
$result2 = mysqli_query($con,$sql2);
$row2=mysqli_fetch_row($result2);
$sq="select * from  `product` where subcat_id='$sid' order by product_code ASC";




$result1=mysqli_query($con,$sq);
$num=mysqli_num_rows($result1);



$intRows = 0; ?>


        <a class="btn btn-primary" href="newproduct.php?cid=<?php echo $cid1; ?>&sid=<?php echo $sid; ?>"> Add Products </a>
<br><br>


<div class="row">


<?
while($fetch_row = mysqli_fetch_assoc($result1)){ ?>
    <div class="col-sm-3" style="    margin: 10px auto;">
        


<? $pid=$fetch_row["product_id"];
$image=$fetch_row["product_image"];
$path=substr($image,7);
$desc=$fetch_row["product_name"];
$code=$fetch_row["product_code"];
$discount=$fetch_row["discount"];
$imageid=$fetch_row["product_new_imageid"];
 $intRows++;
$getpimgs=mysqli_query($con,"select img_name,prod_name from product_images_new where product_id='".$pid."' order by rank");
$getpimgsrws=mysqli_fetch_array($getpimgs);


?>
<div class="product-box" style="padding: 10px;border: 1px solid gray;text-align: center;">
    
<label>Name: <?php echo  $getpimgsrws[1]; ?></label> &nbsp; <br>
<label>Code: <?php echo  $code; ?></label><br>
<div>
    <a href="<?php echo "../yn/uploads".$getpimgsrws[0]; ?>" target="_new" title="Product Code: <?php echo $code;?>">  
    <img src='<?php echo "../yn/uploads".$getpimgsrws[0]; ?>' style="    height: 200px; width: 200px;object-fit: contain;"></a>    
</div>

<br>
<div style="display:flex;justify-content: space-around;">
    <a class="btn btn-primary" href='edit_jewelproduct.php?pid=<?php echo $pid ?>&cid=<?php echo $cid1 ?>&sid=<?php echo $sid; ?>'> Edit </a>
 <a class="btn btn-danger" href="javascript:confirm_delete('<?php echo $pid; ?>','<?php echo $cid1 ?>','<?php echo $sid; ?>');"> Delete </a>
</div>


 <br />
  <input type="checkbox" name="discount[]" id="discount[]" value="<?php echo $pid; ?>" <?php  if($discount>0){ echo "checked";} ?> >
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