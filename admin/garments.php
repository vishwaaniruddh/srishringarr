<? include('header.php'); ?>


<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
     
<link rel="stylesheet" type="text/css" href="datatable/dataTables.bootstrap.css">


      <div class="main-panel">
        <div class="content-wrapper">
            
            
            

<div class="card">
    <div class="card-body">

<?php 
                            		if(isset($_GET['delete'])){
                            			$del=$_GET['delete'];
                            			echo "<h1 style='color:red;'>".$del."</h1>" ;
                            		}else{ 
                        				isset($_GET['success']);
                        				$succ=$_GET['success'];
                        				echo $succ;
                            		} ?>
                            		
                            		
            <table class="table" border="1" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th width="48" height="32">Sr No.</th>
                    <th width="240">Categories Name</th>
                    <th width="160">Categories Description</th>
                    <th width="101">Date</th>
                    <th width="42">Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php 
            	$id=$_GET['id'];
            	//echo "select * from garment_subcat1 where main_id = '".$id."'";
            	$sql=mysqli_query($con,"SELECT * FROM `garments` where `Main_id`=1 or `Main_id`=3");
            	$i=1;
            	while($row=mysqli_fetch_row($sql)){ 	?>
                    <input type="hidden" id="id" name="id" value="<?php echo $row[0];?>"/>
                    <tr>
                      	<td align="center"><?php echo $i++; ?></td>
                        
                       	<td align="left"> <a href="garmentproduct.php?cid=<?php echo $row[0]; ?>">
                       	    <img src="images/folder.gif" style="height: auto; width: auto;">&nbsp;<?php echo $row[2]; ?></a>
                       	    
                       	<td align="left"><?php echo $row[3]; ?></td>
                        
                      	<td align="left"><?php if(isset($row[4]) and $row[4]!='0000-00-00') echo date('d/m/Y',strtotime($row[4])); ?></td>
                        
                      	<td align="left"><a href="editsubcat.php?id=<?php echo $row[0]; ?>">Edit</a></td>
                            
                    </tr>
                <?php } ?>
                
                </tbody>

            </table>

        
    </div>
</div>
        
        
        
        
        <div class="card">
    <div class="card-body">
                
        <form id="form1" name="form1" method="post"  action="process_gcategory.php" enctype="multipart/form-data">


    <h3>New Category</h3>
    
    <div class="row">
        <div class="col-sm-12">
            <label>    Category Name </label>
            <input type="text" class="form-control" name="cname" id="cname" />
        </div>
    


<input type="hidden" name="typ" value="1">  <!--ie rent--> 


          <div class="col-sm-12">
            <label>   Description </label>
            <textarea name="desc" class="form-control" id="desc" cols="20" rows="4" style="resize:none;"></textarea>
            </div>
        
        
          <div class="col-sm-12">
            <label>   Discount (In Percent)</label>
        
          <select id="discount" name="discount" class="form-control">
            <option value="0">0</option>
            <?php 
                for($c=5;$c<=100;$c=$c+5){ ?>
                    <option value="<?php echo $c;?>"><?php echo $c;?></option>
                    <?php  } ?>
        </select> 
        
        </div>
        
      <div class="col-sm-12">
    <br>
        <input class="btn btn-primary" type="submit" name="Submit" id="Submit" value="Submit" class="sub"/>
    </div>


</div>
  </form>
  
  
  
  
  
            
            
            
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